<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<style>
		body{
			background: url(./d4bcc46e371e194b20854acd1ba3a86b.jpg) no-repeat;
			background-size: cover;
		}
		.login-box{
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			color: #e74c3c;
		}
		.login{
				
		}
	</style>
</head>
<body>

	<form action="dangnhap.php" method="POST"> 
	<table align="center" width="350" height="200" class="login-box">
		<tr>
			<td></td>
			<th align="center">ĐĂNG NHẬP</th>
		</tr>

		<tr>
			<td>Tên đăng nhập</td>
			<td><input type="text" name="taikhoan" class="login" placeholder="Tên đăng nhập"></td>
		</tr>

		<tr>
			<td>Mật khẩu</td>
			<td><input type="password" name="matkhau" class="pass" placeholder="Mật khẩu"></td>
		</tr> 

		<tr>
			<td></td>
			<td align="center"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
		</tr>
	</table>
	</form>

	<?php
		session_start();
		if (isset($_POST["dangnhap"]))
		{
			$taikhoan = array();
			$matkhau = array();
			$hoten = array();
			$con = mysqli_connect("localhost", "root", "", "bookstore");
			$show = mysqli_query($con, "SELECT manv, pass, hoten FROM nhanvien");
			$dem = mysqli_num_rows($show);
			for ($i = 0; $i < $dem; $i++)
			{
				$out = mysqli_fetch_assoc ($show);
				$hoten[$i] = $out["hoten"];
				$taikhoan[$i] = $out["manv"];
				$matkhau[$i] = $out["pass"];
			}
			mysqli_close($con);
				if ($_POST["taikhoan"] == "admin" && $_POST["matkhau"] == "admin")
				{
					$_SESSION["name"] = "Admin";
					$_SESSION["kt"] = "";
					header("Location: trangchu.php");
				}

				for ($i = 0; $i < $dem; $i++)
				{
					if ($taikhoan[$i] == $_POST["taikhoan"] && $matkhau[$i] == $_POST["matkhau"])
					{
						$_SESSION["name"] = $hoten[$i];
						$_SESSION["kt"] = $taikhoan[$i];
						header('Location: nhanvien.php');
					}
				}
			
			
				echo "Tên đăng nhập hoặc mật khẩu không đúng";
		}
	?>