<?php
	session_start();
	$manv = $_SESSION["save"];
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM nhanvien");
	$dem = mysqli_num_rows($sql);
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_array($sql);
		if ($manv == $out["manv"])
		{
			$hoten = $out["hoten"];
			$sdt = $out["sdt"];
			$mk = $out["pass"];
			$diachi = $out["diachi"];
		}
	}
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thay đổi thông tin</title>
</head>
<body>
	<form action="thaydoinv.php" method="POST">
		<table>
			<tr>
				<th>Mã nhân viên</th>
				<td><input type="text" name="manv" value="<?php echo $manv; ?>" readonly></td>
			</tr>
			<tr>
				<th>Họ và tên</th>
				<td><input type="text" name="hoten" value="<?php echo $hoten; ?>"></td>
			</tr>
			<tr>
				<th>Số điện thoại</th>
				<td><input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
			</tr>
			<tr>
				<th>Mật khẩu</th>
				<td><input type="text" name="mk" value="<?php echo $mk; ?>"></td>
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><input type="text" name="diachi" value="<?php echo $diachi; ?>"></td>
			</tr>

			<tr align="center">
				<td colspan="2">
					<input type="submit" name="thaydoi" value="Thay đổi">
					<input type="submit" name="xoa" value="Xoá">
					<input type="submit" name="quaylai" value="Quay lại">
					<input type="submit" name="lammoi" value="Làm mới">
				</td>
			</tr>
		</table>
	</form>
	<?php
		$con = mysqli_connect("localhost", "root", "", "bookstore");
	//Ấn nút thay đổi
		if (isset($_POST["thaydoi"]))
		{
			if (empty($_POST["mk"]))
			{
				echo "Mật khẩu không được để trống";
			}
			else
			{
				$manv = $_POST["manv"];
				$hoten = $_POST["hoten"];
				$sdt = $_POST["sdt"];
				$mk = $_POST["mk"];
				$diachi = $_POST["diachi"];
				mysqli_query($con, "UPDATE nhanvien SET hoten = '$hoten', sdt = '$sdt', pass = '$mk', diachi = '$diachi' WHERE manv = '$manv'");
				echo "Thay đổi thành công";
			}	
		}
	//Ấn nút xoá
		
		if (isset($_POST["xoa"]))
		{
				mysqli_query($con, "DELETE FROM nhanvien WHERE manv = '$manv'");
				header("location: quanlinhanvien.php");
		}
	//Ấn nút quay lại
		if (isset($_POST["quaylai"]))
		{
			header("Location: quanlinhanvien.php");
		}
		mysqli_close($con);
	//Ấn nút làm mới
		if (isset($_POST["lammoi"]))
		{
			$x = 1;
			header("Location: thaydoinv.php");
		}
	?>

</body>
</html>