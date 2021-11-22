<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Produk yang terdaftar di Kantin <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Produk
      </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Makanan</th>                    
                  <th>Nama Makanan</th>
                  <th>Harga Makanan</th>
                  <th>Stok Makanan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Makanan</th>                    
                  <th>Nama Makanan</th>
                  <th>Harga Makanan</th>
                  <th>Stok Makanan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $myQry = mysqli_query($koneksiDb,dataproduk()) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                  	$id_produk = $myData['id_makanan'];
                    $nama_makanan = $myData['nama_makanan'];
                    $harga_makanan = $myData['harga_makanan'];
                    $stok_makanan = $myData['stok_makanan'];
                ?>
                    <tr>
                      <td><?php echo $id_produk ?></td>
                      <td><?php echo $nama_makanan ?></td>
                      <td><?php echo $harga_makanan ?></td>
                      <td><?php echo $stok_makanan ?></td>
                      <td align="center">
                        <?php
                          $targetDel = "ModalDeleteSiswa".$id_produk;
                        ?>
                        <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Produk&id=<?php echo $id_produk?>">
                          <i class="fa fa-edit"></i>
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
                                <a class="btn btn-primary" href="?Open=Hapus-Data-Produk&id=<?php echo $id_produk?>">Hapus</a>
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                	<div class="modal-body" id="modal-edit"  style="text-align: left;">            
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_produk">ID Makanan :</label>              
                          <input name="id_produk" class="form-control" id="id_produk" type="text" onkeypress="return (event.charCode > 47 && event.charCode < 58)" placeholder="ID Makanan"  required="">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="nama_makanan">Nama Makanan :</label>              
                          <input name="nama_makanan" class="form-control" id="nama_makanan" type="text" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" placeholder="Nama Makanan"  required="">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="harga_makanan">Harga Makanan :</label>              
                          <input name="harga_makanan" class="form-control" id="harga_makanan" type="text" onkeypress="return (event.charCode > 47 && event.charCode < 58)" placeholder="Harga Makanan"  required="">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">                          
                          <label class="control-label" for="stok_makanan">Stok Makanan :</label>                   
                          <input name="stok_makanan" class="form-control" id="stok_makanan" type="number" min="0" value="0" required="">
                        </div>
                      </div>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Produk" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>



<?php 

        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_produk'])){
            $id_produk=$_POST['id_produk'];
          }
          if(isset($_POST['nama_makanan'])){
            $nama_makanan=$_POST['nama_makanan'];
          }
          if(isset($_POST['harga_makanan'])){
            $harga_makanan=$_POST['harga_makanan'];
          }
          if(isset($_POST['stok_makanan'])){
            $stok_makanan=$_POST['stok_makanan'];
          }

          $myQry = mysqli_query($koneksiDb,tambahdataproduk($id_produk, $nama_makanan, $harga_makanan, $stok_makanan)) or die ("Gagal Query1" .mysql_error());
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Produk'>";            
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>