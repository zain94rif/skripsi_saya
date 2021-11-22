<form name="form1" method="post" enctype="multipart/form-data">
	<label for="foto_siswa">file :</label>
	<input type="file" id="foto_siswa" name="foto_siswa" required>
	<input type="submit" name="buttonsubmit" id="buttonsubmit" value="SUBMIT">
</form>

<a href="file">link hasil</a>


<?php
	if(isset($_POST['buttonsubmit'])){
		$foto_siswa = $_FILES['foto_siswa'];
          $foto_siswaname = $_FILES['foto_siswa']['name'];
          $foto_siswatype = $_FILES['foto_siswa']['type'];
          $foto_siswatmp = $_FILES['foto_siswa']['tmp_name'];
          $foto_siswasize = $_FILES['foto_siswa']['size'];
          $foto_siswaerror = $_FILES['foto_siswa']['error'];

          // $foto_siswaext = explode('.', $foto_siswaname);
          // $foto_siswaactualext = strtolower(end($foto_siswaext));
          // $foto_siswanamenew="foto_siswa_".$id_siswa.".".$foto_siswaactualext;
          $foto_siswadestination = 'file/'.$foto_siswaname;

		move_uploaded_file($foto_siswatmp, $foto_siswadestination);
              if (file_exists($foto_siswadestination)) {
              	// echo"<meta http-equiv='refresh' content='0; url=index.php'>";   
              }
	}