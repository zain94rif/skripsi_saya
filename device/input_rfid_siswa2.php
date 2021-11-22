<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	if (isset($_GET['rfid'])) {
		$rfid = $_GET['rfid'];
		$id_siswa = $_GET['id'];
		echo $rfid."<br>";
		echo $id_siswa."<br>";
		$saldo = 0;
		$myQry3 = mysqli_query($koneksiDb,tambahdatarfid($id_siswa,$rfid, $saldo)) or die ("Query Salah : ".mysqli_error($koneksiDb));
		if ($myQry3) {
			echo"<meta http-equiv='refresh' content='0; url=input_rfid_siswa.php'>";
		}
	}

?>