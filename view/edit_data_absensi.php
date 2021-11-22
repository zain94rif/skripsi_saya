<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  	$id = $_GET['id'];
  	$myQry = mysqli_query($koneksiDb,cekdataabsen($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
  	while($myData = mysqli_fetch_array($myQry)){
          $id_jadwal1 = $myData['id_jadwal'];
          $id_siswa1 = $myData['id_siswa'];
          $tanggal_absensi1 = $myData['tanggal_absensi'];
          $masuk1 = $myData['masuk'];
  	}
?>
<h1 class="h3 mb-2 text-gray-800">Edit Data Absensi</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk mengedit data Absensi!</p>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Data Absensi</h6> 
  </div>
  <div class="card-body">
    <form class="user" name="form1" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label class="control-label" for="id_jadwal">Jadwal :</label>
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
                if ($id_jadwal == $id_jadwal1) {
                  echo '
                    <option value="'.$id_jadwal.'" selected>'.$mata_pelajaran.' ('.$hari.', '.$jam_masuk.'-'.$jam_keluar.')'.'</option>
                  ';
                } else {
                  echo '
                    <option value="'.$id_jadwal.'">'.$mata_pelajaran.' ('.$hari.', '.$jam_masuk.'-'.$jam_keluar.')'.'</option>
                  ';
                }
              }
            ?>
          </select>
          <input type="text" class="form-control" id="id" placeholder="Tempat Lahir" name="id" value="<?php echo $id?>" style="display: none;">
        </div>
        <div class="col-sm-6">
          <label class="control-label" for="siswa">Siswa :</label>
          <select  name="siswa" class="form-control" id="siswa" required="">
            <option value="">Pilih Siswa</option>
            <?php
              $myQry = mysqli_query($koneksiDb,datasiswa()) or die ("Query Salah : ".mysqli_error($koneksiDb));
              while($myData = mysqli_fetch_array($myQry)){
                $id_siswa = $myData['id_siswa'];
                $nama_siswa = $myData['nama_siswa'];
                if ($id_siswa == $id_siswa1) {
                  echo '
                    <option value="'.$id_siswa.'" selected>'.$id_siswa.' - '.$nama_siswa.'</option>
                  ';            
                } else {
                  echo '
                    <option value="'.$id_siswa.'">'.$id_siswa.' - '.$nama_siswa.'</option>
                  ';            
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="masuk">Jam Masuk :</label>
          <input type="time" class="form-control" id="masuk" name="masuk" value="<?php echo $masuk1?>" required>
        </div>
        <div class="col-sm-6">
          <label for="tanggal_absensi">Jam Keluar :</label>
          <input type="date" class="form-control" id="tanggal_absensi" name="tanggal_absensi" value="<?php echo $tanggal_absensi1?>" required>
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
      		if(isset($_POST['id'])){
                  $id=$_POST['id'];
          }
          if(isset($_POST['id_jadwal'])){
            $id_jadwal = $_POST['id_jadwal'];  
          }
          if(isset($_POST['siswa'])){
            $siswa = $_POST['siswa'];
          }
          if(isset($_POST['masuk'])){
            $masuk = $_POST['masuk'];
          }
          if(isset($_POST['tanggal_absensi'])){
            $tanggal_absensi = $_POST['tanggal_absensi'];
          }
          $dataabsensi = array(
            'id' => $id,
          	'id_jadwal' => $id_jadwal, 
            'id_siswa' => $siswa, 
            'masuk' => $masuk, 
            'tanggal_absensi' => $tanggal_absensi
          );

          $myQry = mysqli_query($koneksiDb,editdataabsensi($dataabsensi)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Absensi'>";                       
          }

          
        }

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>