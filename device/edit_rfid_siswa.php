<?php
 require '../config/koneksi.php';
 include '../function/function.php';
 if ((isset($_GET['rfid'])) && (isset($_GET['id']))) {
  $rfid = $_GET['rfid'];
  $id = $_GET['id'];
  echo $rfid."<br>";
  echo $id."<br>";
  $myQry2 = mysqli_query($koneksiDb,datarfid($id)) or die ("Query Salah : ".mysql_error());
  $num = mysqli_num_rows($myQry2);
  if($num == 1){
   while ($myData = mysqli_fetch_array($myQry2)) {
    $saldo = $myData['saldo_rfid'];
   }
   $myQry3 = mysqli_query($koneksiDb,hapusdatarfid($id)) or die ("Query Salah : ".mysql_error());
   if ($myQry3) {
    $myQry4 = mysqli_query($koneksiDb,tambahdatarfid($id,$rfid, $saldo)) or die ("Query Salah : ".mysql_error());
    if ($myQry4) {
     echo"<meta http-equiv='refresh' content='0; url=edit_rfid_siswa.php'>";
    }
   }
  }

 }

?>