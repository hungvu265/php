<?php
	session_start();
	$masach = $_SESSION["masach"];
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM sach");
	$dem = mysqli_num_rows($sql);
	$tien = "";
	$soluongmua = "";
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_array($sql);
		if ($masach == $out["masach"])
		{
			$tensach = $out["tensach"];
			$tacgia = $out["tacgia"];
			$dongia = $out["dongia"];
			$soluong = $out["soluong"];
			$theloai = $out["theloai"];
		}
	}

	//Tính tiền mua
	if (isset($_POST["tinh"]))
	{
		if (empty($_POST["soluongmua"]))
		{
			echo "Nhập số lượng sách muốn mua";
		}
		else
		{
			$soluongmua = $_POST["soluongmua"];
			$tien = $soluongmua * $dongia;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mua Sách</title>
</head>
<body>
	<form action="muasach.php" method="POST">
		<table>
			<tr>
				<th colspan="2">Mua sách</th>
			</tr>
			<tr>
				<th>Tên sách</th>
				<td><input type="text" name="tensach" value="<?php echo "$tensach"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Tác giả</th>
				<td><input type="text" name="tacgia" value="<?php echo "$tacgia"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Đơn giá</th>
				<td><input type="text" name="dongia" value="<?php echo "$dongia"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Số lượng</th>
				<td><input type="text" name="soluong" value="<?php echo "$soluong"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Thể loại</th>
				<td><input type="text" name="theloai" value="<?php echo "$theloai"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Số lượng mua</th>
				<td><input type="number" name="soluongmua" value="<?php echo "$soluongmua"; ?>"></td>
			</tr>
			<tr>
				<th>Thành tiền</th>
				<td><input type="text" name="tien" value="<?php echo "$tien"; ?>" readonly></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="tinh" value="Tính">
					<input type="submit" name="mua" value="Mua">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	//Quay lại
	if (isset($_POST["quaylai"]))
	{
		header("location: timkiem.php");
	}

	//Mua hàng
	if (isset($_POST["mua"]))
	{
		if (empty($_POST["soluongmua"]))
		{
			echo "Nhận số lượng cần mua";
		}
		elseif ($_POST["soluongmua"] > $_POST["soluong"])
		{
			echo "Số lượng mua <= số lượng sách có";
		}
		elseif ($_POST["soluongmua"] < 0)
		{
			echo "Số lượng mua tối thiểu là 1";
		}
		else
		{
			session_start();
			$soluongmua = $_POST["soluongmua"];
			$new = $soluong - $soluongmua;
			$tien = $soluongmua * $dongia;
			mysqli_query($con, "UPDATE sach SET soluong = '$new' WHERE masach = '$masach'");
			$_SESSION["soluongmua"] = $soluongmua;
			$taikhoan = $_SESSION["khachhang"];
			mysqli_query($con, "INSERT INTO muasach (taikhoan, masach, soluong, tien) VALUES ('$taikhoan', '$masach', '$soluongmua', '$tien')");
			header("location: hoadon.php");
		}
	}

?>