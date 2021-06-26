<?php
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM muasach");
	$dem = mysqli_num_rows($sql);
	echo '<table border=1>';
	echo '<tr align=center>';
	echo "<td>Tài khoản"."</td>";
	echo "<td>Mã sách"."</td>";
	echo "<td>Số lượng mua"."</td>";
	echo "<td>Thành tiền"."</td>";
	echo "</tr>";
	for ($i = 0; $i < $dem; $i++)
	{
		$s = $i + 1;
		$out = mysqli_fetch_array($sql);
		$taikhoan = $out["taikhoan"];
		$masach = $out["masach"];
		$soluong = $out["soluong"];
		$tien[$i] = $out["tien"];
		echo '<tr align=center>';
		echo "<td>$taikhoan"."</td>";
		echo "<td>$masach"."</td>";
		echo "<td>$soluong"."</td>";
		echo "<td>$tien[$i]"."</td>";
		echo "</tr>";
	}
	echo "</table>";

	//Tính tổng tiền
	$tong = 0;
	if (isset($_POST["tinh"]))
	{
		for ($i = 0; $i < $dem; $i++)
		{
			$tong += $tien[$i];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản lí khách hàng</title>
</head>
<body>
	<form action="quanlikhachhang.php" method="POST">
	<tr></tr>
	<tr>
		<td>Tính tổng
			<input type="text" name="" value="<?php echo "$tong"; ?>">
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="tinh" value="Tính tổng">
			<input type="submit" name="quaylai" value="Quay lại">
		</td>
	</tr>
	</form>
</body>
</html>

<?php
	if (isset($_POST["quaylai"]))
	{
		header("location: trangchu.php");
	}
?>