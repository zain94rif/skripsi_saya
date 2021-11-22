<?php
function antiinjection($data){
  $data = str_replace("'","",$data);
  $data = str_replace('"','',$data);
  $data = str_replace("|","",$data);
  return $data;
}

if(isset($_POST['buttonlogin'])){
	$id= antiinjection($_POST['id']);
	$pass= antiinjection($_POST['pass']);
	
	if((trim($id)=="")||(trim($pass)=="")){
	?>
	<script type="text/javascript">
      alert("Semua data harus terisi. Silahkan login ulang.");
    </script>
    <?php
    	//echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
	}
	else{
		$myQry = mysqli_query($koneksiDb,loginvalidasi($id,$pass)) or die ("Query Salah : ".mysql_error());
		$myData = mysqli_fetch_array($myQry);
		if(mysqli_num_rows($myQry) >=1){
			$_SESSION['SES_LOGIN'] = $myData['id_user'];
			$_SESSION['SES_PASSWORD'] = $myData['password'];
			$_SESSION['SES_LEVEL'] = $myData['level'];
			if ($_SESSION['SES_LEVEL']=="siswa") {
				$myQry = mysqli_query($koneksiDb,ceknamasiswa($id)) or die ("Query Salah : ".mysql_error());
				$myData = mysqli_fetch_array($myQry);
				$_SESSION['SES_NAME'] = $myData['nama_siswa'];
				$_SESSION['SES_FOTO'] = $myData['foto_siswa'];
				if (($_SESSION['SES_FOTO'] == null) or ($_SESSION['SES_FOTO'] == "")) {
					$_SESSION['SES_FOTO'] = 'image/user.png';
				}
			}
			if ($_SESSION['SES_LEVEL'] == "orang tua") {
				$myQry = mysqli_query($koneksiDb,ceknamaortu($id)) or die ("Query Salah : ".mysql_error());
				$myData = mysqli_fetch_array($myQry);
				$_SESSION['SES_NAME'] = $myData['nama_ortu_siswa'];
				$_SESSION['SES_FOTO'] = 'image/user.png';
			}
			if($_SESSION['SES_LEVEL']=="admin") {
				$_SESSION['SES_NAME'] = $_SESSION['SES_LOGIN'];
				$_SESSION['SES_FOTO'] = 'image/user.png';
			}
			echo"<meta http-equiv='refresh' content ='0; url=?Open'>";
		}else{
		?>
		<script type="text/javascript">
    	  alert("Username dan password tidak valid. Silahkan login ulang.");
    	</script>
    	<?php
    		echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
		}
	}
}
?>