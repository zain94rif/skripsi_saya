<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']!="admin") {
     date_default_timezone_set("Asia/Jakarta");
  ?>
    <h1 class="h3 mb-2 text-gray-800">Data Saldo</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Saldo yang terdaftar di <?php echo $namasekolah;?>.</p>
    </div>

    <?php
      $myQry = mysqli_query($koneksiDb,datarfid4($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysql_error());
      while($myData = mysqli_fetch_array($myQry)){
        $saldo_rfid = $myData['saldo_rfid'];
      }
    ?>

    <!-- <div class="col-xl-3 col-md-6 mb-4"> -->
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo $saldo_rfid?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
    <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Top-up</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <!-- <th>ID Top-up</th>                     -->
                  <th>Tanggal Top-up</th>
                  <th>Nama Siswa</th>
                  <th>Nominal</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <!-- <th>ID Top-up</th>                     -->
                  <th>Tanggal Top-up</th>
                  <th>Nama Siswa</th>
                  <th>Nominal</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $myQry = mysqli_query($koneksiDb, ortudatatopup($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $id_topup = $myData['id_topup'];
                    $id_siswa = $myData['id_siswa'];
                    $tanggal_topup = $myData['tanggal_topup'];
                    $nama_siswa = $myData['nama_siswa'];
                    $nominal = $myData['nominal'];
                ?>
                    <tr>
                      <!-- <td><?php echo $id_topup ?></td> -->
                      <td><?php echo $tanggal_topup ?></td>
                      <td><?php echo $nama_siswa ?></td>
                      <td><?php echo $nominal ?></td>
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