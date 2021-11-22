<?php
 require '../config/koneksi.php';
 include '../function/function.php';

 date_default_timezone_set("Asia/Jakarta");
 if (isset($_GET['rfid'])) {
  $rfid = $_GET['rfid'];
  $myQry2 = mysqli_query($koneksiDb,datarfid2($rfid)) or die ("Query Salah : ".mysqli_error($koneksiDb));
  $num = mysqli_num_rows($myQry2);
  // echo $num."<br>";
  if($num == 1){
   while ($myData = mysqli_fetch_array($myQry2)) {
    $id_siswa = $myData['id_siswa'];
    $nama_siswa = $myData['nama_siswa'];
    $jenis_kelamin = $myData['jenis_kelamin'];
    $foto_siswa = $myData['foto_siswa'];
    if (($foto_siswa == null) or ($foto_siswa == "")) {
     $foto_siswa = 'image/user.png';
    }
   }
  }
  $tanggal = date("Y/m/d");
  $jam = date("H:i:s");

  $myQry = mysqli_query($koneksiDb,datajadwal2()) or die ("Query Salah : ".mysqli_error($koneksiDb));
  // echo datajadwal2()."<br>";
  $num = mysqli_num_rows($myQry);
  // echo $num."<br>";
  if($num == 1){
   while ($myData = mysqli_fetch_array($myQry)) {
    $id_jadwal = $myData['id_jadwal'];
   }
   $myQry = mysqli_query($koneksiDb, dataabsen2($id_siswa, $id_jadwal, $tanggal)) or die ("Query Salah : ".mysqli_error($koneksiDb));
   $num = mysqli_num_rows($myQry);
   // echo dataabsen2($id_siswa, $id_jadwal)."<br>";
   echo $num;
   if($num == 0){
    $myQry = mysqli_query($koneksiDb,inputabsensi($id_siswa, $id_jadwal, $tanggal, $jam)) or die ("Query Salah : ".mysqli_error($koneksiDb));
    // echo inputabsensi($id_siswa, $id_jadwal, $tanggal, $jam);
   }
  }
 }

?>