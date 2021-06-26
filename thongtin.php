<?php
	session_start();
	$manv = $_SESSION["kt"];
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM nhanvien");
	$dem = mysqli_num_rows($sql);
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_assoc($sql);
		if ($manv == $out["manv"])
		{
			$hoten = $out["hoten"];
			$sdt = $out["sdt"];
			$mk = $out["pass"];
			$diachi = $out["diachi"];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thông tin cá nhân</title>
</head>
<body>
	<form action="thongtin.php" method="POST">
		<table>
			<tr>
				<td></td>
				<th>THÔNG TIN CÁ NHÂN</th>
			</tr>
			<tr>
				<td>Mã nhân viên</td>
				<td><input type="text" name="manv" value="<?php echo $manv; ?>" readonly></td>
			</tr>
			<tr>
				<td>Họ và tên</td>
				<td><input type="text" name="hoten" value="<?php echo $hoten; ?>"></td>
			</tr>
			<tr>
				<td>Số điện thoại</td>
				<td><input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="text" name="mk" value="<?php echo $mk; ?>"></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="diachi" value="<?php echo $diachi; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="thaydoi" value="Thay đổi">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	if (isset($_POST["quaylai"]))
	{
		header("location: nhanvien.php");
	}

	//Thay đổi thông tin
	if (isset($_POST["thaydoi"]))
	{
		if (empty($_SESSION["mk"]))
		{
			echo "Mật khẩu không được để trống";
		}
		else
		{
			$hoten = $_POST["hoten"];
			$sdt = $_POST["sdt"];
			$mk = $_POST["mk"];
			$diachi = $_POST["diachi"];
			mysqli_query($con, "UPDATE nhanvien SET hoten='$hoten', sdt='$sdt', pass='$mk', diachi='$diachi' WHERE manv = '$manv'");
			echo "Thay đổi thành công";
		}
	}
?>