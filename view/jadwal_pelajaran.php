<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Jadwal Pelajaran</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah jadwal pelajaran yang terdaftar di <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
      <!-- <div class="dropdown mb-4">
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkelas">Tambah Jadwal Pelajaran</a>
      </div> -->
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelajaran</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datakelas()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $id_kelas = $myData['no'];
                        $nama_kelas = $myData['kelas'];
                        $cabang_kelas = $myData['cabang'];
                        $myQry2 = mysqli_query($koneksiDb, datasiswadikelas($id_kelas)) or die ("Query Salah : " .mysqli_error($koneksiDb));
                        $num = mysqli_num_rows($myQry2);
                    ?>
                        <tr>
                          <td align="center">                     
                            <a href="?Open=Lihat-Jadwal-Pelajaran&id=<?php echo $id_kelas?>" class="btn btn-secondary btn-md btn-block">
                              Lihat jadwal pelajaran <?php echo $nama_kelas.'/'.$cabang_kelas ?>
                            </a>                        
                          </td>
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