<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  ?>
		<h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Berikut adalah data siswa yang terdaftar di <?php echo $namasekolah;?>.</p>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
      <div class="dropdown mb-4">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tambah data
        </button>
        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="?Open=Tambah-Data-Siswa">Tambah satu data</a>
          <a class="dropdown-item" href="?Open=Import-Data-Siswa">Tambah banyak data</a>
        </div>
      </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Tempat/Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Status RFID</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Tempat/Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Status RFID</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $myQry = mysqli_query($koneksiDb,datasiswa()) or die ("Query Salah : ".mysqli_error($koneksiDb));
                      while($myData = mysqli_fetch_array($myQry)){
                        $id_siswa = $myData['id_siswa'];
                        $nama_siswa = $myData['nama_siswa'];
                        $tempat_lahir_siswa = $myData['tempat_lahir_siswa'];
                        $tanggal_lahir_siswa = $myData['tanggal_lahir_siswa'];
                        $jenis_kelamin = $myData['jenis_kelamin'];
                        $alamat_siswa = $myData['alamat_siswa'];
                        $agama_siswa = $myData['agama_siswa'];
                        $asal_sekolah_siswa = $myData['asal_sekolah_siswa'];
                        $tanggal_terdaftar_siswa = $myData['tanggal_terdaftar_siswa'];
                        $email_siswa = $myData['email_siswa'];
                        $hp_siswa = $myData['hp_siswa'];
                        $warga_negara_siswa = $myData['warga_negara_siswa'];
                        $status_siswa = $myData['status_siswa'];
                        $foto_siswa = $myData['foto_siswa'];
                        $nama_ortu_siswa = $myData['nama_ortu_siswa'];
                        $alamat_ortu_siswa = $myData['alamat_ortu_siswa'];
                        $email_ortu_siswa = $myData['email_ortu_siswa'];
                        $hp_ortu_siswa =$myData['hp_ortu_siswa'];

                        $tls = substr($tanggal_lahir_siswa, 8, 2);
                        $tls .= "-";
                        $tls .= substr($tanggal_lahir_siswa, 5, 2);
                        $tls .= "-";
                        $tls .= substr($tanggal_lahir_siswa, 0, 4);

                        $tts = substr($tanggal_terdaftar_siswa, 8, 2);
                        $tts .= "-";
                        $tts .= substr($tanggal_terdaftar_siswa, 5, 2);
                        $tts .= "-";
                        $tts .= substr($tanggal_terdaftar_siswa, 0, 4);

                        if (($foto_siswa == null) or ($foto_siswa == '')) {
                          $foto_siswa = 'image/user.png';
                        }

                        $myQry2 = mysqli_query($koneksiDb,datarfid($id_siswa)) or die ("Query Salah : ".mysqli_error($koneksiDb));
                        $num = mysqli_num_rows($myQry2);
                        if ($num == 0) {
                          $status_rfid = '
                            <center>
                              <a href="#" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-times"></i>
                              </a>
                            </center>
                            ';
                          $id_rfid='-';
                          $saldo_rfid='-';
                        }else{
                          $status_rfid = '
                            <center>
                              <a href="#" class="btn btn-success btn-circle btn-sm">
                                <i class="fas fa-check"></i>
                              </a>
                            </center>
                            ';
                          while($myData2 = mysqli_fetch_array($myQry2)){
                            $id_rfid = $myData2['id_rfid'];
                            $saldo_rfid = $myData2['saldo_rfid'];
                          }
                        }
                    ?>
                        <tr>
                          <td><?php echo $id_siswa ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $tempat_lahir_siswa.'/'.$tls ?></td>
                          <td><?php echo $jenis_kelamin ?></td>
                          <td><?php echo $status_rfid ?></td>
                          <td align="center">
                            <?php
                              $targetLihat = "ModalLihatSiswa".$id_siswa;
                              $targetDel = "ModalDeleteSiswa".$id_siswa;
                            ?>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo $targetLihat?>">
                              <i class="fa fa-ellipsis-h"></i>
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
                                    <a class="btn btn-primary" href="?Open=Hapus-Data-Siswa&id=<?php echo $id_siswa?>">Hapus</a>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            <!-- End of Delete User Modal-->
                            <!-- Lihat User Modal-->
                              <div class="modal fade" id="<?php echo $targetLihat?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Lihat Data Siswa</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <form id="Form" method="post" enctype="multipart/form-data">
                                    <div class="modal-body" id="modal-edit"  style="text-align: left;">
                                        <center>
                                          <img src="<?php echo $foto_siswa?>" style="height: 160px;">
                                          <hr>                                          
                                        </center>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="id">ID</label>
                                              <input name="id" class="form-control" id="id" type="text" value="<?php echo $id_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="nama">Nama</label>
                                              <input name="nama" class="form-control" id="nama" type="text" value = "<?php echo ucwords($nama_siswa)?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="ttl">Tempat/Tanggal Lahir</label>
                                              <input name="ttl" class="form-control" id="ttl" type="text" value="<?php echo $tempat_lahir_siswa.'/'.$tls?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                              <input name="jenis_kelamin" class="form-control" id="jenis_kelamin" type="text" value = "<?php echo $jenis_kelamin ?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="alamat">Alamat</label>
                                              <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $alamat_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="agama">Agama</label>
                                              <input name="agama" class="form-control" id="agama" type="text" value = "<?php echo ucwords($agama_siswa)?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="asal_sekolah">Asal Sekolah</label>
                                              <input name="asal_sekolah" class="form-control" id="asal_sekolah" type="text" value="<?php echo $asal_sekolah_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="tanggal_terdaftar">Tanggal Terdaftar</label>
                                              <input name="tanggal_terdaftar" class="form-control" id="tanggal_terdaftar" type="text" value = "<?php echo $tts?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="email_siswa">Email</label>
                                              <input name="email_siswa" class="form-control" id="email_siswa" type="text" value="<?php echo $email_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="hp_siswa">HP</label>
                                              <input name="hp_siswa" class="form-control" id="hp_siswa" type="text" value = "<?php echo $hp_siswa?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="warga_negara">Warga Negara</label>
                                              <input name="warga_negara" class="form-control" id="warga_negara" type="text" value="<?php echo $warga_negara_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="status_siswa">Status</label>
                                              <input name="status_siswa" class="form-control" id="status_siswa" type="text" value = "<?php echo $status_siswa?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="nama_ortu_siswa">Nama Orang Tua</label>
                                              <input name="nama_ortu_siswa" class="form-control" id="nama_ortu_siswa" type="text" value="<?php echo $nama_ortu_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="alamat_ortu">Alamat Orang Tua</label>
                                              <input name="alamat_ortu" class="form-control" id="alamat_ortu" type="text" value = "<?php echo $alamat_ortu_siswa?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="email_ortu_siswa">Email Orang Tua</label>
                                              <input name="email_ortu_siswa" class="form-control" id="email_ortu_siswa" type="text" value="<?php echo $email_ortu_siswa?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                              <label class="control-label" for="hp_ortu">HP Orang Tua</label>
                                              <input name="hp_ortu" class="form-control" id="hp_ortu" type="text" value = "<?php echo $hp_ortu_siswa?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <label class="control-label" for="email_ortu_siswa">Id Rfid</label>
                                              <input name="email_ortu_siswa" class="form-control" id="email_ortu_siswa" type="text" value="<?php echo $id_rfid?>" disabled>
                                            </div> 
                                            <div class="col-md-6">
                                              <label class="control-label" for="saldo_rfid">Saldo</label>
                                              <input name="saldo_rfid" class="form-control" id="saldo_rfid" type="text" value = "<?php echo $saldo_rfid?>" disabled>
                                            </div>
                                          </div>
                                        </div>
                                      <div class="modal-footer">
                                        <a class="btn btn-primary" href="?Open=Edit-Data-Siswa&id=<?php echo $id_siswa?>">Edit Data Siswa</a>                              
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
<?php 
      }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>