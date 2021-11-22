<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']!="admin") {
     date_default_timezone_set("Asia/Jakarta");
  ?>
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Transaksi pada Kantin <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Transaksi
      </a> -->
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tanggal Pembelian</th>
                  <th>Nama Makanan</th>
                  <th>Harga Makanan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Tanggal Pembelian</th>
                  <th>Nama Makanan</th>
                  <th>Harga Makanan</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $myQry = mysqli_query($koneksiDb,siswadatapembelian($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $no = $myData['no'];
                    $id_produk = $myData['id_makanan'];
                    $id_siswa = $myData['id_siswa'];
                    $tanggal_pembelian = $myData['tanggal_pembelian'];
                    $nama_makanan = $myData['nama_makanan'];
                    $harga_makanan = $myData['harga_makanan'];
                ?>
                    <tr>
                      <td><?php echo $tanggal_pembelian ?></td>
                      <td><?php echo $nama_makanan ?></td>
                      <td><?php echo $harga_makanan ?></td>
                    </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<?php 

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>