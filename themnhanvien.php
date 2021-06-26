<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm nhân viên</title>
</head>
<body>
	<form action="themnhanvien.php" method="POST">
		<table bgcolor="#f2e4b3">
			<tr>
				<td></td>
				<th>Thông tin nhân viên</th>
			</tr>
			
			<tr>
				<td>Mã nhân viên</td>
				<td><input type="text" name="manv"></td>
			</tr>
			<tr>
				<td>Họ và tên</td>
				<td><input type="text" name="hoten"></td>
			</tr>			
			<tr>
				<td>Số điện thoại</td>
				<td><input type="text" name="sdt"></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="matkhau"></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu</td>
				<td><input type="password" name="rematkhau"></td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" name="diachi"></td>
			</tr>
			
			<tr>
				<td></td>
				<td align="center"><input type="submit" name="dangki" value="Đăng kí">
				<input type="submit" name="quaylai" value="Quay lại">
				</td>

			</tr>
		</table>
	</form>
	<?php
		$k = 0;
		$con = mysqli_connect("localhost", "root", "", "bookstore");
		$sql = mysqli_query($con, "SELECT manv FROM nhanvien");
		$dem = mysqli_num_rows($sql);
		if (isset($_POST["dangki"]))
		{
			$manv = $_POST["manv"];
			$str = strlen($manv);
			if (empty($_POST["manv"]) || empty($_POST["matkhau"]))
			{
				echo "Cần điền đầy đủ thông tin";
				echo "<br>";
			}
			elseif ($_POST["matkhau"] != $_POST["rematkhau"]) 
			{
				echo "Mật khẩu không trùng khớp";
			}
			elseif ($str != 6) 
			{
				echo "Mã nhân viên phải có độ dài là 6 kí tự";
			}
			else
			{
				for ($i = 0; $i < $dem; $i++)
				{
					$out = mysqli_fetch_assoc($sql);
					if ($_POST["manv"] == $out["manv"])
					{
						echo "Mã nhân viên này đã tồn tại";
						$k = 1;
					}
				}	
				if ($k == 0)
					{
					$manv = $_POST["manv"];
					$hoten = $_POST["hoten"];
					$sdt = $_POST["sdt"];
					$matkhau = $_POST["matkhau"];
					$diachi = $_POST["diachi"];
					$con = mysqli_connect("localhost", "root", "", "bookstore");
					mysqli_query($con, "INSERT INTO nhanvien (manv, hoten, sdt, pass, diachi) VALUES ('$manv', '$hoten', '$sdt', '$matkhau', '$diachi')");
					mysqli_close($con);
					echo "Đăng kí thành công!";
					}
			}
		}
		if (isset($_POST["quaylai"]))
		{
			header("Location: quanlinhanvien.php");
		}
		?>
</body>
</html>