<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$no = $_GET['id'];
	if(isset($no)){
		$mySql = "DELETE FROM tabel_peminjaman_buku WHERE id_peminjaman = '$no'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysql_error());
		if($myQry){			
			echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Peminjaman-Buku'>";			
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