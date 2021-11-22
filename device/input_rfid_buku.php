<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	if (isset($_GET['rfid'])) {
		$rfid = $_GET['rfid'];
		$id = $_GET['id'];
		echo $rfid."<br>";
		echo $id."<br>";
		$myQry3 = mysqli_query($koneksiDb,tambahrfidbuku($id, $rfid)) or die ("Query Salah : ".mysqli_error($koneksiDb));
		if ($myQry3) {
			echo"<meta http-equiv='refresh' content='0; url=input_rfid_buku.php'>";
		}
	}

?>