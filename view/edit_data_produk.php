<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
    $id_produk = $_GET['id'];
    $myQry = mysqli_query($koneksiDb,cekdataproduk($id_produk)) or die ("Gagal Query1" .mysql_error());
    while($myData = mysqli_fetch_array($myQry)){
          $id_produk = $myData['id_makanan'];
          $nama_makanan = $myData['nama_makanan'];
          $harga_makanan = $myData['harga_makanan'];
          $stok_makanan = $myData['stok_makanan'];
    }
?>
<h1 class="h3 mb-2 text-gray-800">Edit Data Produk</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Isi form berikut untuk mengedit data Produk!</p>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Produk</h6> 
      </div>
      <div class="card-body">
        <form class="user" name="form1" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label class="control-label" for="id_produk">ID Produk :</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo $id_produk?>" disabled>
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?php echo $id_produk?>" style="display: none;" >
            </div>
            <div class="col-sm-6">
              <label class="control-label" for="nama_makanan">Nama Makanan :</label>
              <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" value="<?php echo $nama_makanan?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label class="control-label" for="harga_makanan">Harga Makanan :</label>
              <input type="text" class="form-control" id="harga_makanan" name="harga_makanan" onkeypress="return (event.charCode > 47 && event.charCode < 58)" value="<?php echo $harga_makanan?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label class="control-label" for="stok_makanan">Stok Makanan:</label>
              <input type="number" min ="0" class="form-control" id="stok_makanan" name="stok_makanan" value="<?php echo $stok_makanan?>" required>
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
    if(isset($_POST['id_produk'])){
            $id_produk=$_POST['id_produk'];
          }
          if(isset($_POST['nama_makanan'])){
            $nama_makanan = $_POST['nama_makanan'];  
          }
          if(isset($_POST['harga_makanan'])){
            $harga_makanan = $_POST['harga_makanan'];
          }
          if(isset($_POST['stok_makanan'])){
            $stok_makanan = $_POST['stok_makanan'];
          }
          $datamakanan = array(
            'id_produk' => $id_produk,
            'nama_makanan' => $nama_makanan, 
            'harga_makanan' => $harga_makanan, 
            'stok_makanan' => $stok_makanan
          );

          $myQry = mysqli_query($koneksiDb, editmakanan($datamakanan)) or die ("Gagal Query1" .mysql_error());
          if($myQry){            
            echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Produk'>";                       
          }

          
        }

    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>