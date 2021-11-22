<?php
		require '../config/koneksi.php';
		include '../function/function.php';
    date_default_timezone_set("Asia/Jakarta");
    $tanggalsekarang = date("Y-m-d");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pembelian.xls");
	?>
<html>
<head>
	<title>Data</title>
</head>
<body>

	<table border="1">
		<tr>
                  <th>Tanggal Pembelian</th>
                  <th>NIS</th>
                  <th>Siswa</th>                    
                  <th>ID Makanan</th>
                  <th>Nama Makanan</th>            
        </tr>
<?php
                  $myQry = mysqli_query($koneksiDb,datapembelian()) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $no = $myData['no'];
                    $id_produk = $myData['id_makanan'];
                    $id_siswa = $myData['id_siswa'];
                    $tanggal_pembelian = $myData['tanggal_pembelian'];

                    $myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Query Salah : ".mysql_error());
                    while($myData2 = mysqli_fetch_array($myQry2)){
                      $nama_siswa = $myData2['nama_siswa'];
                    }
                    $myQry2 = mysqli_query($koneksiDb,cekdataproduk($id_produk)) or die ("Query Salah : ".mysql_error());
                    while($myData2 = mysqli_fetch_array($myQry2)){
                      $nama_makanan = $myData2['nama_makanan'];
                    }

                ?>
                    <tr>
                      <td><?php echo $tanggal_pembelian ?></td>
                      <td><?php echo $id_siswa ?></td>
                      <td><?php echo $nama_siswa ?></td>
                      <td><?php echo $id_produk ?></td>
                      <td><?php echo $nama_makanan ?></td>
                    <?php
                  }
                    ?>
	</table>
</body>
</html>