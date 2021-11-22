<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	if(isset($id)){
		$mySql = "DELETE FROM tabel_user WHERE id_user = '$id'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		if($myQry){			
			echo"<meta http-equiv='refresh' content='0; url=?Open=Data-User'>";			
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