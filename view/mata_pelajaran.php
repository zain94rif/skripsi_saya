<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Mata Pelajaran</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah mata pelajaran yang terdaftar di <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Mata Pelajaran
      </a>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Mata Pelajaran</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mata Pelajaran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Mata Pelajaran</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datamatapelajaran()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                      	$no = $myData['no'];
                        $mata_pelajaran = $myData['mata_pelajaran'];            
                    ?>
                        <tr>
                          <td><?php echo $mata_pelajaran ?></td>
                          <td align="center">
                            <?php
                              $targetDel = "ModalDeleteSiswa".$no;
                            ?>                            
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
                                    <a class="btn btn-primary" href="?Open=Hapus-Data-Mata-Pelajaran&id=<?php echo $no?>">Hapus</a>
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



          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                	<div class="modal-body" id="modal-edit"  style="text-align: left;">
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="mata_pelajaran">Mata Pelajaran :</label>
                          <input name="mata_pelajaran" class="form-control" id="mata_pelajaran" type="text" placeholder="Mata Pelajaran"  required="">
                        </div>
                      </div>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Mata Pelajaran" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>
<?php 

        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['mata_pelajaran'])){
            $mata_pelajaran=$_POST['mata_pelajaran'];
          }

          $myQry = mysqli_query($koneksiDb,tambahdatamapel($mata_pelajaran)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Mata-Pelajaran'>";            
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>