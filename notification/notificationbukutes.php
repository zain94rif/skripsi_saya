<?php
require '../config/koneksi.php';
include '../function/function.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo $id."<br>";
	$myQry3 = mysqli_query($koneksiDb,datarfid2($id)) or die ("Query Salah : ".mysqli_error($koneksiDb));
	while($myData = mysqli_fetch_array($myQry3)){
		$nama_siswa = $myData['nama_siswa'];
		$chatid_siswa = $myData['email_siswa'];
		$chatid_ortu_siswa = $myData['email_ortu_siswa'];
	}
}

$TOKEN  = "958824542:AAFaeSzKHSY94iGuK_qHQuuE-TbgWbUmEUE";//"TOKENBOT";  // ganti token ini dengan token bot mu
// $chatid = "126272887";//"213567634"; // ini id saya di telegram @hasanudinhs silakan diganti dan disesuaikan
$chatid = $chatid_ortu_siswa;
$pesan = "LANG LANG...";

// ----------- code -------------

$method	= "sendMessage";
$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
$post = [
 'chat_id' => $chatid,
 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
 'text' => $pesan
];

$header = [
 "X-Requested-With: XMLHttpRequest",
 "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
];

// hapus 1 baris ini:
// die('Hapus baris ini sebelum bisa berjalan, terimakasih.');


$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_REFERER, $refer);
// curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$datas = curl_exec($ch);
$error = curl_error($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$debug['text'] = $pesan;
$debug['code'] = $status;
$debug['status'] = $error;
$debug['respon'] = json_decode($datas, true);

print_r($debug);

/* 
* by @hasanudinhs
* Telegram @botphp
* Last update: 27 Sept 2017 22:53
*/

?>