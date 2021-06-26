<?php
	session_start();
	$masach = $_SESSION["save"];
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM sach");
	$dem = mysqli_num_rows($sql);

	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_assoc($sql);
		if ($masach == $out["masach"])
		{
			$tensach = $out["tensach"];
			$tacgia = $out["tacgia"];
			$dongia = $out["dongia"];
			$soluong = $out["soluong"];
			$theloai = $out["theloai"];
			$anh = $out["anh"];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thay đổi thông tin sách</title>
</head>
<body>
	<form action="thaydoisach.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td></td>
				<th>THÔNG TIN SÁCH</th>
			</tr>
			<tr>
				<th>Mã sách</th>
				<td><input type="text" name="masach" value="<?php echo $masach; ?>" readonly></td>
			</tr>
			<tr>
				<th>Tên sách</th>
				<td><input type="text" name="tensach" value="<?php echo $tensach; ?>"></td>
			</tr>
			<tr>
				<th>Tác giả</th>
				<td><input type="text" name="tacgia" value="<?php echo $tacgia; ?>"></td>
			</tr>
			<tr>
				<th>Đơn giá</th>
				<td><input type="text" name="dongia" value="<?php echo $dongia; ?>"></td>
			</tr>
			<tr>
				<th>Số lượng</th>
				<td><input type="text" name="soluong" value="<?php echo $soluong; ?>"></td>
			</tr>
			<tr>
				<th>Thể loại</th>
				<td><input type="text" name="theloai" value="<?php echo $theloai; ?>"></td>
			</tr>
			<tr>
				<th>Hình ảnh</th>
				<td><input type="file" name="anh"></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><input type="submit" name="capnhat" value="Thay đổi">
					<input type="submit" name="xoa" value="Xóa">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>

			</tr>
		</table>
	</form>
</body>
</html>

<?php
	//Ấn nút xóa
	if (isset($_POST["xoa"]))
	{
		$manv = $_SESSION["kt"];
		$sq = mysqli_query($con, "SELECT manv FROM nhanvien");
		$de = mysqli_num_rows($sq);
		$k = 0;
		for ($i = 0; $i < $de; $i++)
		{
			$ou = mysqli_fetch_assoc($sq);
			if ($manv == $ou["manv"])
			{
				mysqli_query($con, "DELETE FROM sach WHERE masach = '$masach'");
				echo "Xóa thành công";
				mysqli_query($con, "INSERT INTO hoatdong(manv, masach, kieu) VALUES ('$manv', '$masach', 'Xóa')");
				$k = 1;	
				header("location: quanlisach.php");
			}
		}
		if ($k == 0)
		{
			mysqli_query($con, "DELETE FROM sach WHERE masach = '$masach'");
			echo "Xóa thành công";
			header("location: quanlisach.php");
		}
	}

	//Ấn nút quay lại
	if (isset($_POST["quaylai"]))
	{
		header("location: quanlisach.php");
	}

	//Ấn nút thay đổi
	if (isset($_POST["capnhat"]))
	{
		if (!empty($_FILES["anh"]["name"]))
		{
			$anh = $_FILES["anh"]["name"];
		}
		$k = 0;
		$tensach = $_POST["tensach"];
		$tacgia = $_POST["tacgia"];
		$dongia = $_POST["dongia"];
		$soluong = $_POST["soluong"];
		$theloai = $_POST["theloai"];
		if ($soluong < 0 || $dongia < 0)
		{
			echo "Số lượng và đơn giá phải lớn hơn hoặc bằng 0";
		}
		else
		{

			//Kiểm tra xem có phải nhân viên k
			$manv = $_SESSION["kt"];
			$sq = mysqli_query($con, "SELECT manv FROM nhanvien");
			$de = mysqli_num_rows($sq);
			for ($i = 0; $i < $de; $i++)
			{
				$ou = mysqli_fetch_assoc($sq);
				if ($manv == $ou["manv"])
				{
					mysqli_query($con, "UPDATE sach SET tensach = '$tensach', tacgia = '$tacgia', dongia = '$dongia', soluong = '$soluong', theloai = '$theloai', anh = '$anh' WHERE masach = '$masach'");
					echo "Thay đổi thành công";
					mysqli_query($con, "INSERT INTO hoatdong(manv, masach, kieu) VALUES ('$manv', '$masach', 'Thay đổi')");
					$k = 1;
				}
			}
			if ($k == 0)
			{
				mysqli_query($con, "UPDATE sach SET tensach = '$tensach', tacgia = '$tacgia', dongia = '$dongia', soluong = '$soluong', theloai = '$theloai', anh = '$anh' WHERE masach = '$masach'");
				echo "Thay đổi thành công";
			}
		}
	}

?>