<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	$myQry = mysqli_query($koneksiDb,ceknamasiswa($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
	while($myData = mysqli_fetch_array($myQry)){
		$hp_ortu = $myData['hp_ortu_siswa'];
		$foto = $myData['foto_siswa'];
	}
	$myQry = mysqli_query($koneksiDb,datarfid($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
	while($myData = mysqli_fetch_array($myQry)){
		$id_rfid = $myData['id_rfid'];
	}
	if(isset($id)){
		$mySql = "DELETE FROM tabel_rfid WHERE id_siswa = '$id'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		if($myQry){
			$mySql = "DELETE FROM tabel_siswa WHERE id_siswa = '$id'";
			$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
			if($myQry){
				$xx = 'ortu'.$id;
				$mySql = "DELETE FROM tabel_user WHERE id_user = '$id' OR id_user = '$xx'";
				$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
				if($myQry){
					if (file_exists($foto)) {
		            	unlink($foto);
			        }
					echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Siswa'>";
				}
			}
		}	
	}else{
		echo "Data yang dihapus tidak ada";
	}

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>