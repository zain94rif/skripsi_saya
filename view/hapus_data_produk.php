<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id_produk = $_GET['id'];
	if(isset($id_produk)){
		$mySql = "DELETE FROM tabel_makanan WHERE id_makanan = '$id_produk'";
		$myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysql_error());
		if($myQry){			
			echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Produk'>";			
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