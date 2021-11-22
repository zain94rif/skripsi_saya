<?php
	require '../config/koneksi.php';
	include '../function/function.php';

		// $rfid = $_POST['gamb'];
		// echo $rfid ;

 	$myQry2 = mysqli_query($koneksiDb, pembaruan()) or die ("Query Salah : ".mysql_error());
 		// $num = mysqli_num_rows($myQry2);
 		// if($num == 1){
 			while ($myData = mysqli_fetch_array($myQry2)) {
 				$id_siswa = $myData['id_jadwal'];
 				$nama_siswa = $myData['id_siswa'];
 				$jenis_kelamin = $myData['tanggal_absensi'];
 				$foto_siswa = $myData['masuk'];
 				// if (($foto_siswa == null) or ($foto_siswa == "")) {
 				// 	$foto_siswa = 'image/user.png';
 				// }
 			}
 		// }
 	?>
  	<center>
 						<table>
 							<tr>
 								<th style="text-align: center;">Data diri</th>
 							</tr>
 							<tr>
 								<td style="align-content: center;">			
 									<center>			
 										<!-- <img src="" style="height: 50% "> -->
 										<td style="text-align: center;"><?= $foto_siswa; ?></td>
 									</center>
 								</td>
 							</tr>
 							<tr>
 								<td style="text-align: center;"><?= $id_siswa; ?></td>
 							</tr>
 							<tr>						
 								<td style="text-align: center;"><?= $nama_siswa; ?></td>
 							</tr>
 							<tr>						
 								<td style="text-align: center;"><?= $jenis_kelamin; ?></td>
 							</tr>
 						</table>						
 					</center>