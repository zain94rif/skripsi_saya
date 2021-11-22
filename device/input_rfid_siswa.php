<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	if (isset($_GET['rfid'])) {
		$rfid = $_GET['rfid'];
		echo $rfid."<br>";
		$saldo = 0;
		$myQry = mysqli_query($koneksiDb,datasiswa()) or die ("Query Salah : ".mysqli_error($koneksiDb));
		while($myData = mysqli_fetch_array($myQry)){
			$id_siswa = $myData['id_siswa'];
			echo $id_siswa."<br>";
			$myQry2 = mysqli_query($koneksiDb,datarfid($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
			$num = mysqli_num_rows($myQry2);
			if($num == 0){
				// echo $id_siswa."<br>";
				$myQry3 = mysqli_query($koneksiDb,tambahdatarfid($id_siswa,$rfid, $saldo)) or die ("Query Salah : ".mysqli_error($koneksiDb));
				if ($myQry3) {
					echo"<meta http-equiv='refresh' content='0; url=input_rfid_siswa.php'>";
				}
			}
		}
	}

?>