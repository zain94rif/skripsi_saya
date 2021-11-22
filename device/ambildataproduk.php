<?php
 require '../config/koneksi.php';
 include '../function/function.php';
$myQry = mysqli_query($koneksiDb,dataproduk()) or die ("Query Salah : ".mysqli_error($koneksiDb));
while($myData = mysqli_fetch_array($myQry)){
    $id_produk = $myData['id_makanan'];
    $nama_makanan = $myData['nama_makanan'];
    $harga_makanan = $myData['harga_makanan'];
    $stok_makanan = $myData['stok_makanan'];
    echo $id_produk."|".$nama_makanan."|".$harga_makanan."|".$stok_makanan."||";
}
?>
