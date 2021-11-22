<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']!="admin") {
    date_default_timezone_set("Asia/Jakarta");
    $tanggalsekarang = date("Y-m-d");
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Peminjaman Buku</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data peminjaman buku di <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Peminjaman Buku
      </a> -->
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
                      <th>Buku</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Keterangan</th>                        
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                    
                      <th>Buku</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Keterangan</th>                        
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,siswadatapeminjamanbuku($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $no = $myData['id_peminjaman'];                        
                        $id_siswa = $myData['id_siswa'];
                        $id_buku = $myData['id_buku'];
                        $tanggal_peminjaman = $myData['tanggal_peminjaman'];
                        $tanggal_pengembalian = $myData['tanggal_pengembalian'];
                        if (($tanggal_pengembalian == NULL) or ($tanggal_pengembalian == '') or ($tanggal_pengembalian == '0000-00-00' )) {
                          $tanggal_pengembalian = '-';
                        }

                        $myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $nama_siswa = $myData2['nama_siswa'];
                        }

                        $myQry2 = mysqli_query($koneksiDb,ambildatabuku3($id_buku)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $judul_buku = $myData2['judul_buku'];
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
                          <td><?php echo $judul_buku ?></td>
                          <td><?php echo $tanggal_peminjaman ?></td>
                          <td><?php echo $tanggal_pengembalian ?></td>
                          <!-- <td><?php echo $targetkembali ?></td> -->
                          <?php
                            $targetkembali = date('Y-m-d',strtotime('+7 day',strtotime($tanggal_peminjaman)));
                            if($tanggal_pengembalian=='-'){
                              $targetkembali2 = new DateTime($targetkembali);
                              $tanggalsekarang2 = new DateTime($tanggalsekarang);
                              $sisahari = date_diff($tanggalsekarang2, $targetkembali2);
                              if ($tanggalsekarang < $targetkembali){
                                if ($sisahari->format('%d')<=3){
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('%d hari lagi'); ?></td>
                                  <?php
                                }
                                else{
                                  ?>
                                  <td style=""><?php echo $sisahari->format('%d hari lagi'); ?></td>
                                  <?php
                                }          
                              }else{
                                  ?>
                                  <td style="color: red"><?php echo $sisahari->format('terlambat %d hari'); ?></td>
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
                                  <td style="color: red"><?php echo $sisahari->format('terlambat %d hari'); ?></td>
                                <?php
                              }
                              
                            }
                          ?>
                        </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php 
      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>