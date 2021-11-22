<?php
	require '../config/koneksi.php';
	include '../function/function.php';
	$myQry3 = mysqli_query($koneksiDb,nullidtg()) or die ("Query Salah : ".mysqli_error($koneksiDb));
	if ($myQry3) {
		echo"<meta http-equiv='refresh' content='0; url=nullidtg.php'>";
	}

?>