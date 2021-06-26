<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Book Store</title>
</head>
<body>
	<table bgcolor="#f2e4b3">
		<tr>
			<td>
				<img src="images//50322036_354454445144818_3415380538062536704_n.gif" width="auto" height="200">
			</td>
			<td colspan="2" align="center">
				<h1>Xin chào <?php
					session_start();
					$taikhoan = $_SESSION["name"];
					echo "$taikhoan";
				?></h1>
				<a href="dangnhap.php" style="text-decoration: none"><font color="#6c86a0"><button>Đăng xuất</button>
				
			</td>
			<td align="center">
				<img src="images/103868761_640513269836865_7928669243785621807_n.gif" width="auto" height="200">
			</td>
		</tr>
		<tr></tr>
		<tr>
			<form action="trangchu.php" method="post">
			<td align="center"><a href="quanlinhanvien.php" style="text-decoration: none"><font color="#6c86a0">Quản lí nhân viên</font></a></td>
			<td align="center"><a href="quanlikhachhang.php" style="text-decoration: none"><font color="#6c86a0">Quản lí khách hàng</font></a></td>
			<td align="center"><a href="quanlisach.php" style="text-decoration: none"><font color="#6c86a0">Quản lí sách</font></a></td>
			<td align="center"><a href="hoatdong.php" style="text-decoration: none"><font color="#6c86a0">Hoạt động</font></a></td>
			</form>
		</tr>
		<tr>
			<td>
				<picture>
					<img src="images/122284630_359880508794012_6519360062423135220_n.jpg" width="auto" height="200">
				</picture>
			</td>
			<td>
				<picture>
					<img src="images/120048922_1176376059429252_1798409325575403040_n.jpg" width="auto" height="200">
				</picture>
			</td>
			<td>
				<picture>
					<img src="images/122234687_2757437304496326_8818449316274736010_n.jpg" width="auto" height="200">
				</picture>
			</td>
			<td>
				<picture>
					<img src="images/122458598_386219915752041_416800671665016682_n.jpg" width="auto" height="200">
				</picture>
			</td>
		</tr>
	</table>
	
</body>
</html>