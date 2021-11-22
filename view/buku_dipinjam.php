<?php
if(isset($_SESSION['SES_LOGIN'])) { //mengecek session
  if ($_SESSION['SES_LEVEL']=="admin") { //mengecek level user, halaman ini hanya dapat diakses oleh admin
    date_default_timezone_set("Asia/Jakarta"); //menentukan zona waktu
    $tanggalsekarang = date("Y-m-d");               //variabel waktu sekarang
    $waktu = date("H:i:s"); 
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Peminjaman Buku </h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data buku-buku yang masih dipinjam atau belum dikembalikan oleh siswa di <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Peminjaman Buku
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
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Buku</th>
                      <th>Waktu Pinjam</th>
                      <th>Keterangan</th>            
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Buku</th>
                      <th>Waktu Pinjam</th>
                      <th>Keterangan</th>            
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datapeminjamanbuku3()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $no = $myData['id_peminjaman'];                        
                        $id_siswa = $myData['id_siswa'];
                        $id_buku = $myData['id_buku'];
                        $tanggal_peminjaman = $myData['tanggal_peminjaman'];
                        $tanggal_pengembalian = $myData['tanggal_pengembalian'];
                        $jam = $myData['jam'];
                        if (($tanggal_pengembalian == NULL) or ($tanggal_pengembalian == '') or ($tanggal_pengembalian == '0000-00-00' )) {
                          $tanggal_pengembalian = '-'; //filter untuk menampilkan data buku yang belum dikembalikan
                        }

                        $myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $nama_siswa = $myData2['nama_siswa'];
                        }

                        $myQry3 = mysqli_query($koneksiDb,ambildatabuku3($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData3 = mysqli_fetch_array($myQry3)){
                          $judul_buku = $myData3['judul_buku'];
                        }

                        
                        // $sisahari = date('Y-m-d', $sisahari);
                        // if (condition) {
                        //   # code...
                        // } else {
                        //   # code...
                        // }
                        
                        // $keterangan = '-'
                    ?>
                        <tr>
                          <td><?php echo $id_siswa ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $judul_buku ?></td>
                          <td><?php echo $tanggal_peminjaman."<br>".$jam ?></td>
                          <!-- <td><?php //echo $targetkembali ?></td> -->
                          <?php
                            $targetkembali = date('Y-m-d',strtotime('+7 day',strtotime($tanggal_peminjaman)));
                            if($tanggal_pengembalian=='-'){
                              $targetkembali2 = new DateTime($targetkembali);
                              $tanggalsekarang2 = new DateTime($tanggalsekarang);
                              $sisahari = date_diff($tanggalsekarang2, $targetkembali2);
                              $denda = $sisahari->format('%d')*500;
                              if ($tanggalsekarang < $targetkembali){
                                if ($sisahari->format('%d')<=3){
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('%d hari lagi batas pengembalian buku'); ?></td>
                                  <?php
                                }
                                else{
                                  ?>
                                  <td style=""><?php echo $sisahari->format('%d hari lagi batas pengembalian buku'); ?></td>
                                  <?php
                                }          
                              }else{
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('terjadi keterlambatan %d hari pada buku <br>
                                  dan siswa dikenakan denda Rp '.$denda); ?></td>
                                  <?php
                              }
                            }else{
                              $targetkembali2 = new DateTime($targetkembali);
                              $tanggal_pengembalian2 = new DateTime($tanggal_pengembalian);
                              if ($tanggal_pengembalian <= $targetkembali){
                                echo "<td>-</td>";
                              }else{
                                $sisahari = date_diff($targetkembali2, $tanggal_pengembalian2);
                                ?>
                                  <td style="color: red"><?php echo $sisahari->format('terjadi keterlambatan %d hari pada buku <br>
                                  dan siswa dikenakan denda Rp '.$sisahari*500); ?></td>
                                <?php
                              }
                              
                            }
                          ?>
                          <td align="center">
                            <?php
                              $targetDel = "ModalDeleteSiswa".$no;
                            ?>
                            <a class="btn btn-primary btn-sm" href="?Open=Edit-Buku-Dipinjam&id=<?php echo $no?>"><i class="fas fa-check"></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <a href="file/export_data_buku_dipinjam.php" class="btn btn-primary btn-md">
                <i class="fas fa-fw fa-download"></i> Download Data
              </a>
              <!-- <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#download">
                <i class="fas fa-fw fa-download"></i> Download Data
              </a>
 -->            </div>
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
                          <label class="control-label" for="rfid">Buku :</label>
                          <!-- <input name="id_jadwal" class="form-control" id="id_jadwal" type="text" placeholder="Jadwal" required=""> -->
                          <select  name="rfid" class="form-control" id="rfid" required="">
                            <option value="">Pilih Buku</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb,databukupinjam()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                              while($myData = mysqli_fetch_array($myQry)){
                                $id_buku = $myData['id_buku'];
                                $rfid = $myData['rfid'];
                                $myQry2 = mysqli_query($koneksiDb,cekdatabuku($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                                while($myData2 = mysqli_fetch_array($myQry2)){                                      
                                      $judul_buku = $myData2['judul_buku'];                                
                                      if (strlen($judul_buku)>50) {
                                          $judul_buku = substr($judul_buku,0,45).'...'; //membatasi jumlah karakter setiap judul hanya sampai 45 karalter                               
                                          }
                                      }                                
                                echo '
                                  <option value="'.$rfid.'">'.$rfid.'-'.$judul_buku.'</option>
                                  ';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <br>
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
                          <label class="control-label" for="tanggal_peminjaman">Tanggal peminjaman :</label>
                          <input name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" type="date" placeholder="Id admin" required="">
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
          if(isset($_POST['rfid'])){
            $rfid=$_POST['rfid'];
          }
          if(isset($_POST['id_siswa'])){
            $id_siswa=$_POST['id_siswa'];
          }
          if(isset($_POST['tanggal_peminjaman'])){
            $tanggal_peminjaman=$_POST['tanggal_peminjaman'];
          }
          // if(isset($_POST['penerbit_buku'])){
          //   $penerbit_buku=$_POST['penerbit_buku'];
          // }
          // if(isset($_POST['stok_buku'])){
          //   $stok_buku=$_POST['stok_buku'];
          // }

          $myQry = mysqli_query($koneksiDb,tambahpeminjamanbuku($id_siswa, $rfid, $tanggal_peminjaman)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Buku-Masih-Dipinjam'>";            
          }

        }
        
      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>