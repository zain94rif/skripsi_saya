<?php
		require '../config/koneksi.php';
		include '../function/function.php';
    date_default_timezone_set("Asia/Jakarta");
    $tanggalsekarang = date("Y-m-d");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pengembalian Buku.xls");
	?>
<html>
<head>
	<title>Data</title>
</head>
<body>

	<table border="1">
		<tr>
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Buku</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>            
                      <th>Keterangan</th>            
        </tr>
		<?php

                      $myQry = mysqli_query($koneksiDb,datapeminjamanbuku()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $no = $myData['id_peminjaman'];                        
                        $id_siswa = $myData['id_siswa'];
                        $id_buku = $myData['id_buku'];
                        $tanggal_peminjaman = $myData['tanggal_peminjaman'];
                        $tanggal_pengembalian = $myData['tanggal_pengembalian'];
                        if (($tanggal_pengembalian == NULL) or ($tanggal_pengembalian == '') or ($tanggal_pengembalian == '0000-00-00' )) {
                          $tanggal_pengembalian = '-';
                        }

                        $myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $nama_siswa = $myData2['nama_siswa'];
                        }

                        $myQry2 = mysqli_query($koneksiDb,ambildatabuku3($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $judul_buku = $myData2['judul_buku'];
                        }      
                    ?>
                        <tr>
                          <td><?php echo $id_siswa ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $judul_buku ?></td>
                          <td><?php echo $tanggal_peminjaman ?></td>
                          <td><?php echo $tanggal_pengembalian ?></td> 
                          <?php
                            $targetkembali = date('Y-m-d',strtotime('+7 day',strtotime($tanggal_peminjaman)));
                            if($tanggal_pengembalian=='-'){
                              $targetkembali2 = new DateTime($targetkembali);
                              $tanggalsekarang2 = new DateTime($tanggalsekarang);
                              $sisahari = date_diff($tanggalsekarang2, $targetkembali2);
                              if ($tanggalsekarang < $targetkembali){
                                if ($sisahari->format('%d')<=3){
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('%d hari lagi'); ?></td>
                                  <?php
                                }
                                else{
                                  ?>
                                  <td style=""><?php echo $sisahari->format('%d hari lagi'); ?></td>
                                  <?php
                                }          
                              }else{
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('terlambat %d hari'); ?></td>
                                  <?php
                              }
                            }else{
                              $targetkembali2 = new DateTime($targetkembali);
                              $tanggal_pengembalian2 = new DateTime($tanggal_pengembalian);
                              if ($tanggal_pengembalian <= $targetkembali){
                                echo "<td>-</td>";
                              }else{
                                $sisahari = date_diff($targetkembali2, $tanggal_pengembalian2);
                                ?>
                                  <td style="color: red"><?php echo $sisahari->format('terlambat %d hari'); ?></td>
                                <?php
                              }
                              
                            }
                          ?>
                        </tr>
             <?php   }
             ?>
	</table>
</body>
</html>