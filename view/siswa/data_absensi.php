<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']!="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data absensi siswa yang terdaftar di <?php echo $namasekolah;?>.</p>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>                    
                      <th>Hari</th>
                      <th>Mata Pelajaran</th>
                      <th>Masuk</th>                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>                    
                      <th>Hari</th>
                      <th>Mata Pelajaran</th>
                      <th>Masuk</th>                    
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php              
                      $myQry = mysqli_query($koneksiDb,siswadataabsen($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysqli_error($koneksiDb));
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
                          <td><?php echo $masuk ?></td>
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