<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	if (isset($_GET['tg'])) {
		$tg = $_GET['tg'];
		$id = $_GET['id'];
		echo $tg."<br>";
		echo $id."<br>";
		$id = substr($id, 4);
		echo $id."<br>";
		$myQry3 = mysqli_query($koneksiDb,updateidtg2($id, $tg)) or die ("Query Salah : ".mysqli_error($koneksiDb));
		if ($myQry3) {
			echo"<meta http-equiv='refresh' content='0; url=updateidtg2.php'>";
		}
	}

?>