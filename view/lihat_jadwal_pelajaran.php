<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
    $id = $_GET['id'];
      if(isset($id)){
        $myQry = mysqli_query($koneksiDb,datakelas2($id)) or die ("Query Salah : ".mysqli_error($koneksiDb));
        while($myData = mysqli_fetch_array($myQry)){
          $id_kelas = $myData['no'];
          $nama_kelas = $myData['kelas'];
          $cabang_kelas = $myData['cabang'];
        }
  ?>
		<h1 class="h3 mb-2 text-gray-800">Jadwal Pelajaran Kelas <?php echo $nama_kelas.'/'.$cabang_kelas ?></h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah jadwal pelajaran kelas <?php echo $nama_kelas.'/'.$cabang_kelas ?> yang terdaftar di <?php echo $namasekolah;?>.</p>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkelas">Tambah Jadwal Pelajaran</a>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelajaran Kelas <?php echo $nama_kelas.'/'.$cabang_kelas ?></h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hari</th>                    
                      <th>Jam</th>
                      <th>Mata Pelajaran</th>
                      <th>Pin Aktivasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Hari</th>                    
                      <th>Jam</th>
                      <th>Mata Pelajaran</th>
                      <th>Pin Aktivasi</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datajadwalpelajaran($id)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                      	$id_jadwal = $myData['id_jadwal'];
                        $hari = $myData['hari'];
                        $mata_pelajaran = $myData['mata_pelajaran'];
                        $jam_keluar = $myData['jam_keluar'];
                        $jam_masuk = $myData['jam_masuk'];
                        $pin_aktivasi = $myData['pin_aktivasi'];
                        $myQry5 = mysqli_query($koneksiDb, datamatapelajaran2($mata_pelajaran)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData5 = mysqli_fetch_array($myQry5)){
                          $mata_pelajaran = $myData5['mata_pelajaran'];
                        }         
                    ?>
                        <tr>
                          <td><?php echo $hari ?></td>
                          <td><?php echo $jam_masuk.' - '.$jam_keluar ?></td>
                          <td><?php echo $mata_pelajaran ?></td>
                          <td><?php echo $pin_aktivasi ?></td>
                          <td align="center">
                            <?php
                              $targetDel = "ModalDeleteSiswa".$id_jadwal;
                              $targetView = "ModalDeleteSiswa".$id_jadwal;
                            ?>
                            <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Jadwal&id=<?php echo $id_jadwal?>&kelas=<?php echo $id?>"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#<?php echo $targetDel?>">
                              <i class="fa fa-trash"></i>
                            </a>                      
                            <!-- Delete User Modal-->
                              <div class="modal hide fade" id="<?php echo $targetDel?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus?</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body" style="text-align: left;">Klik "Hapus" dibawah jika anda ingin menghapus data ini.</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-primary" href="?Open=Hapus-Data-Jadwal&id=<?php echo $id_jadwal?>&kelas=<?php echo $id?>">Hapus</a>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            <!-- Delete User Modal-->
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

          <div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Pelajaran</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit"  style="text-align: left;">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label class="control-label" for="mata_pelajaran">Mata Pelajaran</label>
                          <select name="mata_pelajaran" class="form-control" id="mata_pelajaran" required="">
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php
                              $myQry3 = mysqli_query($koneksiDb,datamatapelajaran()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                              while($myData3 = mysqli_fetch_array($myQry3)){
                                $no_mata_pelajaran = $myData3['no'];
                                $mata_pelajaran = $myData3['mata_pelajaran'];
                                echo "<option value='$no_mata_pelajaran'>$mata_pelajaran</option>";
                              }
                            ?> 
                          </select>               
                      </div>
                      <br>
                      <div class="col-md-6">
                        <label class="control-label" for="hari">Hari</label>
                          <select name="hari" class="form-control" id="hari" required="">
                            <option value="">Pilih Hari</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>   
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label class="control-label" for="mulai">Mulai</label>
                        <input type="time" name="mulai" id="mulai" class="form-control" required="">                    
                      </div>
                      <br>
                      <div class="col-md-6">
                        <label class="control-label" for="selesai">Selesai</label>
                        <input type="time" name="selesai" id="selesai" class="form-control" required="">    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="buttonsubmit" id="buttonsubmit" value="Tambah" class="btn btn-primary btn-user">
                </div>
                </form>
              </div>
            </div>
          </div>
<?php 

         if(isset($_POST['buttonsubmit'])){
          if(isset($_POST['mata_pelajaran'])){
            $mata_pelajaran = $_POST['mata_pelajaran'];
          }
          // if(isset($_POST['kelas'])){
          //   $kelas = $_POST['kelas'];
          // }
          $kelas = $id;
          if(isset($_POST['hari'])){
            $hari = $_POST['hari'];
          }
          if(isset($_POST['mulai'])){
            $mulai = $_POST['mulai'];
          }
          if(isset($_POST['selesai'])){
            $selesai = $_POST['selesai'];
          }

          $pin_aktivasi = getrandom();

          $myQry = mysqli_query($koneksiDb,tambahdatajadwal($hari, $kelas, $mata_pelajaran, $mulai, $selesai, $pin_aktivasi)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Lihat-Jadwal-Pelajaran&id=$id'>";            
          } 
        }

        }else{
          echo "Data tidak ada";
        }
      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>