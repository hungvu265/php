<?php
	session_start();
	$masach = $_SESSION["masach"];
	$taikhoan = $_SESSION["khachhang"];
	$soluongmua = $_SESSION["soluongmua"];
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM sach");
	$kh = mysqli_query($con, "SELECT * FROM khachhang");
	$demkh = mysqli_num_rows($kh);
	$dem = mysqli_num_rows($sql);
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_array($sql);
		if ($masach == $out["masach"])
		{
			$tensach = $out["tensach"];
			$tacgia = $out["tacgia"];
			$dongia = $out["dongia"];
			$soluong = $out["soluong"];
			$theloai = $out["theloai"];
		}
	}
	for ($i = 0; $i < $demkh; $i++)
	{
		$outt = mysqli_fetch_array($kh);
		if ($taikhoan == $outt["taikhoan"])
		{
			$hoten = $outt["hoten"];
			$sdt = $outt["sdt"];
			$diachi = $outt["diachi"];
		}
	}
	$tien = $soluongmua * $dongia;		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hóa đơn mua sách</title>
</head>
<body>
	<form action="hoadon.php" method="POST">
		<table>
			<tr>
				<h2>Giao dịch thành công</h2>
			</tr>
			<tr>
				<th colspan="2" align="center">Hóa đơn mua sách</th>
			</tr>
			<tr>
				<th>Tên sách</th>
				<td><input type="text" name="tensach" value="<?php echo "$tensach"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Tác giả</th>
				<td><input type="text" name="tacgia" value="<?php echo "$tacgia"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Đơn giá</th>
				<td><input type="text" name="dongia" value="<?php echo "$dongia"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Thể loại</th>
				<td><input type="text" name="theloai" value="<?php echo "$theloai"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Số lượng mua</th>
				<td><input type="number" name="soluongmua" value="<?php echo "$soluongmua"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Thành tiền</th>
				<td><input type="text" name="tien" value="<?php echo "$tien"; ?>" readonly></td>
			</tr>
			<tr>
				<th colspan="2">Thông tin người nhận</th>
			</tr>
			<tr>
				<th>Họ và tên</th>
				<td><input type="text" name="hoten" value="<?php echo "$hoten"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Số điện thoại</th>
				<td><input type="text" name="sdt" value="<?php echo "$sdt"; ?>" readonly></td>
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><input type="text" name="diachi" value="<?php echo "$diachi"; ?>" readonly></td>
			</tr>
			<tr>
				<td><input type="submit" name="quaylai" value="Quay lại"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	if(isset($_POST["quaylai"]))
	{
		header("location: timkiem.php");
	}
?>