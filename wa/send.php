<?php

/* 
 Simple File untuk Ngetes Send Pesan ke Bot
 Memiliki banyak kegunaan dan tujuan
 
 misalnya ngetes pesan dengan format tertentu, line break, char khusus, dll.
 bisa dipergunakan juga untuk test hosting, cronjob, dan segala test lainnya. 
 
 Jika menggunakan mode GET :
 - Line break (ENTER) = %0A
 - Space = %20 
 Atau rawurlencode($string);
 
 Contoh dibawah ini menggunakan mode POST. Baris baru cukup dengan \n.
 
 * -----------------------
 * Grup @botphp
 * Jika ada pertanyaan jangan via PM
 * langsung di grup saja.
 * ----------------------
 
*/

$TOKEN  = "958824542:AAFaeSzKHSY94iGuK_qHQuuE-TbgWbUmEUE";//"TOKENBOT";  // ganti token ini dengan token bot mu
$chatid = "126272887";//"213567634"; // ini id saya di telegram @hasanudinhs silakan diganti dan disesuaikan
$pesan 	= "Helo mas bambang.. \n\neh salah orang, ya maap!";

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