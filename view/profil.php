<?php
if(isset($_SESSION['SES_LOGIN'])) {
	$myQry = mysqli_query($koneksiDb,cekakun($_SESSION['SES_LOGIN'])) or die ("Query Salah : ".mysqli_error($koneksiDb));
	$myData = mysqli_fetch_array($myQry);
	$id_user = $myData['id_user'];
	$password = $myData['password'];
	switch ($myData['id_level']) {
		case '1':
			$level = 'Admin';
			break;
		case '2':
			$level = 'Siswa';
			$myQry = mysqli_query($koneksiDb,ceknamasiswa($id_user)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
			while($myData = mysqli_fetch_array($myQry)){
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
		        $hp_ortu_siswa = $myData['hp_ortu_siswa'];
			}
			break;
		case '3':
			$level = 'Orang Tua';
			$myQry = mysqli_query($koneksiDb,ceknamaortu($id_user)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
			while($myData = mysqli_fetch_array($myQry)){
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
		        $hp_ortu_siswa = $myData['hp_ortu_siswa'];
			}
			break;
	}
?>
	<h1 class="h3 mb-2 text-gray-800">Profil</h1>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	  <p class="mb-4">Berikut adalah data anda! Anda dapat mengedit password dengan mengeklik tombol ubah password. Untuk mengubah data lain, hubungi admin! </p>
	  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
	  <div class="dropdown mb-4">
	  	<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#passwordModal">Ubah Password</a>
	  </div>
	</div>
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary">Profil</h6> 
	  </div>
	  <div class="card-body">
	      <div class="form-group row">
	        <div class="col-sm-4 mb-3 mb-sm-0">
	        	<center>
	          		<img src="<?php echo $_SESSION['SES_FOTO']?>" style=" width: 100%;">
	        	</center>
	        </div>	  
	        <div class="col-sm-8">
	        	<div class="form-group row">
	        		<div class="col-sm-6 mb-3 mb-sm-0">
	        		<label for="id_user">Id User :</label>
				          <input type="text" class="form-control" id="id_user" placeholder="Nama" name="id_user" value="<?php echo $id_user?>" disabled >				        
	        		</div>
	        		<div class="col-sm-6">
	        		<label for="level">Level :</label>
				          <input type="text" class="form-control" id="level" placeholder="Nama" name="level" value="<?php echo $level?>" disabled >				        
	        		</div>
	        	</div>
	        	<div class="form-group row">
	        		<div class="col-sm-12 mb-3 mb-sm-0">
		        		<label for="password">Password :</label>
					    <input type="password" class="form-control" id="password" placeholder="Nama" name="password" value="<?php echo $password?>" disabled >        
				    </div>
	        	</div>
	        	<?php
	        		if($level == "Siswa"){
	        	?>
	        			<hr>
	        			<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="nama">Nama :</label>
						          <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $nama_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        			<label for="status">Status :</label>
						          <input type="text" class="form-control" id="status" placeholder="Nama" name="status" value="<?php echo $status_siswa?>" disabled >
			        		
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="tempat_tanggal_lahir">Tempat/Tanggal Lahir :</label>
						          <input type="text" class="form-control" id="tempat_tanggal_lahir" placeholder="Nama" name="tempat_tanggal_lahir" value="<?php echo $tempat_lahir_siswa.'/'.$tanggal_lahir_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="agama">Agama :</label>
						          <input type="text" class="form-control" id="agama" placeholder="Nama" name="agama" value="<?php echo $agama_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="jenis_kelamin">Jenis Kelamin :</label>
						          <input type="text" class="form-control" id="jenis_kelamin" placeholder="Nama" name="jenis_kelamin" value="<?php echo $jenis_kelamin?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="asal_sekolah">Asal Sekolah :</label>
						          <input type="text" class="form-control" id="asal_sekolah" placeholder="Nama" name="asal_sekolah" value="<?php echo $asal_sekolah_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="tanggal_terdaftar">Tanggal Terdaftar :</label>
						          <input type="text" class="form-control" id="tanggal_terdaftar" placeholder="Nama" name="tanggal_terdaftar" value="<?php echo $tanggal_terdaftar_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="email">Email :</label>
						          <input type="text" class="form-control" id="email" placeholder="Nama" name="email" value="<?php echo $email_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="hp">Hp :</label>
						          <input type="text" class="form-control" id="hp" placeholder="Nama" name="hp" value="<?php echo $hp_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="warga_negara">Warga Negara :</label>
						          <input type="text" class="form-control" id="warga_negara" placeholder="Nama" name="warga_negara" value="<?php echo $warga_negara_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-12 mb-3 mb-sm-0">
			        			<label for="alamat">Alamat :</label>
						          <input type="text" class="form-control" id="alamat" placeholder="Nama" name="alamat" value="<?php echo $alamat_siswa?>" disabled >
						    </div>
			        	</div>
			        	<hr>
	        			<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="nama_ortu">Nama Orang Tua :</label>
						          <input type="text" class="form-control" id="nama_ortu" placeholder="Nama" name="nama_ortu" value="<?php echo $nama_ortu_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="alamat_ortu">Alamat Orang Tua :</label>
						          <input type="text" class="form-control" id="alamat_ortu" placeholder="Nama" name="alamat_ortu" value="<?php echo $alamat_ortu_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="email_ortu">Email Orang Tua :</label>
						          <input type="text" class="form-control" id="email_ortu" placeholder="Nama" name="email_ortu" value="<?php echo $email_ortu_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="hp_ortu">Hp Orang Tua :</label>
						          <input type="text" class="form-control" id="hp_ortu" placeholder="Nama" name="hp_ortu" value="<?php echo $hp_ortu_siswa?>" disabled >
						    </div>
			        	</div>

	        	<?php
	        		} elseif ($level == "Orang Tua") {
	        	?>
	        			<hr>
	        			<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="nama_ortu">Nama :</label>
						          <input type="text" class="form-control" id="nama_ortu" placeholder="Nama" name="nama_ortu" value="<?php echo $nama_ortu_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="alamat_ortu">Alamat :</label>
						          <input type="text" class="form-control" id="alamat_ortu" placeholder="Nama" name="alamat_ortu" value="<?php echo $alamat_ortu_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="email_ortu">Email :</label>
						          <input type="text" class="form-control" id="email_ortu" placeholder="Nama" name="email_ortu" value="<?php echo $email_ortu_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="hp_ortu">Hp :</label>
						          <input type="text" class="form-control" id="hp_ortu" placeholder="Nama" name="hp_ortu" value="<?php echo $hp_ortu_siswa?>" disabled >
						    </div>
			        	</div>
	        			<hr>
	        			<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="nama">Nama Siswa :</label>
						          <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?php echo $nama_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        			<label for="status">Status Siswa :</label>
						          <input type="text" class="form-control" id="status" placeholder="Nama" name="status" value="<?php echo $status_siswa?>" disabled >
			        		
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="tempat_tanggal_lahir">Tempat/Tanggal Lahir Siswa :</label>
						          <input type="text" class="form-control" id="tempat_tanggal_lahir" placeholder="Nama" name="tempat_tanggal_lahir" value="<?php echo $tempat_lahir_siswa.'/'.$tanggal_lahir_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="agama">Agama Siswa :</label>
						          <input type="text" class="form-control" id="agama" placeholder="Nama" name="agama" value="<?php echo $agama_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="jenis_kelamin">Jenis Kelamin Siswa :</label>
						          <input type="text" class="form-control" id="jenis_kelamin" placeholder="Nama" name="jenis_kelamin" value="<?php echo $jenis_kelamin?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="asal_sekolah">Asal Sekolah Siswa :</label>
						          <input type="text" class="form-control" id="asal_sekolah" placeholder="Nama" name="asal_sekolah" value="<?php echo $asal_sekolah_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="tanggal_terdaftar">Tanggal Terdaftar Siswa :</label>
						          <input type="text" class="form-control" id="tanggal_terdaftar" placeholder="Nama" name="tanggal_terdaftar" value="<?php echo $tanggal_terdaftar_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="email">Email Siswa :</label>
						          <input type="text" class="form-control" id="email" placeholder="Nama" name="email" value="<?php echo $email_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-6 mb-3 mb-sm-0">
			        		<label for="hp">Hp Siswa :</label>
						          <input type="text" class="form-control" id="hp" placeholder="Nama" name="hp" value="<?php echo $hp_siswa?>" disabled >				        
			        		</div>
			        		<div class="col-sm-6">
			        		<label for="warga_negara">Warga Negara Siswa :</label>
						          <input type="text" class="form-control" id="warga_negara" placeholder="Nama" name="warga_negara" value="<?php echo $warga_negara_siswa?>" disabled >
						    </div>
			        	</div>
			        	<div class="form-group row">
			        		<div class="col-sm-12 mb-3 mb-sm-0">
			        			<label for="alamat">Alamat Siswa :</label>
						          <input type="text" class="form-control" id="alamat" placeholder="Nama" name="alamat" value="<?php echo $alamat_siswa?>" disabled >
						    </div>
			        	</div>			        	
			        	
	        	<?php
	        		}
	        	?>

	        </div>
	      </div>
	      <!-- <hr> -->
	  </div>
	</div>

	<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	<form class="user" name="form1" method="post" enctype="multipart/form-data">
			      <label for="password_lama">Password Lama :</label>
			      <input type="password" class="form-control" id="id_user" placeholder="Id" name="id_user" value="<?php echo $id_user;?>" style="display: none;" >
			      <input type="password" class="form-control" id="password_lama" placeholder="Password Lama" name="password_lama" required="" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
			      <br>
			      <label for="password_baru">Password Baru :</label>			      
			      <input type="password" class="form-control" id="password_baru" placeholder="Password baru" name="password_baru" required="" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
			      <br>
			      <label for="password_baru2">Konfirmasi Password Baru :</label>			      
			      <input type="password" class="form-control" id="password_baru2" placeholder="Konfirmasi Password baru" name="password_baru2" required="" onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
	    	</div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
	          <input type="submit" name="buttonSimpanpassword" id="buttonSimpanpassword" value="Simpan" class="btn btn-primary btn-user">
	      	</form>
	        </div>
	      </div>
	    </div>
	  </div>
<?php
	if(isset($_POST['buttonSimpanpassword'])){
		if(isset($_POST['id_user'])){
	    	$id_user=$_POST['id_user'];
	    }
	    if(isset($_POST['password_lama'])){
	    	$password_lama=$_POST['password_lama'];
	    }
	    if(isset($_POST['password_baru'])){
	    	$password_baru=$_POST['password_baru'];
	    }
		if(isset($_POST['password_baru2'])){
	    	$password_baru2=$_POST['password_baru2'];
	    }

	    $myQry = mysqli_query($koneksiDb,cekakun($id_user)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		$myData = mysqli_fetch_array($myQry);
		$password_asli = $myData['password'];


	    if ($password_lama == $password_asli ) {
	    	if ($password_baru == $password_baru2) {
	    		$dataakun = array('id_user' => $id_user,
		    				  'password_lama' => $password_lama,
		    				  'password_baru' => $password_baru,
		    				  'password_baru2' => $password_baru2
			     );

			    $myQry = mysqli_query($koneksiDb,editdataakun($password_baru,$id_user)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
			    if($myQry){
			    	echo"<meta http-equiv='refresh' content='0; url=?Open=Profil'>";            
			    }  
	    	}else{
	    		?>
	                <script type="text/javascript">
	                  alert("Password baru tidak sesuai.");
	                </script>
	            <?php
	    	}
	    }else{
	    	?>
                <script type="text/javascript">
                  alert("Password lama tidak sesuai.");
                </script>
            <?php
	    }
	}
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>