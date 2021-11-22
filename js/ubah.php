<?php
	require '../config/koneksi.php';
	include '../function/function.php';

	$kelas = $_GET['kelas'];
	// echo $kelas;

	$myQry2 = mysqli_query($koneksiDb, cekdataabsen2($kelas)) or die ("Query Salah : ".mysql_error($koneksiDb));
 			while ($myData = mysqli_fetch_array($myQry2)) {
				$id_siswa = $myData['id_siswa'];
				$nama_siswa = $myData['nama_siswa'];
				$jenis_kelamin = $myData['jenis_kelamin'];
				$alamat_siswa = $myData['alamat_siswa'];
				$status_siswa = $myData['status_siswa'];
				$foto_siswa = $myData['foto_siswa'];
				if (($foto_siswa == null) or ($foto_siswa == "")) {
					$foto_siswa = 'image/user.png';
				}
 	?>
					<!-- <center> -->
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<tbody>
								<tr>
									<td style="align-content: center;" rowspan="5">			
	 									<center>			
	 										<img src="../<?= $foto_siswa; ?>" alt="<?= $foto_siswa; ?>" style="width: 25%;" >
	 									</center>
 									</td>
									<td style="text-align: center;"><?= $id_siswa; ?></td>
								</tr>
								<tr>
	 								<td style="text-align: center;"><?= $nama_siswa; ?></td>
	 							</tr>
								<tr>
	 								<td style="text-align: center;"><?= $jenis_kelamin; ?></td>
	 							</tr>
	 							<tr>						
	 								<td style="text-align: center;"><?= $alamat_siswa; ?></td>
	 							</tr>
	 							<tr>						
	 								<td style="text-align: center;"><?= $status_siswa; ?></td>
	 							</tr>
							</tbody>
							</table>						
					<!-- </center> -->
<?php
	}

?>