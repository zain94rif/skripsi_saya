<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

  $no = $_GET['id'];
  date_default_timezone_set("Asia/Jakarta");
  $tanggal = date('Y-m-d');
  if(isset($no)){
    $mySql = "UPDATE tabel_peminjaman_buku SET tanggal_pengembalian = '$tanggal'
        WHERE id_peminjaman = '$no';
    ";
    $myQry = mysqli_query($koneksiDb,$mySql) or die ("Gagal Query1" .mysql_error());
    if($myQry){     
      echo"<meta http-equiv='refresh' content='0; url=?Open=Buku-Masih-Dipinjam'>";      
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