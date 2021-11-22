<?php
	date_default_timezone_set("Asia/Jakarta"); 
    $tanggalsekarang = date("Y-m-d");
    
	function getrandom(){
		do{
		  $num = rand(0,9999);
		  // echo($num.'<br>');
		  $numlength = strlen((string)$num);
		  // echo($numlength.'<br>');
		  // echo('==========<br>');
		}while ( $numlength != 4);
		return $num;
	}

	function loginvalidasi($id, $pass){
		$mysql = "SELECT * FROM tabel_user, tabel_level WHERE tabel_user.id_level = tabel_level.id_level AND id_user='$id' AND password='$pass'";
		return $mysql;
	}

	function ceknamasiswa($id){
		$mysql = "SELECT * FROM tabel_siswa WHERE id_siswa='$id'";
		return $mysql;
	}

	function ceknamaortu($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_siswa WHERE id_siswa='$id'";
		return $mysql;
	}

	function datasiswa(){
		$mysql = "SELECT * FROM tabel_siswa";
		return $mysql;
	}

	function datasiswa2(){
		$mysql = "SELECT * FROM tabel_siswa WHERE id_siswa not in (SELECT id_siswa FROM tabel_pembagian_kelas)";
		return $mysql;
	}

	function datakelas(){
		$mysql = "SELECT * FROM tabel_kelas";
		return $mysql;
	}

	function datakelas2($id){
		$mysql = "SELECT * FROM tabel_kelas WHERE no='$id' ";
		return $mysql;
	}

	function datasiswadikelas($id){
		$mysql = "SELECT * FROM tabel_pembagian_kelas WHERE kelas='$id'";
		return $mysql;
	}

	function datauser(){
		$mysql = "SELECT * FROM tabel_user, tabel_level WHERE tabel_user.id_level = tabel_level.id_level";
		return $mysql;
	}

	function tambahdatasiswa($datasiswa){
		$mysql = "INSERT INTO tabel_siswa VALUES ( '$datasiswa[id_siswa]',
												   '$datasiswa[nama_siswa]',
												   '$datasiswa[alamat_siswa]',
												   '$datasiswa[tempat_lahir_siswa]',
												   '$datasiswa[tanggal_lahir_siswa]',
												   '$datasiswa[agama_siswa]',
												   '$datasiswa[jenis_kelamin_siswa]',
												   '$datasiswa[asal_sekolah_siswa]',
												   '$datasiswa[tanggal_terdaftar_siswa]',
												   '$datasiswa[email_siswa]',
												   '$datasiswa[hp_siswa]',
												   '$datasiswa[warga_negara_siswa]',
												   '$datasiswa[status_siswa]',
												   '$datasiswa[foto_siswa]',
												   '$datasiswa[nama_ortu_siswa]',
												   '$datasiswa[alamat_ortu_siswa]',
												   '$datasiswa[email_ortu_siswa]',
												   '$datasiswa[hp_ortu_siswa]'
		)";
		return $mysql;
	}

	function tambahdatakelas($datasiswa){
		$mysql = "INSERT INTO tabel_kelas VALUES ( '',
												   '$datasiswa[kelas]',
												   '$datasiswa[cabang]'
		)";
		return $mysql;
	}

	function tambahdatasiswakelas($id, $siswa){
		$mysql = "INSERT INTO tabel_pembagian_kelas (kelas, id_siswa) VALUES ('$id','$siswa')";
		return $mysql;
	}

	function tambahakunsiswa($datasiswa){
		$mysql = "INSERT INTO tabel_user VALUES ( '$datasiswa[id_siswa]',
												   '2',
												   '$datasiswa[id_siswa]'
		)";
		return $mysql;
	}

	function tambahakunortu($datasiswa){
		$xx = 'ortu'.$datasiswa['id_siswa'];
		$mysql = "INSERT INTO tabel_user VALUES ( '$xx',
												   '3',
												   '$xx'
		)";
		return $mysql;
	}

	function tambahakunadmin($id){
		$mysql = "INSERT INTO tabel_user VALUES ( '$id',
												   '1',
												   '$id'
		)";
		return $mysql;
	}

	function editdatasiswa($datasiswa){
		$mysql = "UPDATE tabel_siswa SET nama_siswa = '$datasiswa[nama_siswa]',
										 alamat_siswa = '$datasiswa[alamat_siswa]',
										 tempat_lahir_siswa = '$datasiswa[tempat_lahir_siswa]',
										 tanggal_lahir_siswa = '$datasiswa[tanggal_lahir_siswa]',
										 agama_siswa = '$datasiswa[agama_siswa]',
										 jenis_kelamin = '$datasiswa[jenis_kelamin_siswa]',
										 asal_sekolah_siswa = '$datasiswa[asal_sekolah_siswa]',
										 tanggal_terdaftar_siswa = '$datasiswa[tanggal_terdaftar_siswa]',
										 email_siswa = '$datasiswa[email_siswa]',
										 hp_siswa = '$datasiswa[hp_siswa]',
										 warga_negara_siswa = '$datasiswa[warga_negara_siswa]',
										 status_siswa = '$datasiswa[status_siswa]',
										 foto_siswa = '$datasiswa[foto_siswa]',
										 nama_ortu_siswa = '$datasiswa[nama_ortu_siswa]',
										 alamat_ortu_siswa = '$datasiswa[alamat_ortu_siswa]',
										 email_ortu_siswa = '$datasiswa[email_ortu_siswa]',
										 hp_ortu_siswa = '$datasiswa[hp_ortu_siswa]'
				WHERE id_siswa = '$datasiswa[id_siswa]';
		";
		return $mysql;
	}

	function hapusakunortu($datasiswa){
		$xx = 'ortu'.$datasiswa[id_siswa];
		$mysql = "DELETE from tabel_user WHERE id_user = '$xx'";
		return $mysql;
	}

	function cekakun($id){
		$mysql = "SELECT * FROM tabel_user WHERE id_user='$id'";
		return $mysql;
	}

	function editdataakun($a,$b){
		$mysql = "UPDATE tabel_user SET password = '$a'
				WHERE id_user = '$b';
		";
		return $mysql;
	}
	
	function datarfid($id){
		$mysql = "SELECT * FROM tabel_rfid WHERE id_siswa='$id'";
		return $mysql;
	}

	function datarfid2($rfid){
		$mysql = "SELECT * FROM tabel_rfid, tabel_siswa WHERE id_rfid='$rfid' AND tabel_siswa.id_siswa = tabel_rfid.id_siswa";
		return $mysql;
	}

	function datarfid3(){
		$mysql = "SELECT * FROM tabel_rfid, tabel_siswa WHERE tabel_siswa.id_siswa = tabel_rfid.id_siswa";
		return $mysql;
	}

	function datarfid4($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_rfid WHERE id_siswa='$id'";
		return $mysql;
	}

	function datarfid5($id){
		$mysql = "SELECT * FROM tabel_rfid WHERE id_siswa='$id'";
		return $mysql;
	}

	function tambahdatarfid($id, $rfid,$saldo){
		$mysql = "INSERT INTO tabel_rfid VALUES ('$rfid',
												 '$id',
												 '$saldo'
				  )";
		return $mysql;
	}

	function hapusdatarfid($id){
		$mysql = "DELETE FROM tabel_rfid WHERE id_siswa = '$id'";
		return $mysql;
	}

	function datamatapelajaran(){
		$mysql = "SELECT * FROM tabel_mata_pelajaran";
		return $mysql;
	}

	function datamatapelajaran2($id){
		$mysql = "SELECT * FROM tabel_mata_pelajaran WHERE no = '$id'";
		return $mysql;
	}

	function tambahdatamapel($mata_pelajaran){
		$mysql = "INSERT INTO tabel_mata_pelajaran VALUES ('', '$mata_pelajaran')";
		return $mysql;
	}

	function datajadwal(){
		$mysql = "SELECT * FROM tabel_jadwal";
		return $mysql;
	}

	function datajadwalpelajaran($id){
		$mysql = "SELECT * FROM tabel_jadwal WHERE kelas = '$id'";
		return $mysql;
	}

	function datajadwalpelajaran2($id){
		$mysql = "SELECT * FROM tabel_jadwal WHERE id_jadwal = '$id'";
		return $mysql;
	}

	function datajadwal2(){
		$day = date("l");
		switch (strtolower($day)) {
			case 'sunday':
				$hari = 'minggu';
				break;

			case 'monday':
				$hari = 'senin';
				break;	

			case 'tuesday':
				$hari = 'selasa';
				break;

			case 'wednesday':
				$hari = 'rabu';
				break;

			case 'thursday':
				$hari = 'kamis';
				break;	

			case 'friday':
				$hari = 'jumat';
				break;

			case 'saturday':
				$hari = 'sabtu';
				break;
		}

		$jam = date("H:i:s");
		$mysql = "SELECT * FROM tabel_jadwal WHERE hari = '$hari' AND jam_masuk <= '$jam' AND jam_keluar >='$jam'";
		return $mysql;
	}

	function tambahdatajadwal($hari, $kelas, $mata_pelajaran, $jam_masuk, $jam_keluar, $pin_aktivasi){
		$mysql = "INSERT INTO tabel_jadwal (hari, kelas, mata_pelajaran, jam_masuk, jam_keluar, pin_aktivasi) VALUES ('$hari','$kelas','$mata_pelajaran','$jam_masuk','$jam_keluar','$pin_aktivasi')";
		return $mysql;
	}

	function cekjadwal($id){
		$mysql = "SELECT * FROM tabel_jadwal WHERE id_jadwal='$id'";
		return $mysql;
	}

	function editdatajadwal($datajadwal){
		$mysql = "UPDATE tabel_jadwal SET hari = '$datajadwal[hari]',
										 mata_pelajaran = '$datajadwal[mata_pelajaran]',
										 jam_masuk = '$datajadwal[jam_masuk]',
										 jam_keluar = '$datajadwal[jam_keluar]',
										 pin_aktivasi = '$datajadwal[pin_aktivasi]'
				WHERE id_jadwal = '$datajadwal[id_jadwal]';
		";
		return $mysql;
	}

	function dataabsen(){
		$mysql = "SELECT * FROM tabel_jadwal, tabel_absensi, tabel_siswa WHERE tabel_absensi.id_jadwal = tabel_jadwal.id_jadwal AND tabel_siswa.id_siswa = tabel_absensi.id_siswa";
		return $mysql;
	}

	function cekdataabsen2($kelas){
		$mysql = "SELECT * FROM tabel_absensi, tabel_siswa, tabel_pembagian_kelas WHERE tabel_siswa.id_siswa = tabel_absensi.id_siswa AND tabel_siswa.id_siswa=tabel_pembagian_kelas.id_siswa AND tabel_pembagian_kelas.kelas='$kelas' ORDER BY tabel_absensi.no DESC LIMIT 1";
		return $mysql;
	}

	function dataabsen2($id_siswa, $id_jadwal, $tanggal){
		$mysql = "SELECT * FROM tabel_absensi WHERE id_siswa = '$id_siswa' AND id_jadwal = '$id_jadwal' AND tanggal_absensi='$tanggal'";
		return $mysql;
	}

	function cekdataabsen($id){
		$mysql = "SELECT * FROM tabel_absensi WHERE no = '$id'";
		return $mysql;
	}

	function cekdataabsen3($id, $tanggal, $jam){
		$jam = substr($jam, 0, 5);
		$jam = $jam.'%';
		$mysql = "SELECT * FROM tabel_absensi WHERE id_siswa = '$id' AND tanggal_absensi = '$tanggal' AND masuk like '$jam'";
		return $mysql;
	}

	function cekdatapeminjaman3($id_siswa, $id_buku, $tanggal){
		$jam = substr($jam, 0, 5);
		$jam = $jam.'%';
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE id_siswa = '$id' AND tanggal_peminjaman = '$tanggal' AND id_buku = '$id_buku'";
		return $mysql;
	}

	function inputabsensi($id_siswa, $id_jadwal, $tanggal, $jam){
		$mysql = "INSERT INTO tabel_absensi (id_jadwal, id_siswa, tanggal_absensi, masuk) VALUES (
												 '$id_jadwal',
												 '$id_siswa',
												 '$tanggal',
												 '$jam'
				  )";
		return $mysql;
	}

	function tambahabsen($id_jadwal, $id_siswa, $tanggal_absensi, $masuk){
		$mysql = "INSERT INTO tabel_absensi (id_jadwal, id_siswa, tanggal_absensi, masuk) VALUES (
												 '$id_jadwal',
												 '$id_siswa',
												 '$tanggal_absensi',
												 '$masuk'
				  )";
		return $mysql;
	}

	function editdataabsensi($dataabsensi){
		$mysql = "UPDATE tabel_absensi SET id_jadwal = '$dataabsensi[id_jadwal]',
										 id_siswa = '$dataabsensi[id_siswa]',
										 masuk = '$dataabsensi[masuk]',
										 tanggal_absensi = '$dataabsensi[tanggal_absensi]'
				WHERE no = '$dataabsensi[id]';
		";
		return $mysql;
	}

	function databuku(){
		$mysql = "SELECT * FROM tabel_buku";
		return $mysql;
	}

	function tambahdatabuku($id_buku, $judul_buku, $penulis_buku, $penerbit_buku){
		$mysql = "INSERT INTO tabel_buku VALUES ('$id_buku',
												 '$judul_buku',
												 '$penulis_buku',
												 '$penerbit_buku',
												 '0'
				  )";
		return $mysql;
	}

	function cekdatabuku($id){
		$mysql = "SELECT * FROM tabel_buku WHERE id_buku = '$id'";
		return $mysql;
	}

	function editdatabuku($databuku){
		$mysql = "UPDATE tabel_buku SET judul_buku = '$databuku[judul_buku]',
										 penulis_buku = '$databuku[penulis_buku]',
										 penerbit_buku = '$databuku[penerbit_buku]'
				WHERE id_buku = '$databuku[id_buku]';
		";
		return $mysql;
	}

	function cekrfidbuku($id){
		$mysql = "SELECT * FROM tabel_rfid_buku WHERE id_buku = '$id'";
		return $mysql;
	}

	function cekrfidbuku2($id){
		$mysql = "SELECT * FROM tabel_buku, tabel_rfid_buku WHERE tabel_buku.id_buku=tabel_rfid_buku.id_buku AND tabel_rfid_buku.rfid = '$id'";
		return $mysql;
	}

	function tambahrfidbuku($id, $rfid_buku){
		$mysql = "INSERT INTO tabel_rfid_buku VALUES ('', '$rfid_buku', '$id')";
		return $mysql;
	}

	function cekbulantahunabsen(){
		$mysql = "select month(tanggal_absensi)'bulan', year(tanggal_absensi)'tahun' from tabel_absensi";
		return $mysql;
	}
	
	function cekmatkul($id){
        $mysql = "SELECT * FROM tabel_jadwal WHERE pin_aktivasi='$id'";
        return $mysql;
    }
    
    function datamatkul(){
        $mysql = "SELECT * FROM tabel_jadwal";
        return $mysql;
    }
    
    function datamatkul2($id, $hari, $jam){
        $mysql = "SELECT * FROM tabel_jadwal WHERE hari = '$hari' and jam_masuk <= '$jam' and jam_keluar > '$jam' and pin_aktivasi='$id'";
        return $mysql;
    }

 //    function datapeminjamanbuku(){
	// 	$mysql = "SELECT * FROM tabel_peminjaman_buku";
	// 	return $mysql;
	// }

	function datapeminjamanbuku(){
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE NOT tanggal_pengembalian='0000-00-00' OR NOT tanggal_pengembalian=''";
		return $mysql;
	}

	function datapeminjamanbuku2($id){
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE id_peminjaman='$id'";
		return $mysql;
	}

	function datapeminjamanbuku3(){
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE tanggal_pengembalian='0000-00-00' OR tanggal_pengembalian='' OR tanggal_pengembalian IS NULL";
		return $mysql;
	}

	function datapeminjamanbuku4($id){
		$mysql = "SELECT * FROM tabel_buku, tabel_rfid_buku, tabel_peminjaman_buku WHERE tabel_buku.id_buku = tabel_rfid_buku.id_buku
																				   AND tabel_rfid_buku.rfid = tabel_peminjaman_buku.id_buku
																				   AND tabel_buku.id_buku = '$id'
																				   AND (tabel_peminjaman_buku.tanggal_pengembalian='0000-00-00'
																				   		OR tabel_peminjaman_buku.tanggal_pengembalian=''
																				   		OR tabel_peminjaman_buku.tanggal_pengembalian IS NULL)
																				   ";
		return $mysql;
	}

	function ortudatapeminjamanbuku($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE id_siswa='$id'";
		return $mysql;
	}

	function ambildatauser(){
		$mysql = "SELECT * FROM tabel_user";
		return $mysql;
	}

	function ambildatabuku(){
		$mysql = "SELECT * FROM tabel_buku ORDER BY judul_buku ASC";
		return $mysql;
	}

	function ambildatabuku2(){
		$mysql = "SELECT * FROM tabel_buku, tabel_rfid_buku WHERE tabel_buku.id_buku = tabel_rfid_buku.id_buku";
		return $mysql;
	}

	function ambildatabuku3($id){
		$mysql = "SELECT * FROM tabel_buku, tabel_rfid_buku WHERE tabel_buku.id_buku = tabel_rfid_buku.id_buku AND tabel_rfid_buku.rfid = '$id'";
		return $mysql;
	}

	function databukupinjam(){
		$mysql = "SELECT * FROM tabel_rfid_buku";
		return $mysql;
	}
	
	function tambahpeminjamanbuku($id_siswa, $id_buku, $tanggal_peminjaman){
		$waktu = date("H:i:s");
		$mysql = "INSERT INTO tabel_peminjaman_buku (id_peminjaman,
													 id_siswa,
													 id_buku,
													 tanggal_peminjaman,
													 jam)
											 VALUES ('',
											 		 '$id_siswa',
											 		 '$id_buku',
											 		 '$tanggal_peminjaman',
											 		 '$waktu'

				  )";
		return $mysql;
	}

	function tambahpembelian($rfid, $id_siswa, $tanggal){
		$mysql = "INSERT INTO tabel_pembelian_makanan (no,
													 id_siswa,
													 id_makanan,
													 tanggal_pembelian)
											 VALUES ('',
											 		 '$id_siswa',
											 		 '$rfid',
											 		 '$tanggal'

				  )";
		return $mysql;
	}

	function dataproduk(){
		$mysql = "SELECT * FROM tabel_makanan";
		return $mysql;
	}

	function dataproduk2(){
		$mysql = "SELECT * FROM tabel_makanan WHERE stok_makanan != '0'";
		return $mysql;
	}

	function cekdataproduk($id_produk){
		$mysql = "SELECT * FROM tabel_makanan WHERE id_makanan = '$id_produk'";
		return $mysql;
	}

	function tambahdataproduk($id_produk, $nama_makanan, $harga_makanan, $stok_makanan){
		$mysql = "INSERT INTO tabel_makanan VALUES ('$id_produk',
										 			'$nama_makanan',
										 			'$harga_makanan',
										 			'$stok_makanan'
				  )";
		return $mysql;
	}

	function editmakanan($datamakanan){
		$mysql = "UPDATE tabel_makanan SET id_makanan = '$datamakanan[id_produk]',
										   nama_makanan = '$datamakanan[nama_makanan]',
										   harga_makanan = '$datamakanan[harga_makanan]',
										   stok_makanan = '$datamakanan[stok_makanan]'
				WHERE id_makanan = '$datamakanan[id_produk]';
		";
		return $mysql;
	}

	function editmakanan2($id_makanan, $stok_makanan){
		$mysql = "UPDATE tabel_makanan SET stok_makanan = '$stok_makanan'
				WHERE id_makanan = '$id_makanan';
		";
		return $mysql;
	}

	function databarcode($id){
		$mysql = "SELECT * FROM tabel_makanan WHERE id_makanan='$id'";
		return $mysql;
	}

	function ambildatasiswa(){
		$mysql = "SELECT * FROM tabel_siswa, tabel_rfid, tabel_user WHERE tabel_siswa.id_siswa = tabel_rfid.id_siswa AND tabel_user.id_user = tabel_siswa.id_siswa; ";
		return $mysql;
	}

	function cekdatapinjam($no){
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE id_peminjaman = '$no' ";
		return $mysql;
	}

	function editdatapinjam($databuku){
		$mysql = "UPDATE tabel_peminjaman_buku SET id_siswa = '$databuku[id_siswa]',
													id_buku = '$databuku[id_buku]',
													   	     tanggal_peminjaman = '$databuku[tanggal_peminjaman]',
												 			 tanggal_pengembalian = '$databuku[tanggal_pengembalian]'
				WHERE id_peminjaman = '$databuku[id_trapin]';
		";
		return $mysql;
	}

	function datatopup(){
		$mysql = "SELECT * FROM tabel_topup, tabel_rfid, tabel_siswa WHERE tabel_topup.id_siswa = tabel_siswa.id_siswa and tabel_siswa.id_siswa = tabel_rfid.id_siswa";
		return $mysql;
	}

	function ortudatatopup($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_topup, tabel_rfid, tabel_siswa WHERE tabel_topup.id_siswa = tabel_siswa.id_siswa and tabel_siswa.id_siswa = tabel_rfid.id_siswa AND tabel_rfid.id_siswa = '$id'";
		return $mysql;
	}

	function tambahdatatopup($id_siswa, $tanggal_topup, $nominal){
		$mysql = "INSERT INTO tabel_topup VALUES ('',
												  '$id_siswa',
										 			'$tanggal_topup',
										 			'$nominal'
				  )";
		return $mysql;
	}

	function tambahdatasaldo($id_siswa, $nominal){
		$mysql = "UPDATE tabel_rfid SET saldo_rfid = '$nominal' WHERE id_siswa='$id_siswa'";
		return $mysql;
	}

	function tambahdatatransaksi($id_siswa, $id_makanan, $tanggal_pembelian){
		$mysql = "INSERT INTO tabel_pembelian_makanan VALUES ('',
												 	 '$id_siswa',
										 			'$id_makanan',
										 			'$tanggal_pembelian'
				  );";
		return $mysql;
	}

	function datapembelian(){
		$mysql = "SELECT * FROM tabel_pembelian_makanan";
		return $mysql;
	}

	function ortudatapembelian($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_pembelian_makanan, tabel_makanan WHERE tabel_pembelian_makanan.id_makanan = tabel_makanan.id_makanan AND tabel_pembelian_makanan.id_siswa = '$id'";
		return $mysql;
	}

	function updateidtg($id, $tg){
		$mysql = "UPDATE tabel_siswa SET email_siswa = '$tg'
				WHERE id_siswa = '$id';
		";
		return $mysql;
	}

	function updateidtg2($id, $tg){
		$mysql = "UPDATE tabel_siswa SET email_ortu_siswa = '$tg'
				WHERE id_siswa = '$id';
		";
		return $mysql;
	}

	function nullidtg(){
		$mysql = "UPDATE tabel_siswa SET email_siswa = '', email_ortu_siswa=''";
		return $mysql;
	}

	function ortudataabsen($id){
		$id = substr($id, 4);
		$mysql = "SELECT * FROM tabel_jadwal, tabel_absensi, tabel_siswa WHERE tabel_absensi.id_jadwal = tabel_jadwal.id_jadwal AND tabel_siswa.id_siswa = tabel_absensi.id_siswa AND tabel_siswa.id_siswa='$id' ";
		return $mysql;
	}

	function siswadataabsen($id){
		$mysql = "SELECT * FROM tabel_jadwal, tabel_absensi, tabel_siswa WHERE tabel_absensi.id_jadwal = tabel_jadwal.id_jadwal AND tabel_siswa.id_siswa = tabel_absensi.id_siswa AND tabel_siswa.id_siswa='$id' ";
		return $mysql;
	}

	function siswadatapeminjamanbuku($id){
		$mysql = "SELECT * FROM tabel_peminjaman_buku WHERE id_siswa='$id'";
		return $mysql;
	}

	function siswadatapembelian($id){
		$mysql = "SELECT * FROM tabel_pembelian_makanan, tabel_makanan WHERE tabel_pembelian_makanan.id_makanan = tabel_makanan.id_makanan AND tabel_pembelian_makanan.id_siswa = '$id'";
		return $mysql;
	}

	function siswadatatopup($id){
		$mysql = "SELECT * FROM tabel_topup, tabel_rfid, tabel_siswa WHERE tabel_topup.id_siswa = tabel_siswa.id_siswa and tabel_siswa.id_siswa = tabel_rfid.id_siswa AND tabel_rfid.id_siswa = '$id'";
		return $mysql;
	}
	// function datatransaksi(){
	// 	$mysql = "SELECT * FROM tabel_transaksi, tabel_pembelian, tabel_makanan WHERE tabel_transaksi.id_transaksi = tabel_pembelian.id_transaksi and tabel_pembelian.id_makanan = tabel_makanan.id_makanan";
	// 	return $mysql;
	// }
?>