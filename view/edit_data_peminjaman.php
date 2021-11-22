<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
  	$no = $_GET['id'];
  	$myQry = mysqli_query($koneksiDb, cekdatapinjam($no)) or die ("Gagal Query1" .mysql_error());
  	while($myData = mysqli_fetch_array($myQry)){
          $no = $myData['id_peminjaman'];
          $id_siswa1 = $myData['id_siswa'];
          $id_buku1 = $myData['id_buku'];
          $tanggal_peminjaman1 = $myData['tanggal_peminjaman'];
          $tanggal_pengembalian1 = $myData['tanggal_pengembalian'];
  	}
?>
<h1 class="h3 mb-2 text-gray-800">Edit Data Pengembalian Buku</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk mengedit data pengembalian buku!</p>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengembalian Buku</h6> 
      </div>
      <div class="card-body">
        <form class="user" name="form1" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label class="control-label" for="id_siswa">ID Siswa :</label>
              <select  name="id_siswa" class="form-control" id="id_siswa" required="">
                <option value="">Pilih Siswa</option>
                <?php
                  $myQry = mysqli_query($koneksiDb, datasiswa()) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $id_siswa= $myData['id_siswa'];
                    $nama_siswa= $myData['nama_siswa'];
                    if ($id_siswa == $id_siswa1) {
                      echo '
                        <option value="'.$id_siswa.'" selected>'.$nama_siswa.'</option>
                      ';
                    } else {
                      echo '
                        <option value="'.$id_siswa.'">'.$nama_siswa.'</option>
                      ';
                    }
                  }
                ?>
              </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="tanggal_peminjaman">Tanggal Peminjaman :</label>
              <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman1?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="tanggal_pengembalian">Tanggal Pengembalian :</label>
              <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?php echo $tanggal_pengembalian1?>">
          </div>
            <div class="col-sm-6">
              <label class="control-label" for="id_buku">Judul Buku :</label>              
              <select  name="id_buku" class="form-control" id="id_buku" required="">
                <option value="">Pilih Buku</option>
                <?php
                  $myQry = mysqli_query($koneksiDb, ambildatabuku2()) or die ("Query Salah : ".mysql_error());
                  while($myData = mysqli_fetch_array($myQry)){
                    $judul_buku= $myData['judul_buku'];
                    $id_buku= $myData['rfid'];
                    if ($id_buku == $id_buku1) {
                      echo '
                        <option value="'.$id_buku.'" selected>'.$judul_buku.'</option>
                      ';
                    } else {
                      echo '
                        <option value="'.$id_buku.'">'.$judul_buku.'</option>
                      ';
                    }
                  }
                ?>
              </select>
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
  </div>
</div>

<?php
	if(isset($_POST['buttonsubmit'])){
		if(isset($_POST['id_siswa'])){
          $id_siswa=$_POST['id_siswa'];
          }
          if(isset($_POST['tanggal_peminjaman'])){
            $tanggal_peminjaman = $_POST['tanggal_peminjaman'];  
          }
          if(isset($_POST['tanggal_pengembalian'])){
            $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
          }
          if(isset($_POST['id_buku'])){
            $id_buku = $_POST['id_buku'];
          }

          $databuku = array( //dibuat dalam bentuk array
            'id_trapin' => $no,
            'id_siswa' => $id_siswa,
            'id_buku' => $id_buku,
          	'tanggal_peminjaman' => $tanggal_peminjaman, 
            'tanggal_pengembalian' => $tanggal_pengembalian
          );

          $myQry = mysqli_query($koneksiDb, editdatapinjam($databuku)) or die ("Gagal Query1" .mysql_error());
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Peminjaman-Buku'>";                       
          }

          
        }

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>