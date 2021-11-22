<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
     date_default_timezone_set("Asia/Jakarta");
  ?>
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Transaksi pada Kantin <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Transaksi
      </a> -->
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Tanggal Pembelian</th>
                  <th>NIS</th>
                  <th>Siswa</th>                    
                  <th>ID Makanan</th>
                  <th>Nama Makanan</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Tanggal Pembelian</th>
                  <th>NIS</th>
                  <th>Siswa</th>                    
                  <th>ID Makanan</th>
                  <th>Nama Makanan</th>
                  <!-- <th>Action</th> -->
                </tr>
              </tfoot>
              <tbody>
                <?php
                  $myQry = mysqli_query($koneksiDb,datapembelian()) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $no = $myData['no'];
                    $id_produk = $myData['id_makanan'];
                    $id_siswa = $myData['id_siswa'];
                    $tanggal_pembelian = $myData['tanggal_pembelian'];

                    $myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Query Salah : ".mysql_error());
                    while($myData2 = mysqli_fetch_array($myQry2)){
                      $nama_siswa = $myData2['nama_siswa'];
                    }
                    $myQry2 = mysqli_query($koneksiDb,cekdataproduk($id_produk)) or die ("Query Salah : ".mysql_error());
                    while($myData2 = mysqli_fetch_array($myQry2)){
                      $nama_makanan = $myData2['nama_makanan'];
                    }

                ?>
                    <tr>
                      <td><?php echo $tanggal_pembelian ?></td>
                      <td><?php echo $id_siswa ?></td>
                      <td><?php echo $nama_siswa ?></td>
                      <td><?php echo $id_produk ?></td>
                      <td><?php echo $nama_makanan ?></td>
                      <!-- <td align="center">-->
                        <?php
                          $targetDel = "ModalDeleteSiswa".$no;
                        ?>
                        <!-- <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Produk&id=<?php echo $id_produk?>">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#<?php echo $targetDel?>">
                          <i class="fa fa-trash"></i>
                        </a>-->
                        <!--Delete User Modal-->
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
                                <a class="btn btn-primary" href="?Open=Hapus-Data-P&id=<?php echo $id_produk?>">Hapus</a>
                              </div>
                              </div>
                            </div>
                          </div>
                        <!-- Delete User Modal-->
                      <!--</td> -->
                    </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <a href="file/export_data_pembelian.php" class="btn btn-primary btn-md">
            <i class="fas fa-fw fa-download"></i> Download Data
          </a>
        </div>
      </div>

          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                  <div class="modal-body" id="modal-edit"  style="text-align: left;"> 
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_siswa">Siswa :</label>
                          <select  name="id_siswa" class="form-control" id="id_siswa" required="">
                            <option value="">Pilih Siswa</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb,datasiswa()) or die ("Query Salah : ".mysqli_error($koneksiDb));
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
                          <label class="control-label" for="id_makanan">Makanan :</label>
                          <select  name="id_makanan" class="form-control" id="id_makanan" required="">
                            <option value="">Pilih Makanan</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb,dataproduk2()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                              while($myData = mysqli_fetch_array($myQry)){
                                $id_makanan = $myData['id_makanan'];
                                $nama_makanan = $myData['nama_makanan'];
                                $harga_makanan = $myData['harga_makanan'];
                                echo '
                                  <option value="'.$id_makanan.'">'.$nama_makanan.' - '.$harga_makanan.'</option>
                                ';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <br>
                      <!-- <div class="form-row">
                        <div class="col-md-12">                          
                          <label class="control-label" for="stok_makanan">Stok Makanan :</label>                   
                          <input name="stok_makanan" class="form-control" id="stok_makanan" type="number" min="0" value="0" required="">
                        </div>
                      </div> -->
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Transaksi" class="btn btn-primary btn-user">                              
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
          if(isset($_POST['id_makanan'])){
            $id_makanan=$_POST['id_makanan'];
          }
          // if(isset($_POST['stok_makanan'])){
          //   $stok_makanan=$_POST['stok_makanan'];
          // }
          $tanggal = date("Y/m/d");
          $myQry = mysqli_query($koneksiDb,datarfid($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
          while($myData = mysqli_fetch_array($myQry)){
            $saldo_rfid = $myData['saldo_rfid'];
          }
          $myQry = mysqli_query($koneksiDb,cekdataproduk($id_makanan)) or die ("Query Salah : ".mysqli_error($koneksiDb));
          while($myData = mysqli_fetch_array($myQry)){
            $harga_makanan = $myData['harga_makanan'];
            $stok_makanan = $myData['stok_makanan'];
          }
          $stok_makanan -= 1;
          $saldo_rfid -= $harga_makanan;
          $myQry = mysqli_query($koneksiDb,tambahdatatransaksi($id_siswa, $id_makanan, $tanggal)) or die ("Gagal Query1" .mysql_error());
          $myQry2 = mysqli_query($koneksiDb,tambahdatasaldo($id_siswa, $saldo_rfid)) or die ("Gagal Query1" .mysql_error());
          $myQry3 = mysqli_query($koneksiDb,editmakanan2($id_makanan, $stok_makanan)) or die ("Gagal Query1" .mysql_error());
          
          if($myQry && $myQry2){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Transaksi'>";            
          }

        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>