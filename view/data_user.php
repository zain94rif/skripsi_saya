<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data user yang terdaftar di <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        <i class="fa fa-user"></i> Tambah Admin
      </a>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Level</th>                    
                      <th>ID</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Level</th>                    
                      <th>ID</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datauser()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $id_user = $myData['id_user'];
                        $id_level = $myData['id_level'];
                        $level = $myData['level'];
                        $password = $myData['password'];            
                    ?>
                        <tr>
                          <td><?php echo $level ?></td>
                          <td><?php echo $id_user ?></td>
                          <td align="center">
                            <?php
                              $targetLihat = "ModalLihatSiswa".$id_user;
                              $targetDel = "ModalDeleteSiswa".$id_user;
                            ?>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo $targetLihat?>">
                              <i class="fa fa-key"></i> ubah password
                            </a>
                            <?php
                              if ($id_level=='1') {
                              ?>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#<?php echo $targetDel?>">
                                  <i class="fa fa-trash"></i> Hapus
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
                                        <a class="btn btn-primary" href="?Open=Hapus-Data-Admin&id=<?php echo $id_user?>">Hapus</a>
                                      </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- End of Delete User Modal-->

                              <?php
                              }
                            ?>
                            <!-- Lihat User Modal-->
                              <div class="modal fade" id="<?php echo $targetLihat?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <form id="Form" method="post" enctype="multipart/form-data">
                                    <div class="modal-body" id="modal-edit"  style="text-align: left;">
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-12">
                                              <label class="control-label" for="passl">Password Lama :</label>
                                              <input name="passl" class="form-control" id="passl" type="text" disabled="" value="<?php echo $password?>" >
                                            </div>
                                          </div>
                                          <br>
                                          <div class="form-row">
                                            <div class="col-md-12">
                                              <label class="control-label" for="pass">Password Baru :</label>
                                              <input name="id" class="form-control" id="id" type="text" value="<?php echo $id_user?>" style="display: none;">
                                              <input name="pass" class="form-control" id="pass" type="text" placeholder="Password Baru" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                                            </div>
                                          </div>
                                        </div>                                        
                                      <div class="modal-footer">
                                        <input type="submit" name="buttonsubmit" id="buttonsubmit" value="Simpan Perubahan Password" class="btn btn-primary btn-user">                              
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                          <!-- End of Edit User Modal-->
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



          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit"  style="text-align: left;">            
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_">Id :</label>
                          <input name="id_" class="form-control" id="id_" type="text" placeholder="Id admin" required="" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                        </div>
                      </div>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Admin" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>
<?php 

        if(isset($_POST['buttonsubmit'])){
          if(isset($_POST['id'])){
            $id=$_POST['id'];
          }
          if(isset($_POST['pass'])){
            $pass=$_POST['pass'];
          }
          $myQry = mysqli_query($koneksiDb,editdataakun($pass, $id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-User'>";            
          }

        }

        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_'])){
            $id_=$_POST['id_'];
          }
          $myQry = mysqli_query($koneksiDb,tambahakunadmin($id_)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-User'>";            
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>