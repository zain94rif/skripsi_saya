<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

  $maxsize=1100000;
  $allowed = array('png', 'jpg', 'jpeg');
?>

<h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk menambahkan satu data siswa baru!</p>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6> 
  </div>
  <div class="card-body">
    <form class="user" name="form1" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="id_siswa">ID Siswa :</label>
          <input type="text" class="form-control" id="id_siswa" placeholder="Id" name="id_siswa" required onkeypress="return (event.charCode > 47 && event.charCode < 58)">
        </div>
        <div class="col-sm-6">
          <label for="nama_siswa">Nama Siswa :</label>
          <input type="text" class="form-control" id="nama_siswa" placeholder="Nama" name="nama_siswa" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="alamat_siswa">Alamat Siswa :</label>
          <input type="text" class="form-control" id="alamat_siswa" placeholder="Alamat" name="alamat_siswa" required>
        </div>
        <div class="col-sm-6">
          <label for="agama_siswa">Agama Siswa :</label>
          <select class="form-control" id="agama_siswa" name="agama_siswa" required>
            <option value="" selected>Agama</option>
            <option value="islam">Islam</option>
            <option value="kristen">Kristen</option>
            <option value="katholik">Katholik</option>
            <option value="hindu">Hindu</option>
            <option value="budha">Budha</option>
            <option value="konghuchu">Kong Hu Chu</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="tempat_lahir_siswa">Tempat Lahir Siswa :</label>
          <input type="text" class="form-control" id="tempat_lahir_siswa" placeholder="Tempat Lahir" name="tempat_lahir_siswa" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
        </div>
        <div class="col-sm-6">
          <label for="tanggal_lahir_siswa">Tanggal Lahir Siswa :</label>
          <input type="date" class="form-control" id="tanggal_lahir_siswa" placeholder="Tanggal Lahir" name="tanggal_lahir_siswa" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="jenis_kelamin_siswa">Jenis Kelamin Siswa :</label>
          <select class="form-control" id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" required>
            <option value="" selected>Jenis Kelamin</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="asal_sekolah_siswa">Asal Sekolah Siswa :</label>
          <input type="text" class="form-control" id="asal_sekolah_siswa" placeholder="Asal Sekolah" name="asal_sekolah_siswa" required onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="tanggal_terdaftar_siswa">Tanggal Terdaftar Siswa :</label>
          <input type="date" class="form-control" id="tanggal_terdaftar_siswa" placeholder="Tanggal Terdaftar" name="tanggal_terdaftar_siswa" required>
        </div>
        <div class="col-sm-6">
          <label for="email_siswa">Email Siswa :</label>
          <input type="email" class="form-control" id="email_siswa" placeholder="Email" name="email_siswa" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="hp_siswa">Nomor HP Siswa :</label>
          <input type="text" class="form-control" id="hp_siswa" placeholder="Hp" name="hp_siswa" required onkeypress="return (event.charCode > 47 && event.charCode < 58)">
        </div>
        <div class="col-sm-6">
          <label for="warga_negara_siswa">Warga Negara Siswa :</label>
          <input type="text" class="form-control" id="warga_negara_siswa" placeholder="Warga Negara" name="warga_negara_siswa" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="status_siswa">Status Siswa :</label>
          <select class="form-control" id="status_siswa" name="status_siswa" required>
            <option value="" selected>Status</option>
            <option value="aktif">Aktif</option>
            <option value="tidak aktif">Tidak aktif</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="foto_siswa">Foto Siswa :</label>
          <input type="file" class="form-control" id="foto_siswa" name="foto_siswa" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="nama_ortu_siswa">Nama Orang Tua Siswa :</label>
          <input type="text" class="form-control" id="nama_ortu_siswa" placeholder="Nama Orang Tua" name="nama_ortu_siswa" required="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
        </div>
        <div class="col-sm-6">
          <label for="alamat_ortu_siswa">Alamat Orang Tua Siswa :</label>
          <input type="text" class="form-control" id="alamat_ortu_siswa" placeholder="Alamat Orang Tua" name="alamat_ortu_siswa" required="">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="email_ortu_siswa">Email Orang Tua Siswa :</label>
          <input type="email" class="form-control" id="email_ortu_siswa" placeholder="Email Orang Tua" name="email_ortu_siswa" required="">
        </div>
        <div class="col-sm-6">
          <label for="hp_ortu_siswa">Nomor Hp Orang Tua Siswa :</label>
          <input type="text" class="form-control" id="hp_ortu_siswa" placeholder="Nomor Hp Orang Tua" name="hp_ortu_siswa" required="" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
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
          if(isset($_POST['id_siswa'])){
            $id_siswa=$_POST['id_siswa'];
          }
          if(isset($_POST['nama_siswa'])){
            $nama_siswa = $_POST['nama_siswa'];  
          }
          if(isset($_POST['alamat_siswa'])){
            $alamat_siswa = $_POST['alamat_siswa'];
          }
          if(isset($_POST['agama_siswa'])){
            $agama_siswa = $_POST['agama_siswa'];
          }
          if(isset($_POST['tempat_lahir_siswa'])){
            $tempat_lahir_siswa = $_POST['tempat_lahir_siswa'];  
          }
          if(isset($_POST['tanggal_lahir_siswa'])){
            $tanggal_lahir_siswa = $_POST['tanggal_lahir_siswa'];
          }
          if(isset($_POST['jenis_kelamin_siswa'])){
            $jenis_kelamin_siswa = $_POST['jenis_kelamin_siswa'];
          }
          if(isset($_POST['asal_sekolah_siswa'])){
            $asal_sekolah_siswa = $_POST['asal_sekolah_siswa'];  
          }
          if(isset($_POST['tanggal_terdaftar_siswa'])){
            $tanggal_terdaftar_siswa = $_POST['tanggal_terdaftar_siswa'];
          }
          if(isset($_POST['email_siswa'])){
            $email_siswa = $_POST['email_siswa'];
          }
          if(isset($_POST['hp_siswa'])){
            $hp_siswa = $_POST['hp_siswa'];
          }
          if(isset($_POST['warga_negara_siswa'])){
            $warga_negara_siswa = $_POST['warga_negara_siswa'];
          }
          if(isset($_POST['status_siswa'])){
            $status_siswa = $_POST['status_siswa'];
          }
          if(isset($_POST['nama_ortu_siswa'])){
            $nama_ortu_siswa = $_POST['nama_ortu_siswa'];
          }
          if(isset($_POST['alamat_ortu_siswa'])){
            $alamat_ortu_siswa = $_POST['alamat_ortu_siswa'];  
          }
          if(isset($_POST['email_ortu_siswa'])){
            $email_ortu_siswa = $_POST['email_ortu_siswa'];
          }
          if(isset($_POST['hp_ortu_siswa'])){
            $hp_ortu_siswa = $_POST['hp_ortu_siswa'];
          }

          if (file_exists("image/foto_siswa/foto_siswa" . $id_siswa . ".png")) {
            unlink("image/foto_siswa/foto_siswa" . $id_siswa . ".png");
          }
          if (file_exists("image/foto_siswa/foto_siswa" . $id_siswa . ".jpg")) {
            unlink("image/foto_siswa/foto_siswa" . $id_siswa . ".jpg");
          }
          if (file_exists("image/foto_siswa/foto_siswa" . $id_siswa . ".jpeg")) {
            unlink("image/foto_siswa/foto_siswa" . $id_siswa . ".jpeg");
          }

          $foto_siswa = $_FILES['foto_siswa'];
          $foto_siswaname = $_FILES['foto_siswa']['name'];
          $foto_siswatype = $_FILES['foto_siswa']['type'];
          $foto_siswatmp = $_FILES['foto_siswa']['tmp_name'];
          $foto_siswasize = $_FILES['foto_siswa']['size'];
          $foto_siswaerror = $_FILES['foto_siswa']['error'];

          $foto_siswaext = explode('.', $foto_siswaname);
          $foto_siswaactualext = strtolower(end($foto_siswaext));
          $foto_siswanamenew="foto_siswa_".$id_siswa.".".$foto_siswaactualext;
          $foto_siswadestination = 'image/foto_siswa/'.$foto_siswanamenew;


          $datasiswa = array(
            'id_siswa' => $id_siswa, 
            'nama_siswa' => $nama_siswa, 
            'alamat_siswa' => $alamat_siswa, 
            'agama_siswa' => $agama_siswa, 
            'tempat_lahir_siswa' => $tempat_lahir_siswa, 
            'tanggal_lahir_siswa' => $tanggal_lahir_siswa, 
            'jenis_kelamin_siswa' => $jenis_kelamin_siswa, 
            'asal_sekolah_siswa' => $asal_sekolah_siswa, 
            'tanggal_terdaftar_siswa' => $tanggal_terdaftar_siswa,
            'email_siswa' => $email_siswa, 
            'hp_siswa' => $hp_siswa, 
            'warga_negara_siswa' => $warga_negara_siswa, 
            'status_siswa' => $status_siswa,  
            'nama_ortu_siswa' => $nama_ortu_siswa, 
            'alamat_ortu_siswa' => $alamat_ortu_siswa, 
            'email_ortu_siswa' => $email_ortu_siswa, 
            'hp_ortu_siswa' => $hp_ortu_siswa,
            'foto_siswa' => $foto_siswadestination
          );


          if (in_array($foto_siswaactualext, $allowed)) {
            if ($foto_siswasize<=$maxsize) {
              move_uploaded_file($foto_siswatmp, $foto_siswadestination);
              if (file_exists($foto_siswadestination)) {
                $myQry = mysqli_query($koneksiDb,tambahdatasiswa($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
                if($myQry){
                  $myQry = mysqli_query($koneksiDb,tambahakunsiswa($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
                  if($myQry){
                    $myQry = mysqli_query($koneksiDb,tambahakunortu($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
                    if($myQry){
                      echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Siswa'>";            
                    }           
                  }           
                }
              } else {
                ?>
                <script type="text/javascript">
                  alert("Gagal menambah data baru");
                </script>
                <?php
              }
            } else {
              ?>
              <script type="text/javascript">
                alert("Ukuran file terlalu besar. Upload file dengan ukuran tidak lebih dari 1MB.");
              </script>
              <?php
            }
          } else {
            ?>
            <script type="text/javascript">
              alert("Ekstensi file tidak diijinkan. Upload file berekstensi PNG, atau JPG.");
            </script>
            <?php
          }
        }


    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>