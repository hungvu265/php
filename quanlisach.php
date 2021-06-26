<!DOCTYPE html>
<html>
<head>
	<title>Quản lí sách</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<form action="quanlisach.php" method="POST">
	<div class="search">
		<table>
			<tr>
				<td></td>
				<th>QUẢN LÍ SÁCH</th>
			</tr>
			<tr>
				<th>Mã sách</th>
				<td><input type="text" name="masach"></td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<input type="submit" name="tim" value="Tìm">
					<input type="submit" name="them" value="Thêm sách">
					<input type="submit" name="quaylai" value="Quay lại">
				</td>
			</tr>
		</table>
	</div>	
</form>

<form method="GET">
	<?php
		require "connect.php";
		$take = mysqli_query($con, "SELECT * FROM sach");
		$TongDong = mysqli_num_rows($take);
		$Trang = ceil($TongDong/5);

		//Lay trang hien tai
		if(isset($_GET["trang"]))
		{
			$TrangHienTai = $_GET["trang"];
		}
		else
		{
			$TrangHienTai = 1;
		}
		

		//Lay so dong ung voi so trang
		$KetThuc = ($TrangHienTai * 5);
		$BatDau = $KetThuc - 5;
		$show = mysqli_query($con, "SELECT * FROM sach LIMIT $BatDau, $KetThuc");
		
		//Lay du lieu ra man hinh
		while($row = mysqli_fetch_assoc($show))
		{
			$masach = $row["masach"];
			$anh = $row["anh"];
			?>
			<div class="content" style="margin: 18px;">
				<table border="1" cellpadding="1">
					<tr align="center">
						<td><img src="<?php echo $anh; ?>" height="100" width="100"></td>
						<td><?php echo $row["masach"] ?></td>
						<td width="300"><?php echo $row["tensach"] ?></td>
						<td width="100"><?php echo $row["tacgia"] ?></td>
						<td width="100"><?php echo $row["dongia"] ?></td>
						<td width="100"><?php echo $row["soluong"] ?></td>
						<td width="100"><?php echo $row["theloai"] ?></td>
						<td><a href="test.php?thaydoi=<?php echo $masach; ?>">Thay đổi</a></td>
					</tr>
				</table>
			</div>	
			<?php
		}	

		//Tao lien ket den cac trang
		for($i=1; $i<=$Trang; $i++)
		{
			?>
				<a href="test.php?trang=<?php echo $i; ?>">Trang <?php echo $i; ?></a>	
			<?php
		}
	?>
</form>

<form method="GET">
	<?php
		if(isset($_GET["thaydoi"]))
		{
			session_start();
			$_SESSION["save"] = $_GET["thaydoi"];
			header("location: thaydoisach.php");
		}
	?>
</form>

<form method="POST">
<?php
	//Thêm sách
	if (isset($_POST["them"]))
	{
		header("Location: themsach.php");
	}
	//Quay lại
	if (isset($_POST["quaylai"]))
	{
		$manv = $_SESSION["kt"];
		$sq = mysqli_query($con, "SELECT manv FROM nhanvien");
		$de = mysqli_num_rows($sq);
		$k = 0;
		for ($i = 0; $i < $de; $i++)
		{
			$ou = mysqli_fetch_assoc($sq);
			{
				if ($manv == $ou["manv"])
				{
					header("location: nhanvien.php");
					$k = 1;
				}
			}
		}
		if ($k == 0)
		{
			header("Location: trangchu.php");
		}
	}

	//Tim sach
	
		if (!empty($_POST["masach"]))
		{
			session_start();
			$ma = $_POST["masach"];
			$_SESSION["save"] = $ma;
			while($row = mysqli_fetch_assoc($take))
			{
				if($ma == $row["masach"])
				{

					header("location: thaydoisach.php");
				}
			}
			echo "Không tìm thấy sách";
		}	
	
	
?>
</form>
</body>
</html>