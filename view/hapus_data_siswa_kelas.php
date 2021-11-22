<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	$siswa = $_GET['siswa'];
	if(isset($id)){
		$mySql = "DELETE FROM tabel_pembagian_kelas WHERE kelas = '$id' AND id_siswa = '$siswa'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		if($myQry){
			echo"<meta http-equiv='refresh' content='0; url=?Open=Lihat-Data-Kelas&id=$id'>";			
		}	
	}

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>