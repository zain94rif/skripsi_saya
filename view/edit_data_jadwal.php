<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  	$id = $_GET['id'];
    $kelas = $_GET['kelas'];
    $daftarhari = array('senin', 
                        'selasa',
                        'rabu',
                        'kamis',
                        'jumat',
                        'sabtu',
                        'minggu'
                       );
  	$myQry = mysqli_query($koneksiDb,cekjadwal($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
  	while($myData = mysqli_fetch_array($myQry)){
          $id_jadwal = $myData['id_jadwal'];
          $hari = $myData['hari'];
          $mata_pelajaran = $myData['mata_pelajaran'];
          $jam_masuk = $myData['jam_masuk'];
          $jam_keluar = $myData['jam_keluar'];
          $pin_aktivasi = $myData['pin_aktivasi'];
  	}
?>
<h1 class="h3 mb-2 text-gray-800">Edit Data Jadwal Pelajaran</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk mengedit data Jadwal Pelajaran!</p>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Jadwal Pelajaran</h6> 
  </div>
  <div class="card-body">
    <form class="user" name="form1" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="hari">Hari :</label>
          <select class="form-control" id="hari" name="hari" required="">
            <option value="">Pilih hari</option>
            <?php
              foreach ($daftarhari as $key => $value) {
                if ($hari == $value) {
                  echo '
                    <option value="'.$value.'" selected>'.ucfirst($value).'</option>
                   ';  
                } else {
                  echo '
                    <option value="'.$value.'">'.ucfirst($value).'</option>
                  ';                  
                }
               }
            ?>
          </select>
          <input type="text" class="form-control" id="id_jadwal" placeholder="Tempat Lahir" name="id_jadwal" value="<?php echo $id_jadwal?>" style="display: none;">
        </div>
        <div class="col-sm-6">
          <label for="mata_pelajaran">Mata Pelajaran :</label>
          <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
            <option value="">Pilih Mata Pelajaran</option>
            <?php
              $myQry5 = mysqli_query($koneksiDb, datamatapelajaran()) or die ("Query Salah : ".mysqli_error($koneksiDb));
              while($myData5 = mysqli_fetch_array($myQry5)){
                $idmata_pelajaran = $myData5['no'];
                $namamata_pelajaran = $myData5['mata_pelajaran'];
                if ($mata_pelajaran == $idmata_pelajaran) {
                  echo '
                        <option value='.$idmata_pelajaran.' selected>'.$namamata_pelajaran.'</option>
                        ';
                } else {
                  echo '
                        <option value='.$idmata_pelajaran.'>'.$namamata_pelajaran.'</option>
                        ';
                }
              } 
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="jam_masuk">Jam Masuk :</label>
          <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?php echo $jam_masuk?>" required>
        </div>
        <div class="col-sm-6">
          <label for="jam_keluar">Jam Keluar :</label>
          <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?php echo $jam_keluar?>" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
          <label for="pin_aktivasi">Pin Aktivasi :</label>
          <input type="text" class="form-control" id="pin_aktivasi" name="pin_aktivasi" value="<?php echo $pin_aktivasi?>" required>
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


<?php

	if(isset($_POST['buttonsubmit'])){
		if(isset($_POST['id_jadwal'])){
            $id_jadwal=$_POST['id_jadwal'];
          }
          if(isset($_POST['hari'])){
            $hari = $_POST['hari'];  
          }
          if(isset($_POST['jam_masuk'])){
            $jam_masuk = $_POST['jam_masuk'];
          }
          if(isset($_POST['jam_keluar'])){
            $jam_keluar = $_POST['jam_keluar'];
          }
          if(isset($_POST['mata_pelajaran'])){
            $mata_pelajaran = $_POST['mata_pelajaran'];
          }
          if(isset($_POST['pin_aktivasi'])){
            $pin_aktivasi = $_POST['pin_aktivasi'];
          }
          $datajadwal = array(
          	'id_jadwal' => $id_jadwal, 
            'mata_pelajaran' => $mata_pelajaran, 
            'hari' => $hari, 
            'jam_masuk' => $jam_masuk, 
            'jam_keluar' => $jam_keluar,
            'pin_aktivasi' => $pin_aktivasi
          );

          $myQry = mysqli_query($koneksiDb,editdatajadwal($datajadwal)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Lihat-Jadwal-Pelajaran&id=$kelas'>";                       
          }

          
        }

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>