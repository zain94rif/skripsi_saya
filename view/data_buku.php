<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Buku yang terdaftar di Perpustakaan <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Buku
      </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>                    
                  <th>Judul Buku</th>
                  <th>Penulis Buku</th>
                  <th>Penerbit Buku</th>
                  <th>Stok Buku</th>
                  <th>Sedang dipinjam</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>                    
                  <th>Judul Buku</th>
                  <th>Penulis Buku</th>
                  <th>Penerbit Buku</th>
                  <th>Stok Buku</th>
                  <th>Sedang dipinjam</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $myQry = mysqli_query($koneksiDb,databuku()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                  while($myData = mysqli_fetch_array($myQry)){
                  	$id_buku = $myData['id_buku'];
                    $judul_buku = $myData['judul_buku'];
                    $penulis_buku = $myData['penulis_buku'];
                    $penerbit_buku = $myData['penerbit_buku'];
                    $stok_buku = $myData['stok_buku'];
                    $myQry2 = mysqli_query($koneksiDb,cekrfidbuku($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                    $stok_buku2 = mysqli_num_rows($myQry2);
                    $myQry3 = mysqli_query($koneksiDb,datapeminjamanbuku4($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                    $stok = mysqli_num_rows($myQry3);
                ?>
                    <tr>
                      <td><?php echo $id_buku ?></td>
                      <td><?php echo $judul_buku ?></td>
                      <td><?php echo $penulis_buku ?></td>
                      <td><?php echo $penerbit_buku ?></td>
                      <td><?php echo $stok_buku2 ?></td>
                      <td><?php echo $stok ?></td>
                      <td align="center">
                        <?php
                          $targetDel = "ModalDeleteSiswa".$id_buku;
                        ?>
                        <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Buku&id=<?php echo $id_buku?>">
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
                                <a class="btn btn-primary" href="?Open=Hapus-Data-Buku&id=<?php echo $id_buku?>">Hapus</a>
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data"> <!--metode pengiriman data berupa "post" -->
                	<div class="modal-body" id="modal-edit"  style="text-align: left;">            
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_buku">ID :</label>              
                          <input name="id_buku" class="form-control" id="id_buku" type="text" placeholder="ID"  required="" onkeypress="return (event.charCode > 47 && event.charCode < 58)"> <!--metode pengiriman data berupa "post" -->
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="judul_buku">Judul Buku :</label>              
                          <input name="judul_buku" class="form-control" id="judul_buku" type="text" placeholder="Judul Buku"  required="">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="penulis_buku">Penulis Buku :</label>              
                          <input name="penulis_buku" class="form-control" id="penulis_buku" type="text" placeholder="Penulis Buku"  required=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="penerbit_buku">Penerbit Buku :</label>              
                          <input name="penerbit_buku" class="form-control" id="penerbit_buku" type="text" placeholder="Penerbit Buku"  required="">
                        </div>
                      </div>
                      <br>
<!--                       <div class="form-row">
                        <div class="col-md-12">                          
                          <label class="control-label" for="stok_buku">Stok Buku :</label>                   
                          <input name="stok_buku" class="form-control" id="stok_buku" type="number" min="0" value="0" required="">
                        </div>
                      </div> -->
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Buku" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>



<?php 

      if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_buku'])){
            $id_buku=$_POST['id_buku'];
          }
          if(isset($_POST['judul_buku'])){
            $judul_buku=$_POST['judul_buku'];
          }
          if(isset($_POST['penulis_buku'])){
            $penulis_buku=$_POST['penulis_buku'];
          }
          if(isset($_POST['penerbit_buku'])){
            $penerbit_buku=$_POST['penerbit_buku'];
          }
          // if(isset($_POST['stok_buku'])){
          //   $stok_buku=$_POST['stok_buku'];
          // }

          $myQry = mysqli_query($koneksiDb,tambahdatabuku($id_buku, $judul_buku, $penulis_buku, $penerbit_buku)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Buku'>"; //merefresh halaman dan kembali ke halaman data-buku           
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>