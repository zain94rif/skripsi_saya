<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	$kelas = $_GET['kelas'];
	if(isset($id) and isset($kelas)){
		$mySql = "DELETE FROM tabel_jadwal WHERE id_jadwal = '$id'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		if($myQry){			
			echo"<meta http-equiv='refresh' content='0; url=?Open=Lihat-Jadwal-Pelajaran&id=$kelas'>";			
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