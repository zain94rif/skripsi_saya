<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
     date_default_timezone_set("Asia/Jakarta");
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Top-up</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Top-up yang terdaftar di <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Top-up
      </a>
    </div>

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
                  $myQry = mysqli_query($koneksiDb, datatopup()) or die ("Query Salah : ".mysql_error());
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

          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Top-up</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                	<div class="modal-body" id="modal-edit"  style="text-align: left;">
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_siswa">Nama Siswa :</label>              
                          <select class="form-control" id="id_siswa" name="id_siswa">
                          <option value="">Pilih Nama Siswa</option>
                          <?php
                            $myQry = mysqli_query($koneksiDb,datasiswa()) or die ("Query Salah : ".mysql_error());
                            while($myData = mysqli_fetch_array($myQry)){
                              $id_siswa = $myData['id_siswa'];
                              $nama_siswa = $myData['nama_siswa'];                    
                              echo '
                                <option value="'.$id_siswa.'">'.$id_siswa.' - '.$nama_siswa.'</option>
                              ';                       
                            }
                          ?>
                        </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">                          
                          <label class="control-label" for="nominal">Nominal :</label>                   
                          <select  name="nominal" class="form-control" id="nominal" required="">
                            <option value="">Pilih Nominal</option>
                            <option value="10000">Rp 10.000</option>
                            <option value="20000">Rp 20.000</option>
                            <option value="50000">Rp 50.000</option>
                            <option value="100000">Rp 100.000</option>
                          </select>
                        </div>
                      </div>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Saldo" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>



<?php 

        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_siswa'])){
            $id_siswa=$_POST['id_siswa'];
          }
          if(isset($_POST['tanggal_topup'])){
            $tanggal_topup=$_POST['tanggal_topup'];
          }
          if(isset($_POST['nominal'])){
            $nominal=$_POST['nominal'];
          }

          $tanggal_topup = date("Y/m/d");

          $myQry = mysqli_query($koneksiDb,datarfid($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
          while($myData = mysqli_fetch_array($myQry)){
            $saldo_rfid = $myData['saldo_rfid'];
          }

          $nominal2 = $nominal + $saldo_rfid;

          $myQry = mysqli_query($koneksiDb, tambahdatatopup($id_siswa, $tanggal_topup, $nominal)) or die ("Gagal Query1" .mysql_error($koneksiDb));
          $myQry2 = mysqli_query($koneksiDb, tambahdatasaldo($id_siswa, $nominal2)) or die ("Gagal Query1" .mysql_error($koneksiDb));
          if($myQry && $myQry2){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Topup'>";            
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>