<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$id = $_GET['id'];
	if(isset($id)){
		// echo $id;		
		$myQry = mysqli_query($koneksiDb,datakelas2($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		while($myData = mysqli_fetch_array($myQry)){
			$nama_kelas=$myData['kelas'];
			$nama_cabang=$myData['cabang'];
		}
		?>
		<h1 class="h3 mb-2 text-gray-800">Lihat Data Kelas <?php echo $nama_kelas.'/'.$nama_cabang?></h1>
		    <div class="d-sm-flex align-items-center justify-content-between mb-4">
		      <p class="mb-4">Berikut adalah data kelas <?php echo $nama_kelas.'/'.$nama_cabang?> yang terdaftar di <?php echo $namasekolah;?>.</p>
		      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
		      <div class="dropdown mb-4">
		        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahsiswa">Tambah Siswa</a>
		      </div>
		    </div>
		        <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-primary">Data Kelas <?php echo $nama_kelas.'/'.$nama_cabang?></h6>
		              
		            </div>
		            <div class="card-body">
		              <div class="table-responsive">
		                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>Kelas</th>
		                      <th>Jumlah Siswa</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tfoot>
		                    <tr>
		                      <th>Kelas</th>
		                      <th>Jumlah Siswa</th>
		                      <th>Action</th>
		                    </tr>
		                  </tfoot>
		                  <tbody>
		<?php
		$myQry = mysqli_query($koneksiDb,datasiswadikelas($id)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		while($myData = mysqli_fetch_array($myQry)){
			$id_kelas = $myData['no'];
            $nama_kelas = $myData['kelas'];
            $id_siswa = $myData['id_siswa'];
			$myQry2 = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
			while($myData2 = mysqli_fetch_array($myQry2)){
				$nama_siswa = $myData2['nama_siswa'];
			}
            ?>
            <tr>
              <td><?php echo $id_siswa?></td>
              <td><?php echo $nama_siswa ?></td>
              <td align="center">
              	<?php
                  $targetDel = "ModalDeleteSiswa".$id_siswa;
                ?>
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
                        <a class="btn btn-primary" href="?Open=Hapus-Data-Siswa-Kelas&id=<?php echo $id?>&siswa=<?php echo $id_siswa?>">Hapus</a>
                      </div>
                      </div>
                    </div>
                  </div>
                <!-- End of Delete User Modal--> 
              </td>
            <?php
		}
		?>
						</tbody>
	                </table>
	              </div>
	            </div>
	          </div>
		<?php
	}
	?>
	<div class="modal fade" id="tambahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form id="Form" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit"  style="text-align: left;">
                  <div class="form-group">
                    <label class="control-label" for="siswa">Siswa</label>
                    <select name="siswa" class="form-control" id="siswa">
                      <option value="">Pilih Siswa</option>
                      <?php                      	
						$myQry3 = mysqli_query($koneksiDb,datasiswa2()) or die ("Gagal Query1" .mysqli_error($koneksiDb));
						while($myData3 = mysqli_fetch_array($myQry3)){
							$id_siswa=$myData3['id_siswa'];
							$nama_siswa=$myData3['nama_siswa'];
							echo "<option value='$id_siswa'>$id_siswa - $nama_siswa</option>";
						}
                      ?>
                    </select>                                        
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="buttonsubmit" id="buttonsubmit" value="Tambah Kelas" class="btn btn-primary btn-user">
                </div>
                </form>
              </div>
            </div>
          </div>
<?php
		if(isset($_POST['buttonsubmit'])){
		  if(isset($_POST['siswa'])){
		    $siswa = $_POST['siswa'];
		  }
		  $myQry = mysqli_query($koneksiDb,tambahdatasiswakelas($id, $siswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		  if($myQry){
		    echo"<meta http-equiv='refresh' content='0; url=?Open=Lihat-Data-Kelas&id=$id'>";
		  } 
		}
    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>