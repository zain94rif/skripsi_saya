<?php
 require '../config/koneksi.php';
 include '../function/function.php';
$myQry = mysqli_query($koneksiDb,ambildatasiswa()) or die ("Query Salah : ".mysqli_error($koneksiDb));
while($myData = mysqli_fetch_array($myQry)){
    $id_siswa = $myData['id_siswa'];
    $nama_siswa = $myData['nama_siswa'];
    $id_rfid = $myData['id_rfid'];
    $saldo = $myData['saldo_rfid'];
    $password = $myData['password'];
    echo $id_siswa."|".$nama_siswa."|".$id_rfid."|".$saldo."|".$password."||";
}
?>
