<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman Buku</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah Data Peminjaman Buku yang terdaftar di Perpustakaan <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        <i class="fa fa-book"></i> Tambah Data Peminjaman Buku
      </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Buku</h6>   
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Siswa</th>
                  <th>Nama Siswa</th>                     
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status Pengembalian</th>
                  <th>Judul Buku</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Siswa</th>
                  <th>Nama Siswa</th>                    
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status Pengembalian</th>
                  <th>Judul Buku</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                 $myQry = mysqli_query($koneksiDb, datapeminjamanbuku()) or die ("Query Salah : ".mysql_error($koneksiDb));
                  while($myData = mysqli_fetch_array($myQry)){
                    $id_trapin = $myData['id_transaksi_peminjaman'];
                    $id_siswa = $myData['id_siswa'];
                    $tanggal_peminjaman = $myData['tanggal_peminjaman'];
                    $tanggal_pengembalian = $myData['tanggal_pengembalian'];
                    $status_pengembalian = $myData['status_pengembalian'];
                    $id_buku = $myData['id_buku'];
                    //$cari = mysqli_num_rows($no);
                ?>
                    <tr>
                      <td><?php echo $id_siswa ?></td>
                      <td><?php echo '$nama_siswa' ?></td>
                      <td><?php echo $tanggal_peminjaman ?></td>
                      <td><?php echo $tanggal_pengembalian ?></td>
                      <td><?php echo $status_pengembalian ?></td>
                      <td><?php echo '$judul_buku' ?></td>
                      <td align="center">
                        <?php
                          $targetDel = "ModalDeleteSiswa".$no;
                        ?>
                        <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Peminjaman&no=<?php echo $no?>"><i class="fa fa-edit"></i> Edit</a>
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
                                <a class="btn btn-primary" href="?Open=Hapus-Data-Peminjaman&no=<?php echo $no?>">Hapus</a>
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman Buku</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                  <div class="modal-body" id="modal-edit"  style="text-align: left;">
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_transaksi_peminjaman">ID Transaksi Peminjaman :</label>              
                          <select  name="id_transaksi_peminjaman" class="form-control" id="id_transaksi_peminjaman" required="">
                            <option value="">Pilih ID Transaksi Peminjaman</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb, cekpinjambuku()) or die ("Query Salah : ".mysql_error());
                              while($myData = mysqli_fetch_array($myQry)){
                                $id_transaksi_peminjaman= $myData['id_transaksi_peminjaman'];
                                $id_siswa= $myData['id_siswa'];
                                echo '
                                  <option value="'.$id_transaksi_peminjaman.'">'.$id_transaksi_peminjaman.' - '.$id_siswa.'</option>
                                ';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_buku">ID Buku :</label>              
                          <select  name="id_buku" class="form-control" id="id_buku" required="">
                            <option value="">Pilih ID Buku</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb, databuku()) or die ("Query Salah : ".mysql_error());
                              while($myData = mysqli_fetch_array($myQry)){
                                $id_buku= $myData['id_buku'];
                                $judul_buku= $myData['judul_buku'];
                                echo '
                                  <option value="'.$id_buku.'">'.$id_buku.' - '.$judul_buku.'</option>
                                ';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="jumlah_buku">Jumlah Buku :</label>              
                          <input name="jumlah_buku" class="form-control" id="jumlah_buku" type="text" placeholder="Jumlah Buku"  required="">
                        </div>
                      </div>
                      <br>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Data" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>



<?php 

        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_transaksi_peminjaman'])){
            $id_trapin=$_POST['id_transaksi_peminjaman'];
          }
          if(isset($_POST['id_buku'])){
            $id_buku=$_POST['id_buku'];
          }
          if(isset($_POST['jumlah_buku'])){
            $jumlah_buku=$_POST['jumlah_buku'];
          }

          $myQry = mysqli_query($koneksiDb, tambahdatapinjam($id_trapin, $id_buku, $jumlah_buku)) or die ("Gagal Query1" .mysql_error());
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Peminjaman'>";            
          }

        }

      } else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>