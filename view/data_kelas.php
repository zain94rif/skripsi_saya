<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data kelas yang terdaftar di <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
      <div class="dropdown mb-4">
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkelas">Tambah Kelas</a>
      </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kelas</th>
                      <th>Jumlah Siswa</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Kelas</th>
                      <th>Jumlah Siswa</th>
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
                          <td><?php echo $nama_kelas.'/'.$cabang_kelas ?></td>
                          <td><?php echo $num?></td>
                          <td align="center">
                            <?php
                              $targetLihat = "ModalLihatSiswa".$id_kelas;
                              $targetDel = "ModalDeleteSiswa".$id_kelas;
                            ?>
                            <a href="?Open=Lihat-Data-Kelas&id=<?php echo $id_kelas?>" class="btn btn-primary btn-sm">
                              <i class="fa fa-ellipsis-h"></i>
                            </a>
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
                                    <a class="btn btn-primary" href="?Open=Hapus-Data-Kelas&id=<?php echo $id_kelas?>">Hapus</a>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            <!-- End of Delete User Modal-->                          
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit"  style="text-align: left;">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label class="control-label" for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" id="kelas">
                          <option value="">Pilih Kelas</option>
                          <option value="VII">VII</option>
                          <option value="VIII">VIII</option>
                          <option value="IX">IX</option>
                        </select>                    
                      </div>
                      <div class="col-md-6">
                        <label class="control-label" for="cabang">Cabang</label>
                        <input name="cabang" class="form-control" id="cabang" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="buttonsubmit" id="buttonsubmit" value="Tambah Kelas" class="btn btn-primary btn-user">
                </div>
                </form>
              </div>
            </div>
          </div>
<?php 
          if(isset($_POST['buttonsubmit'])){
          if(isset($_POST['kelas'])){
            $kelas = $_POST['kelas'];
          }
          if(isset($_POST['cabang'])){
            $cabang = $_POST['cabang'];
          }

          $datakelas = array(
            'kelas' => $kelas, 
            'cabang' => $cabang
          );

          $myQry = mysqli_query($koneksiDb,tambahdatakelas($datakelas)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Kelas'>";            
          } 
        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>