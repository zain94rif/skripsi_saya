<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	if(isset($id)){
		$mySql = "DELETE FROM tabel_kelas WHERE no = '$id'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		if($myQry){
			echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Kelas'>";			
		}	
	}

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>