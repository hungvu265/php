<?php
	$masach = "";
	if (isset($_POST["layma"]))
	{
		$ran = rand(1111, 9999);
		$masach = "ms$ran";
		$con = mysqli_connect("localhost", "root", "", "bookstore");
		$sqlsach = mysqli_query($con, "SELECT * FROM sach");
		while ($row = mysqli_fetch_array($sqlsach))
		{
			while ($masach == $row["masach"])
			{
				$ran = rand(1111, 9999);
				$masach = "ms$ran";
			}
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm sách</title>
</head>
<body>
	<form action="themsach.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td></td>
				<th>THÔNG TIN SÁCH</th>
			</tr>
			<tr>
				<th>Mã sách</th>
				<td><input type="text" name="masach" value="<?php echo $masach ?>"></td>
				<td><input type="submit" name="layma" value="Lấy mã"></td>
			</tr>
			<tr>
				<th>Tên sách</th>
				<td><input type="text" name="tensach"></td>
			</tr>
			<tr>
				<th>Tác giả</th>
				<td><input type="text" name="tacgia"></td>
			</tr>
			<tr>
				<th>Đơn giá</th>
				<td><input type="text" name="dongia"></td>
			</tr>
			<tr>
				<th>Số lượng</th>
				<td><input type="text" name="soluong"></td>
			</tr>
			<tr>
				<th>Thể loại</th>
				<td><input type="text" name="theloai"></td>
			</tr>
			<tr>
				<th>Hình ảnh</th>
				<td><input type="file" name="anh"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="them" value="Thêm sách">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>

			</tr>
		</table>
	</form>
</body>
</html>

<?php
	//Thêm sách
	session_start();
	$manv = $_SESSION["kt"];
	if (isset($_POST["them"]))
	{
		$con = mysqli_connect("localhost", "root", "", "bookstore");
		$sql = mysqli_query($con, "SELECT * FROM nhanvien");
		$sqlsach = mysqli_query($con, "SELECT * FROM sach");
		$masach = $_POST["masach"];
		$str = strlen($masach);
		$anh = $_FILES["anh"]["name"];
		$dongia = $_POST["dongia"];
		$soluong = $_POST["soluong"];
		$check = 0;
		while ($row = mysqli_fetch_array($sqlsach))
		{
			if ($masach == $row["masach"])
			{
				$check = 1;
				break;
			}
		}
		if($check == 1)
		{
			echo "Mã sách đã tồn tại";
		}
		elseif ($str != 6)
		{
			echo "Mã sách chỉ có độ dài 6 kí tự";
		}
		elseif($dongia < 0)
		{
			echo "Đơn giá phải là số dương";
		}
		elseif($soluong < 10)
		{
			echo "Số lượng tối thiểu là 10";
		}
		else
		{	
			$tensach = $_POST["tensach"];
			$tacgia = $_POST["tacgia"];
			$theloai = $_POST["theloai"];
			$dem = mysqli_num_rows($sql);
			$k = 0;
			for ($i = 0; $i < $dem; $i++)
			{
				$out = mysqli_fetch_assoc($sql);
				if ($manv == $out["manv"])
				{
					mysqli_query($con, "INSERT INTO sach (masach, tensach, tacgia, dongia, soluong, theloai, anh) VALUES ('$masach', '$tensach', '$tacgia', '$dongia', '$soluong', '$theloai', '$anh')");
					mysqli_query($con, "INSERT INTO hoatdong (manv, masach, kieu) VALUES ('$manv', '$masach', 'Thêm')");
					echo "Thêm sách thành công";
					$k = 1;
				}
			}
			if ($k != 1)
			{
				mysqli_query($con, "INSERT INTO sach (masach, tensach, tacgia, dongia, soluong, theloai, anh) VALUES ('$masach', '$tensach', '$tacgia', '$dongia', '$soluong', '$theloai', '$anh')");
			echo "Thêm sách thành công";
			}
		}	
	}
	//Quay lại
	if (isset($_POST["quaylai"]))
	{
		header("location: quanlisach.php");
	}
?>