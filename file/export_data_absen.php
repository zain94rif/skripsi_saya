<?php
		require '../config/koneksi.php';
		include '../function/function.php';

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Absen.xls");
	?>
<html>
<head>
	<title>Data</title>
</head>
<body>

	<table border="1">
		<tr>
                      <th>Tanggal</th>                    
                      <th>Hari</th>
                      <th>Mata Pelajaran</th>
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Masuk</th>
        </tr>
		<?php

                      $myQry = mysqli_query($koneksiDb,dataabsen()) or die ("Query Salah : ".mysql_error());
                      while($myData = mysqli_fetch_array($myQry)){
                        $id_jadwal = $myData['id_jadwal'];
                        $hari = $myData['hari'];
                        $mata_pelajaran = $myData['mata_pelajaran'];
                        $jam_masuk = $myData['jam_masuk'];
                        $jam_keluar = $myData['jam_keluar'];
                        $no = $myData['no'];
                        $id_siswa = $myData['id_siswa'];
                        $tanggal_absensi = $myData['tanggal_absensi'];
                        $masuk = $myData['masuk'];
                        $nama_siswa = $myData['nama_siswa'];
                        $myQry2 = mysqli_query($koneksiDb,datamatapelajaran2($mata_pelajaran)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $mata_pelajaran = $myData2['mata_pelajaran'];
                        }       
                    ?>
                        <tr>
                          <td><?php echo $tanggal_absensi ?></td>
                          <td><?php echo $hari ?></td>
                          <td><?php echo $mata_pelajaran ?></td>
                          <td><?php echo $id_siswa ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $masuk ?></td>
                        </tr>
             <?php   }
             ?>
	</table>
</body>
</html>