<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	date_default_timezone_set("Asia/Jakarta");
	$tanggal = date("Y/m/d");
	if (isset($_GET['total'])) {
		$total = $_GET['total'];
		$id = $_GET['id'];
		echo $total."<br>";
		echo $id."<br>";
		$myQry2 = mysqli_query($koneksiDb,datarfid2($id)) or die ("Query Salah : ".mysqli_error($koneksiDb));
		  $num = mysqli_num_rows($myQry2);
		  echo $num."<br>";
		  if($num == 1){
		   while ($myData = mysqli_fetch_array($myQry2)) {
		    $id_siswa = $myData['id_siswa'];
		    $nama_siswa = $myData['nama_siswa'];
		    $saldo_rfid = $myData['saldo_rfid'];
		   }
		  }
		$sisa = $saldo_rfid - $total;
		$myQry3 = mysqli_query($koneksiDb,tambahdatasaldo($id_siswa, $sisa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
		if ($myQry3) {
			echo"<meta http-equiv='refresh' content='0; url=update_saldo.php'>";
		}
	}

?>