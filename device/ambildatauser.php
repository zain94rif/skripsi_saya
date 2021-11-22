<?php
 require '../config/koneksi.php';
 include '../function/function.php';
$myQry = mysqli_query($koneksiDb,ambildatauser()) or die ("Query Salah : ".mysqli_error($koneksiDb));
while($myData = mysqli_fetch_array($myQry)){
    $id_user = $myData['id_user'];
    echo $id_user."|";
}
?>
