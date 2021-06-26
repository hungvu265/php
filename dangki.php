<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng kí tài khoản</title>
</head>
<body>
	<form action="dangki.php" method="POST">
		<table>
			<tr>
				<th colspan="2" align="center">Thông tin khách hàng</th>
			</tr>
			<tr>
				<th>Tên tài khoản</th>
				<td><input type="text" name="taikhoan"></td>
			</tr>
			<tr>
				<th>Mật khẩu</th>
				<td><input type="password" name="matkhau"></td>
			</tr>
			<tr>
				<th>Nhập lại mật khẩu</th>
				<td><input type="password" name="rematkhau"></td>
			</tr>
			<tr>
				<th>Họ và tên</th>
				<td><input type="text" name="hoten"></td>
			</tr>
			<tr>
				<th>Số điện thoại</th>
				<td><input type="text" name="sdt"></td>
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><input type="text" name="diachi"></td>
			</tr>
			<tr>
				<th>Giới tính</th>
				<td>Nam<input type="radio" name="gioitinh" value="Nam" checked="Nam">Nữ<input type="radio" name="gioitinh" value="Nữ"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="dangki" value="Đăng kí">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php 
	//Đăng kí
	if (isset($_POST["dangki"])) 
	{
		$taikhoan = $_POST["taikhoan"];
		$con = mysqli_connect("localhost", "root", "", "bookstore");
		$sql = mysqli_query($con, "SELECT * FROM khachhang");
		while ($row = mysqli_fetch_array($sql))
		{
			if ($taikhoan == $row["taikhoan"])
			{
				echo "Tài khoản đã tồn tại"."<br>";
			}
		}
		if (empty($_POST["taikhoan"]) || empty($_POST["matkhau"]))
		{
			echo "Cần điều đầy đủ thông tin";
		}
		elseif (empty($_POST["diachi"]) || empty($_POST["sdt"]))
		{
			echo "Cần điều địa chỉ và số điện thoại";
		}
		elseif($_POST["matkhau"] != $_POST["rematkhau"])
		{
			echo "2 mật khẩu không trùng khớp";
		}
		else
		{
			$matkhau = $_POST["matkhau"];
			$hoten = $_POST["hoten"];
			$sdt = $_POST["sdt"];
			$diachi = $_POST["diachi"];
			$gioitinh = $_POST["gioitinh"];
			mysqli_query($con, "INSERT INTO khachhang (taikhoan, matkhau, hoten, sdt, diachi, gioitinh) VALUES ('$taikhoan', '$matkhau', '$hoten', '$sdt', '$diachi', '$gioitinh')");
			echo "Đăng kí thành công";
		}
	}

	//Quay lại
	if (isset($_POST["quaylai"]))
	{
		header("location: bookstore.php");
	}
?>