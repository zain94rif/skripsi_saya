<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  	$id = $_GET['id'];
  	$myQry = mysqli_query($koneksiDb,cekdatabuku($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
  	while($myData = mysqli_fetch_array($myQry)){
          $id_buku = $myData['id_buku'];
          $judul_buku = $myData['judul_buku'];
          $penulis_buku = $myData['penulis_buku'];
          $penerbit_buku = $myData['penerbit_buku'];
          $stok_buku = $myData['stok_buku'];
          $myQry2 = mysqli_query($koneksiDb,cekrfidbuku($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
          $stok_buku2 = mysqli_num_rows($myQry2);
  	}
?>
<h1 class="h3 mb-2 text-gray-800">Edit Data Buku</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk mengedit data Buku!</p>
  <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
    Tambah RFID Buku
  </a>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Buku</h6> 
      </div>
      <div class="card-body">
        <form class="user" name="form1" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label class="control-label" for="id_buku">ISBN :</label>
              <input type="text" class="form-control" id="id" name="id" value="<?php echo $id_buku?>" disabled>
              <input type="text" class="form-control" id="id" name="id" value="<?php echo $id_buku?>" style="display: none;" >
            </div>
            <div class="col-sm-6">
              <label class="control-label" for="judul_buku">Judul Buku :</label>
              <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $judul_buku?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label class="control-label" for="penulis_buku">Penulis Buku :</label>
              <input type="text" class="form-control" id="penulis_buku" name="penulis_buku" value="<?php echo $penulis_buku?>" required>
            </div>
            <div class="col-sm-6">
              <label class="control-label" for="penerbit_buku">Penerbit Buku :</label>              
              <input name="penerbit_buku" class="form-control" id="penerbit_buku" type="text" placeholder="Penerbit Buku"  required="" value="<?php echo $penerbit_buku?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label class="control-label" for="stok_buku">Stok Buku :</label>
              <input type="number" min ="0" class="form-control" id="stok_buku2" name="stok_buku2" value="<?php echo $stok_buku2?>" required disabled>
              <input type="number" min ="0" class="form-control" id="stok_buku2" name="stok_buku2" value="<?php echo $stok_buku2?>" required style="display: none;" >
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="reset" name="buttonreset" id="buttonreset" value="RESET" class="btn btn-danger btn-user btn-block">
            </div>
            <div class="col-sm-6">
              <input type="submit" name="buttonsubmit" id="buttonsubmit" value="SUBMIT" class="btn btn-primary btn-user btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data RFID Buku</h6> 
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>RFID Buku</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>RFID Buku</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php
                $myQry = mysqli_query($koneksiDb,cekrfidbuku($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                while($myData = mysqli_fetch_array($myQry)){
                  $id_ = $myData['id_buku'];
                  $rfid = $myData['rfid'];
                  $no = $myData['no'];
              ?>
                <tr>
                  <td><?php echo $rfid ?></td>
                  <td align="center">
                    <?php
                      $targetDel = "ModalDeleteSiswa".$no;
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
                                <a class="btn btn-primary" href="?Open=Hapus-Rfid-Buku&id=<?php echo $id_?>&no=<?php echo $no?>">Hapus</a>
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
  </div>
</div>

          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah RFID Buku</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                  <div class="modal-body" id="modal-edit"  style="text-align: left;">            
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="rfid_buku">ID :</label>              
                          <input name="rfid_buku" class="form-control" id="rfid_buku" type="text"  required="" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                        </div>
                      </div>
                      <br>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>

<?php
    if(isset($_POST['buttonTambah'])){
          if(isset($_POST['rfid_buku'])){
            $rfid_buku=$_POST['rfid_buku'];
          }

          $myQry = mysqli_query($koneksiDb,tambahrfidbuku($id, $rfid_buku)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Edit-Data-Buku&id=$id'>";
          }

          
        }

	if(isset($_POST['buttonsubmit'])){
		if(isset($_POST['id'])){
            $id_buku=$_POST['id'];
          }
          if(isset($_POST['judul_buku'])){
            $judul_buku = $_POST['judul_buku'];  
          }
          if(isset($_POST['penulis_buku'])){
            $penulis_buku = $_POST['penulis_buku'];
          }
          if(isset($_POST['penerbit_buku'])){
            $penerbit_buku = $_POST['penerbit_buku'];
          }
          $databuku = array(
            'id_buku' => $id_buku,
          	'judul_buku' => $judul_buku, 
            'penulis_buku' => $penulis_buku, 
            'penerbit_buku' => $penerbit_buku
          );

          $myQry = mysqli_query($koneksiDb,editdatabuku($databuku)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Buku'>";                       
          }

          
        }

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>