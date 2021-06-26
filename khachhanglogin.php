<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
</head>
<body>
	<form action="khachhanglogin.php" method="POST">
		<table align="center">
			<tr>
				<th colspan="2" align="center">Đăng nhập</th>
			</tr>
			<tr>
				<th>Tài khoản</th>
				<td><input type="text" name="taikhoan"></td>
			</tr>
			<tr>
				<th>Mật khẩu</th>
				<td><input type="password" name="matkhau"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="dangnhap" value="Đăng nhập">
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
		header("location: bookstore.php");
	}

	//Đăng nhập
	if (isset($_POST["dangnhap"]))
	{
		$taikhoan = $_POST["taikhoan"];
		$matkhau = $_POST["matkhau"];
		$con = mysqli_connect("localhost", "root", "", "bookstore");
		$sql = mysqli_query($con, "SELECT * FROM khachhang");
		$dem = mysqli_num_rows($sql);
		for ($i = 0; $i < $dem; $i++)
		{
			$out = mysqli_fetch_array($sql);
			if ($taikhoan == $out["taikhoan"] && $matkhau == $out["matkhau"])
			{
				session_start();
				$_SESSION["khachhang"] = $taikhoan;
				header("location: timkiem.php");
			}
		}
		echo "Tài khoản hoặc mật khẩu không đúng";
	}
?>