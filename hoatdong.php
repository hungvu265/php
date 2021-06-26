<?php
	echo '<table border = 1>';
	echo "<tr>";
	echo "<th>STT"."</th>";
	echo "<th>Mã nhân viên"."</th>";
	echo "<th>Mã sách"."</th>";
	echo "<th>Kiểu"."</th>";
	echo "</tr>";
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	$sql = mysqli_query($con, "SELECT * FROM hoatdong");
	$dem = mysqli_num_rows($sql);
	for ($i = 0; $i < $dem; $i++)
	{
		$out = mysqli_fetch_assoc($sql);
		$manv[$i] = $out["manv"];
		$masach[$i] = $out["masach"];
		$kieu[$i] = $out["kieu"];
	}
	for ($i = 0; $i < $dem; $i++)
	{
		$s = $i + 1;
		echo "<tr>";
		echo "<th>$s"."</th>";
		echo "<th>$manv[$i]"."</th>";
		echo "<th>$masach[$i]"."</th>";
		echo "<th>$kieu[$i]"."</th>";
		echo "</tr>";
	}
	echo "</table>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<button><a href="trangchu.php" style="text-decoration: none;">Quay lại</a></button>
</body>
</html>