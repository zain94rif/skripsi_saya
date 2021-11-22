<?php
 require '../config/koneksi.php';
 include '../function/function.php';
 if ((isset($_GET['id'])) && (isset($_GET['hari'])) && (isset($_GET['jam']))) {
  $id = $_GET['id'];
  $hari = $_GET['hari'];
  $jam = $_GET['jam'];
  $myQry2 = mysqli_query($koneksiDb,datamatkul2($id, $hari, $jam)) or die ("Query Salah : ".mysqli_error($koneksiDb));
  $num = mysqli_num_rows($myQry2);
  if ($num!=0) {
   echo "1";
  }else{
   echo "0";
  }
 }
?>