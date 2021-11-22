<?php
require('importxls/php-excel-reader/excel_reader2.php');
require('importxls/SpreadsheetReader.php');
require "config/koneksi.php";
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {
?>
<h1 class="h3 mb-2 text-gray-800">Import Data Siswa</h1>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <p class="mb-4">Upload file excel dengan format .xls untuk menambahkan banyak data siswa baru sekaligus!</p>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a> -->
  <div class="dropdown mb-4">
  	<a class="btn btn-primary" href="file/template_data_siswa/template.xls"> <i class="fa fa-download"></i> Download Template File</a>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Import Data Siswa</h6> 
  </div>
  <div class="card-body">
    <form class="user" name="form1" method="post" enctype="multipart/form-data">
      <div class="form-group row">
      	<div class="col-sm-12 mb-3 mb-sm-0">
	      <label for="file_siswa">File Excel :</label>
	      <input type="file" class="form-control" id="file_siswa" placeholder="Id" name="file_siswa" required>
	  	</div>
      </div>
      <!-- <hr> -->
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
	if(isset($_POST['buttonsubmit']))
	{
		$mimes = ['application/vnd.ms-excel',
		          'text/xls',
		          'text/xlsx',
		          'application/vnd.oasis.opendocument.spreadsheet',
		          'application/octet-stream'];
		if(in_array($_FILES["file_siswa"]["type"],$mimes))
		{
		$fileImport_name = $_FILES['file_siswa']['name'];
		$fileImport_ext = explode('.', $fileImport_name);
		$fileImport_actualext = strtolower(end($fileImport_ext));
		$fileImport_namenew="file_siswa.".$fileImport_actualext;
		$uploadFilePath = 'file/'.$fileImport_namenew;
		// $uploadFilePath = 'file/'.basename($_FILES['fileImport']['name']);
		// $uploadFilePath = 'file/import';

		move_uploaded_file($_FILES['file_siswa']['tmp_name'], $uploadFilePath);
		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
		//echo "You have total ".$totalSheet." sheets".

		// $html="<table border='1'>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++)
		{
			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
			{
				$id_siswa = isset($Row[0]) ? $Row[0] : '';
				$nama_siswa = isset($Row[1]) ? $Row[1] : '';
				$alamat_siswa = isset($Row[2]) ? $Row[2] : '';
				$tempat_lahir_siswa = isset($Row[3]) ? $Row[3] : '';
				$tanggal_lahir_siswa = isset($Row[4]) ? $Row[4] : '';
				$agama_siswa = isset($Row[5]) ? $Row[5] : '';
				$jenis_kelamin_siswa = isset($Row[6]) ? $Row[6] : '';
				$asal_sekolah_siswa = isset($Row[7]) ? $Row[7] : '';
				$tanggal_terdaftar_siswa = isset($Row[8]) ? $Row[8] : '';
				$email_siswa = isset($Row[9]) ? $Row[9] : '';
				$hp_siswa = isset($Row[10]) ? $Row[10] : '';
				$warga_negara_siswa = isset($Row[11]) ? $Row[11] : '';
				$status_siswa = isset($Row[12]) ? $Row[12] : '';
				$nama_ortu_siswa = isset($Row[13]) ? $Row[13] : '';
				$alamat_ortu_siswa = isset($Row[14]) ? $Row[14] : '';
				$email_ortu_siswa = isset($Row[15]) ? $Row[15] : '';
				$hp_ortu_siswa = isset($Row[16]) ? $Row[16] : '';

				$datasiswa = array(
		            'id_siswa' => $id_siswa, 
		            'nama_siswa' => $nama_siswa, 
		            'alamat_siswa' => $alamat_siswa, 
		            'agama_siswa' => $agama_siswa, 
		            'tempat_lahir_siswa' => $tempat_lahir_siswa, 
		            'tanggal_lahir_siswa' => date('Y-m-d',strtotime($tanggal_lahir_siswa)), 
		            'jenis_kelamin_siswa' => $jenis_kelamin_siswa, 
		            'asal_sekolah_siswa' => $asal_sekolah_siswa, 
		            'tanggal_terdaftar_siswa' => date('Y-m-d',strtotime($tanggal_terdaftar_siswa)),
		            'email_siswa' => $email_siswa, 
		            'hp_siswa' => $hp_siswa, 
		            'warga_negara_siswa' => $warga_negara_siswa, 
		            'status_siswa' => $status_siswa,  
		            'nama_ortu_siswa' => $nama_ortu_siswa, 
		            'alamat_ortu_siswa' => $alamat_ortu_siswa, 
		            'email_ortu_siswa' => $email_ortu_siswa, 
		            'hp_ortu_siswa' => $hp_ortu_siswa,
		            'foto_siswa' => ''
		          );

				if (($id_siswa != "ID") and ($id_siswa != "id") and ($id_siswa != "Id") and ($id_siswa != "")) {
					$myQry = mysqli_query($koneksiDb,ceknamasiswa($id_siswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
					$num = mysqli_num_rows($myQry);
					if ($num == 0) {
						$myQry = mysqli_query($koneksiDb,tambahdatasiswa($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		                  if($myQry){
		                    $myQry = mysqli_query($koneksiDb,tambahakunsiswa($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		                    if($myQry){
		                      $myQry = mysqli_query($koneksiDb,tambahakunortu($datasiswa)) or die ("Gagal Query1" .mysqli_error($koneksiDb));
		                      if($myQry){
		                       	// echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Siswa'>";
		                      }     
		                    }           
		                  }
					}
				}
			}
		}

		// echo"<meta http-equiv='refresh' content='0; url=?Open=Data-Siswa'>";
		// echo $kurasi;
		// echo $html;
		}
		else
		{
			?>
                <script type="text/javascript">
                  alert('Ekstensi file tidak diijinkan. Upload file berekstensi .xls.<?php echo $_FILES["file_siswa"]["type"]?>');
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