<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data absensi siswa yang terdaftar di <?php echo $namasekolah;?>.</p>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Data Absensi
      </a>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>                    
                      <th>Hari</th>
                      <th>Mata Pelajaran</th>
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Masuk</th>            
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>                    
                      <th>Hari</th>
                      <th>Mata Pelajaran</th>
                      <th>NIS</th>
                      <th>Siswa</th>
                      <th>Masuk</th>            
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,dataabsen()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $id_jadwal = $myData['id_jadwal'];
                        $hari = $myData['hari'];
                        $mata_pelajaran = $myData['mata_pelajaran'];
                        $jam_masuk = $myData['jam_masuk'];
                        $jam_keluar = $myData['jam_keluar'];
                        $no = $myData['no'];
                        $id_siswa = $myData['id_siswa'];
                        $tanggal_absensi = $myData['tanggal_absensi'];
                        $masuk = $myData['masuk'];
                        $nama_siswa = $myData['nama_siswa'];
                        $myQry2 = mysqli_query($koneksiDb,datamatapelajaran2($mata_pelajaran)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData2 = mysqli_fetch_array($myQry2)){
                          $mata_pelajaran = $myData2['mata_pelajaran'];
                        }
                    ?>
                        <tr>
                          <td><?php echo $tanggal_absensi ?></td>
                          <td><?php echo $hari ?></td>
                          <td><?php echo $mata_pelajaran ?></td>
                          <td><?php echo $id_siswa ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $masuk ?></td>
                          <td align="center">
                            <?php
                              $targetDel = "ModalDeleteSiswa".$no;
                            ?>
                            <a class="btn btn-primary btn-sm" href="?Open=Edit-Data-Absensi&id=<?php echo $no?>"><i class="fa fa-edit"></i></a>
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
                                    <a class="btn btn-primary" href="?Open=Hapus-Data-Absensi&id=<?php echo $no?>">Hapus</a>
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
            <div class="card-footer">
              <a href="file/export_data_absen.php" class="btn btn-primary btn-md">
                <i class="fas fa-fw fa-download"></i> Download Data
              </a>
              <!-- <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#download">
                <i class="fas fa-fw fa-download"></i> Download Data
              </a>
 -->            </div>
          </div>

          <div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Download</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">                
                <div class="modal-body" id="modal-edit"  style="text-align: left;">
                  <label class="control-label" for="mata_pelajaran">Berdasar Mata Pelajaran :</label>
                  <br>
                    <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                      <option value="">Pilih Mata Pelajaran</option>
                      <?php
                        $myQry = mysqli_query($koneksiDb,datajadwal()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        while($myData = mysqli_fetch_array($myQry)){
                          $id_jadwal = $myData['id_jadwal'];
                          $hari = $myData['hari'];
                          $mata_pelajaran = $myData['mata_pelajaran'];
                          $jam_masuk = $myData['jam_masuk'];
                          $jam_keluar = $myData['jam_keluar'];                      
                          echo '
                            <option value="'.$id_jadwal.'">'.$mata_pelajaran.' - '.$hari.' ('.$jam_masuk.'-'.$jam_keluar.')</option>
                          ';                       
                        }
                      ?>
                    </select>
                  <hr>
                  <label class="control-label" for="bulan">Berdasar bulan :</label>
                  <br>
                    <select class="form-control" id="bulan" name="bulan">
                      <option value="">Pilih Bulan</option>
                      <?php
                        $myQry = mysqli_query($koneksiDb,cekbulantahunabsen()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        $xbulan = '';
                        $xtahun = '';
                        while($myData = mysqli_fetch_array($myQry)){
                          $bulan = $myData['bulan'];
                          $tahun = $myData['tahun'];
                          if (!(($xbulan == $bulan) && ($xtahun == $tahun))) {
                            $sementara = $bulan.'-'.$tahun;
                            echo '
                              <option value="'.$sementara.'">'.$bulan.'-'.$tahun.'</option>
                            ';
                          }
                          $xbulan = $bulan;
                          $xtahun = $tahun;                        
                        }
                      ?>
                    </select>
                  <hr>
                  <label class="control-label" for="semester">Berdasar semester :</label>
                  <br>
                    <select class="form-control" id="semester" name="semester">
                      <option value="">Pilih Semester</option>
                      <?php
                        $myQry = mysqli_query($koneksiDb,cekbulantahunabsen()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        $xsemester = '';
                        $xtahun = '';
                        while($myData = mysqli_fetch_array($myQry)){
                          $bulan = $myData['bulan'];
                          switch ($bulan) {
                            case '1':
                              $semester = 'Genap';
                              break;
                            case '2':
                              $semester = 'Genap';
                              break;
                            case '3':
                              $semester = 'Genap';
                              break;
                            case '4':
                              $semester = 'Genap';
                              break;
                            case '5':
                              $semester = 'Genap';
                              break;
                            case '6':
                              $semester = 'Genap';
                              break;
                            case '7':
                              $semester = 'Ganjil';
                              break;
                            case '8':
                              $semester = 'Ganjil';
                              break;
                            case '9':
                              $semester = 'Ganjil';
                              break;
                            case '10':
                              $semester = 'Ganjil';
                              break;
                            case '11':
                              $semester = 'Ganjil';
                              break;
                            case '12':
                              $semester = 'Ganjil';
                              break;
                          }
                          $tahun = $myData['tahun'];
                          if (!(($xsemester == $semester) && ($xtahun == $tahun))) {
                            $sementara = $semester .'-'. $tahun;
                            echo '
                              <option value="'.$sementara.'">'.$semester.'-'.$tahun.'</option>
                            ';
                          }
                          $xsemester = $semester;
                          $xtahun = $tahun;                        
                        }
                      ?>
                    </select>                                      
                </div>
                <div class="modal-footer">
                  <input type="submit" name="buttonPrint" id="buttonPrint" value="Cetak" class="btn btn-primary btn-user">                              
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Absensi</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit"  style="text-align: left;">            
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="id_jadwal">Jadwal :</label>
                          <!-- <input name="id_jadwal" class="form-control" id="id_jadwal" type="text" placeholder="Jadwal" required=""> -->
                          <select  name="id_jadwal" class="form-control" id="id_jadwal" required="">
                            <option value="">Pilih Jadwal</option>
                            <?php
                              $myQry = mysqli_query($koneksiDb,datajadwal()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                              while($myData = mysqli_fetch_array($myQry)){
                                $id_jadwal = $myData['id_jadwal'];
                                $hari = $myData['hari'];
                                $mata_pelajaran = $myData['mata_pelajaran'];
                                $jam_masuk = $myData['jam_masuk'];
                                $jam_keluar = $myData['jam_keluar'];
                                $myQry2 = mysqli_query($koneksiDb,datamatapelajaran2($mata_pelajaran)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                                while($myData2 = mysqli_fetch_array($myQry2)){
                                  $mata_pelajaran = $myData2['mata_pelajaran'];
                                }
                                echo '
                                  <option value="'.$id_jadwal.'">'.$mata_pelajaran.' ('.$hari.', '.$jam_masuk.'-'.$jam_keluar.')'.'</option>
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
                          <label class="control-label" for="tanggal_absensi">Tanggal Absensi :</label>
                          <input name="tanggal_absensi" class="form-control" id="tanggal_absensi" type="date" placeholder="Id admin" required="">
                        </div>
                      </div>
                      <br>
                      <div class="form-row">
                        <div class="col-md-12">
                          <label class="control-label" for="masuk">Masuk :</label>
                          <input name="masuk" class="form-control" id="masuk" type="time" placeholder="Id admin" required="">
                        </div>
                      </div>
                    </div>                                        
                  <div class="modal-footer">
                    <input type="submit" name="buttonTambah" id="buttonTambah" value="Tambah Absensi" class="btn btn-primary btn-user">                              
                  </div>
                </form>
              </div>
            </div>
          </div>
<?php 
        if(isset($_POST['buttonTambah'])){
          if(isset($_POST['id_jadwal'])){
            $id_jadwal=$_POST['id_jadwal'];
          }
          if(isset($_POST['id_siswa'])){
            $id_siswa=$_POST['id_siswa'];
          }
          if(isset($_POST['tanggal_absensi'])){
            $tanggal_absensi=$_POST['tanggal_absensi'];
          }
          if(isset($_POST['masuk'])){
            $masuk=$_POST['masuk'];
          }
          $myQry = mysqli_query($koneksiDb,tambahabsen($id_jadwal, $id_siswa, $tanggal_absensi, $masuk)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Absensi'>";            
          }

        }

        if(isset($_POST['buttonPrint'])){
          if(isset($_POST['mata_pelajaran'])){
            $mata_pelajaran2=$_POST['mata_pelajaran'];
          }else{
            $mata_pelajaran2="";
          }
          if(isset($_POST['bulan'])){
            $bulan2=$_POST['bulan'];
          }else{
            $bulan2=""; 
          }
          if(isset($_POST['semester'])){
            $semester2=$_POST['semester'];
          }else{
            $semester2="";
          }
          echo"<meta http-equiv='refresh' content='0; url=?Open=Coba&mata_pelajaran=$mata_pelajaran2&bulan=$bulan2&semester=$semester2' target=_BLANK>";
        }

      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>