
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thư viện sách</title>
</head>
<body>
	<form action="timkiem.php" method="POST">
		<table>
			<tr>
				<td></td>
				<th>Tìm kiếm sách</th>
			</tr>
			<tr>
				<th>Thể loại</th>
				<td><select name="theloai">
					<option>Văn học</option>
					<option>Sách giáo khoa</option>
					<option>Khoa học</option>
					<option>Truyện tranh</option>
				</select></td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<input type="submit" name="tim" value="Tìm">
					<input type="submit" name="quaylai" value="Đăng xuất">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php 
	session_start();
	//Quay lại
	if(isset($_POST["quaylai"]))
	{
		header("location: bookstore.php");
	}
	$con = mysqli_connect("localhost", "root", "", "bookstore");
	//Tìm kiếm

	if (!empty($_POST["theloai"]))
	{
		$theloai = $_POST["theloai"];
		$sql = mysqli_query($con, "SELECT * FROM sach WHERE theloai = '$theloai'");
		$dem = mysqli_num_rows($sql);
		$_SESSION["dem"] = $dem;
		echo '<table border=1>';
		echo '<tr align=center>';
		echo "<td> STT"."</td>";
		echo "<td> Ảnh"."</td>";
		echo "<td> Tên sách"."</td>";
		echo "<td> Tác giả"."</td>";
		echo "<td> Đơn giá"."</td>";
		echo "<td> Số lượng"."</td>";
		echo "<td> Thể loại"."</td>";
		echo "<td> Chức năng"."</td>";
		echo "</tr>";
		for ($i = 0; $i < $dem; $i++)
		{
			$s = $i + 1;
			$out = mysqli_fetch_array($sql);
			$masach[$i] = $out["masach"];
			$tensach = $out["tensach"];
			$tacgia = $out["tacgia"];
			$dongia = $out["dongia"];
			$soluong = $out["soluong"];
			$anh = $out["anh"];
			$theloai = $out["theloai"];
			echo '<tr align=center>';
			echo "<td> $s"."</td>";
			echo "<td>".'<!DOCTYPE html>
						<html>
						<body>
							<img src='.$anh.' width=100 height=auto>
						</body>
						</html>'."</td>";
			echo "<td> $tensach"."</td>";
			echo "<td> $tacgia"."</td>";
			echo "<td> $dongia"."</td>";
			echo "<td> $soluong"."</td>";
			echo "<td> $theloai"."</td>";
			echo "<td>".'<!DOCTYPE html>
				<html>
				<body>
					<form action="timkiem.php" method="POST">
						<input type="submit" name='.$masach[$i].' value="Xem">
					</form>
				</body>
				</html>'."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	$show = mysqli_query($con, "SELECT (masach) FROM sach");
	$demm = mysqli_num_rows($show);
	for ($i = 0;$i < $demm; $i++)
	{
		$outt = mysqli_fetch_array($show);
		$mua = $outt["masach"];
		if (isset($_POST["$mua"]))
			{
				session_start();
				$_SESSION["masach"] = $mua;
				header("location: muasach.php");
			}
	}
?>

