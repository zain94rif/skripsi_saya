<?php
if(isset($_SESSION['SES_LOGIN'])) {
  if ($_SESSION['SES_LEVEL']=="admin") {

	$mata_pelajaran = $_GET['mata_pelajaran'];
	$bulan = explode("-",$_GET['bulan']);
	$semester = explode("-", $_GET['semester']);
	
	// echo $mata_pelajaran; echo "<br>";
	// echo "<br>";
	// foreach ($bulan as $key => $value) {
	// 	echo $value; echo "<br>";
	// }
	// echo "<br>";
	// foreach ($semester as $key => $value) {
	// 	echo $value; echo "<br>";
	// }
	
	header("Content-type: application/vnd.ms-word"); 
    header('Content-Disposition: attachment;filename="Data Absensi Siswa.doc"');
    $judul = '<h4 style="text-align: center;">Data Absensi Siswa</h4>';
    $subjudul = '<h5 style="text-align: center;">
    				Mata Pelajaran : $mata_pelajaran<br>
    				Bulan : '.$bulan[0].'<br>
    				Semester : '.$semester[0].'<br>
    				Semester : '.$semester[1].'<br>
    			 </h5>';
    //header("Content-Disposition: attachment;Filename=contohsaja.doc");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
    ?>
    <!DOCTYPE html>
 	<html>
 	<head>
    	<title></title>
      	<style type="text/css">
        	table, th, td {
            	border: 1px solid black;
            	border-collapse: collapse;
        	}
     	</style>
 	</head>
 	<body>
 		<?php
        	echo $judul.'<br>';
        	echo $subjudul.'<br>';
    	?>
 	</body>
 	</html>


    <?php
    }else{
      echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    }
} else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>