<?php
 require '../config/koneksi.php';
 include '../function/function.php';
$myQry = mysqli_query($koneksiDb,ambildatabuku2()) or die ("Query Salah : ".mysqli_error($koneksiDb));
while($myData = mysqli_fetch_array($myQry)){
    $id_buku = $myData['id_buku'];
    $judul_buku = $myData['judul_buku'];
    $penulis_buku = $myData['penulis_buku'];
    $penerbit_buku = $myData['penerbit_buku'];
    $rfid = $myData['rfid'];
    echo $id_buku."|".$judul_buku."|".$penulis_buku."|".$penerbit_buku."|".$rfid."||";
}
?>
