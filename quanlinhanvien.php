<?php
//Kết nối đến sql và lấy thông tin
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM nhanvien");
	$dem = mysqli_num_rows($sql);
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_assoc($sql);
		$manv[$i] = $out["manv"];
		$hoten[$i] = $out["hoten"];
		$sdt[$i] = $out["sdt"];
		$mk[$i] = $out["pass"];
		$diachi[$i] = $out["diachi"];
	}
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lí nhân viên</title>
</head>
<body>
	<form action="quanlinhanvien.php" method="POST">
		<table>
			<tr>
				<td></td>
				<th>QUẢN LÍ NHÂN VIÊN</th>
			</tr>

			<tr>
				<th>Mã nhân viên</th>
				<td><input type="text" name="manv"></td>
			</tr>

			<tr align="center">
				<td colspan="2">
					<input type="submit" name="tim" value="Tìm">
					<input type="submit" name="them" value="Thêm nhân viên">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>
			</tr>
		</table>
	</form>
	<?php

//Chức năng tìm kiếm
	if (!empty($_POST["manv"]))
		{
			$k = 0;
			for ($i = 0; $i < $dem; $i++)
			{
				if ($manv[$i] == $_POST["manv"])
				{
					$k = 1;
					echo '<table border=1 bgcolor="#f2e4b3">';
					echo '<tr align="center">';
					echo "<th> Mã nhân viên"."</th>";
					echo "<th> Họ và tên"."</th>";
					echo "<th> Số điện thoại"."</th>";
					echo "<th> Mật khẩu"."</th>";
					echo "<th> Địa chỉ"."</th>";
					echo "<th> Tính năng"."</th>";
					echo "</tr>";
					echo '<tr align="center">';
					echo "<td> $manv[$i]"."</td>";
					echo "<td> $hoten[$i]"."</td>";
					echo "<td> $sdt[$i]"."</td>";
					echo "<td> $mk[$i]"."</td>";
					echo "<td> $diachi[$i]"."</td>";
					echo "<td>".'<!DOCTYPE html>
						<html>
						<body>
							<form action="quanlinhanvien.php" method="POST">
								<input type="submit" name="'.$i.'" value="Sửa">
							</form>
						</body>
						</html>'."</td>";
					echo "</tr>";
				}
			}
				for ($i = 0; $i < $dem; $i++)
				{
					if (isset($_POST[$i]))
					{
						session_start();
						$_SESSION["save"] = $manv[$i];
						header("location: thaydoinv.php");
					}
				}
			if ($k == 0)
				{
					echo "Không tìm thấy mã nhân viên";
				}
		}	
		else
		{
			echo '<table border=1 bgcolor="#f2e4b3">';
			echo "<tr>";
			echo "<th> STT"."</th>";
			echo "<th> Mã nhân viên"."</th>";
			echo "<th> Họ và tên"."</th>";
			echo "<th> Số điện thoại"."</th>";
			echo "<th> Mật khẩu"."</th>";
			echo "<th> Địa chỉ"."</th>";
			echo "<th> Tính năng"."</th>";
			echo "</tr>";
			for ($i = 0; $i < $dem; $i++)
			{
				$stt = $i + 1;
				echo '<tr align="center">';
				echo "<td>$stt"."</td>";
				echo "<td> $manv[$i]"."</td>";
				echo "<td> $hoten[$i]"."</td>";
				echo "<td> $sdt[$i]"."</td>";
				echo "<td> $mk[$i]"."</td>";
				echo "<td> $diachi[$i]"."</td>";
				echo "<td>".'<!DOCTYPE html>
						<html>
						<body>
							<form action="quanlinhanvien.php" method="POST">
								<input type="submit" name="'.$i.'" value="Sửa">
							</form>
						</body>
						</html>'."</td>";
				echo "</tr>";
				echo "</tr>";
			}
			echo "</table>";
			for ($i = 0; $i < $dem; $i++)
				{
					if (isset($_POST[$i]))
					{
						session_start();
						$_SESSION["save"] = $manv[$i];
						header("location: thaydoinv.php");
					}
				}
		}

//Chức năng thêm nhân viên
	if (isset($_POST["them"]))
	{
		header("Location: themnhanvien.php");
	}

//Chức năng sửa thông tin nhân viên
	if  (isset($_POST["thaydoi"]))
	{
		if (empty($_POST["manv"]))
		{
			echo "Nhập mã nhân viên cần thay đổi";
		}
		else
		{
			echo "Mã nhân viên không tồn tại";
		}
		for ($i = 0; $i < $dem; $i++)
		{
			if ($manv[$i] == $_POST["manv"])
			{
				session_start();
				$_SESSION["manv"] = $manv[$i];
				header("Location: thaydoinv.php");
			}
		}
	}

//Tạo đường dẫn quay lại trang chủ
	if (isset($_POST["quaylai"]))
	{
		header("Location: trangchu.php");
	}
	?>


</body>
</html>