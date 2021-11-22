<?php
	if ($_GET) {
		switch ($_GET['Open']) {

			// Login ///////////////////////////////////////////////////////////////////////////////

			case 'Login' :
				if(!file_exists("log/login.php")) die ("File Tidak Ditemukan");
				include "log/login.php";
				break;

			case 'Login-Validasi' :
				if(!file_exists("log/login_validasi.php")) die ("File Tidak Ditemukan");
				include "log/login_validasi.php";
				break;

			case 'Logout' :
				if(!file_exists("log/logout.php")) die ("File Tidak Ditemukan");
				include "log/logout.php";
				break;

			case 'Lupa-Password' :
				if(!file_exists("log/lupa_password.php")) die ("File Tidak Ditemukan");
				include "log/lupa_password.php";
				break;

			case 'Daftar-Account' :
				if(!file_exists("log/daftar_account.php")) die ("File Tidak Ditemukan");
				include "log/daftar_account.php";
				break;

			/////////////////////////////////////////////////////////////////////////////////

			case 'Ditolak' :
				if(!file_exists("view/ditolak.php")) die ("File Tidak Ditemukan");
				include "view/ditolak.php";
				break;

			// Profil
			///////////////////////////////////////////////////////////////////////////////

			case 'Profil' :
				if(!file_exists("view/profil.php")) die ("File Tidak Ditemukan");
				include "view/profil.php";
				break;

			// Data kelas ///////////////////////////////////////////////////////////////////////////////

			case 'Data-Kelas' :
				if(!file_exists("view/data_kelas.php")) die ("File Tidak Ditemukan");
				include "view/data_kelas.php";
				break;

			case 'Hapus-Data-Kelas' :
				if(!file_exists("view/hapus_data_kelas.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_kelas.php";
				break;

			case 'Hapus-Data-Siswa-Kelas' :
				if(!file_exists("view/hapus_data_siswa_kelas.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_siswa_kelas.php";
				break;

			case 'Lihat-Data-Kelas' :
				if(!file_exists("view/lihat_data_kelas.php")) die ("File Tidak Ditemukan");
				include "view/lihat_data_kelas.php";
				break;
			
			// Data siswa ///////////////////////////////////////////////////////////////////////////////

			case 'Data-Siswa' :
				if(!file_exists("view/data_siswa.php")) die ("File Tidak Ditemukan");
				include "view/data_siswa.php";
				break;

			case 'Tambah-Data-Siswa' :
				if(!file_exists("view/tambah_data_siswa.php")) die ("File Tidak Ditemukan");
				include "view/tambah_data_siswa.php";
				break;

			case 'Import-Data-Siswa' :
				if(!file_exists("view/import_data_siswa.php")) die ("File Tidak Ditemukan");
				include "view/import_data_siswa.php";
				break;

			case 'Hapus-Data-Siswa' :
				if(!file_exists("view/hapus_data_siswa.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_siswa.php";
				break;

			case 'Edit-Data-Siswa' :
				if(!file_exists("view/edit_data_siswa.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_siswa.php";
				break;

			// Data user ///////////////////////////////////////////////////////////////////////////////

			case 'Data-User' :
				if(!file_exists("view/data_user.php")) die ("File Tidak Ditemukan");
				include "view/data_user.php";
				break;

			case 'Hapus-Data-Admin' :
				if(!file_exists("view/hapus_data_admin.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_admin.php";
				break;

			// Jadwal Pelajaran ///////////////////////////////////////////////////////////////////////////////

			case 'Jadwal-Pelajaran' :
				if(!file_exists("view/jadwal_pelajaran.php")) die ("File Tidak Ditemukan");
				include "view/jadwal_pelajaran.php";
				break;

			case 'Lihat-Jadwal-Pelajaran' :
				if(!file_exists("view/lihat_jadwal_pelajaran.php")) die ("File Tidak Ditemukan");
				include "view/lihat_jadwal_pelajaran.php";
				break;

			case 'Hapus-Data-Jadwal' :
				if(!file_exists("view/hapus_data_jadwal.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_jadwal.php";
				break;

			case 'Edit-Data-Jadwal' :
				if(!file_exists("view/edit_data_jadwal.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_jadwal.php";
				break;

			case 'Mata-Pelajaran' :
				if(!file_exists("view/mata_pelajaran.php")) die ("File Tidak Ditemukan");
				include "view/mata_pelajaran.php";
				break;

			case 'Hapus-Data-Mata-Pelajaran' :
				if(!file_exists("view/hapus_data_mata_pelajaran.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_mata_pelajaran.php";
				break;

			// Data Absensi ///////////////////////////////////////////////////////////////////////////////

			case 'Data-Absensi' :
				if(!file_exists("view/data_absensi.php")) die ("File Tidak Ditemukan");
				include "view/data_absensi.php";
				break;

			case 'Hapus-Data-Absensi' :
				if(!file_exists("view/hapus_data_absensi.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_absensi.php";
				break;

			case 'Edit-Data-Absensi' :
				if(!file_exists("view/edit_data_absensi.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_absensi.php";
				break;

			case 'Absensi-RT' :
				if(!file_exists("view/absensi_rt.php")) die ("File Tidak Ditemukan");
				include "view/absensi_rt.php";
				break;

			case 'Download-Data-Absen' :
				if(!file_exists("file/download_data_absen.php")) die ("File Tidak Ditemukan");
				include "file/download_data_absen.php";
				break;

			// Data Buku ///////////////////////////////////////////////////////////////////////////////

			case 'Data-Buku' :
				if(!file_exists("view/data_buku.php")) die ("File Tidak Ditemukan");
				include "view/data_buku.php";
				break;

			case 'Hapus-Data-Buku' :
				if(!file_exists("view/hapus_data_buku.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_buku.php";
				break;

			case 'Edit-Data-Buku' :
				if(!file_exists("view/edit_data_buku.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_buku.php";
				break;

			case 'Data-Peminjaman-Buku' :
				if(!file_exists("view/data_peminjaman_buku.php")) die ("File Tidak Ditemukan");
				include "view/data_peminjaman_buku.php";
				break;

			case 'Buku-Masih-Dipinjam' :
				if(!file_exists("view/buku_dipinjam.php")) die ("File Tidak Ditemukan");
				include "view/buku_dipinjam.php";
				break;

			case 'Edit-Data-Peminjaman' :
				if(!file_exists("view/edit_data_peminjaman.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_peminjaman.php";
				break;

			case 'Edit-Buku-Dipinjam' :
				if(!file_exists("view/edit_buku_dipinjam.php")) die ("File Tidak Ditemukan");
				include "view/edit_buku_dipinjam.php";
				break;	

			case 'Hapus-Data-Peminjaman' :
				if(!file_exists("view/hapus_data_peminjaman.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_peminjaman.php";
				break;

			case 'Hapus-Rfid-Buku' :
				if(!file_exists("view/hapus_rfid_buku.php")) die ("File Tidak Ditemukan");
				include "view/hapus_rfid_buku.php";
				break;

			case 'Download-Data-Peminjaman-Buku' :
				if(!file_exists("file/download_data_peminjaman_buku.php")) die ("File Tidak Ditemukan");
				include "file/download_data_peminjaman_buku.php";
				break;

			// Data Buku ///////////////////////////////////////////////////////////////////////////////
			case 'Data-Produk' :
				if(!file_exists("view/data_produk.php")) die ("File Tidak Ditemukan");
				include "view/data_produk.php";
				break;

			case 'Hapus-Data-Produk' :
				if(!file_exists("view/hapus_data_produk.php")) die ("File Tidak Ditemukan");
				include "view/hapus_data_produk.php";
				break;

			case 'Edit-Data-Produk' :
				if(!file_exists("view/edit_data_produk.php")) die ("File Tidak Ditemukan");
				include "view/edit_data_produk.php";
				break;

			case 'Data-Transaksi' :
				if(!file_exists("view/data_transaksi.php")) die ("File Tidak Ditemukan");
				include "view/data_transaksi.php";
				break;

			case 'Data-Saldo' :
				if(!file_exists("view/data_saldo.php")) die ("File Tidak Ditemukan");
				include "view/data_saldo.php";
				break;

			case 'Data-Topup' :
				if(!file_exists("view/data_topup.php")) die ("File Tidak Ditemukan");
				include "view/data_topup.php";
				break;

			case 'Coba' :
				if(!file_exists("view/coba.php")) die ("File Tidak Ditemukan");
				include "view/coba.php";
				break;

			case 'Ortu-Data-Absen' :
				if(!file_exists("view/ortu/data_absensi.php")) die ("File Tidak Ditemukan");
				include "view/ortu/data_absensi.php";
				break;

			case 'Ortu-Data-Peminjaman-Buku' :
				if(!file_exists("view/ortu/data_peminjaman_buku.php")) die ("File Tidak Ditemukan");
				include "view/ortu/data_peminjaman_buku.php";
				break;

			case 'Ortu-Data-Transaksi' :
				if(!file_exists("view/ortu/data_transaksi.php")) die ("File Tidak Ditemukan");
				include "view/ortu/data_transaksi.php";
				break;

			case 'Ortu-Data-Saldo' :
				if(!file_exists("view/ortu/data_saldo.php")) die ("File Tidak Ditemukan");
				include "view/ortu/data_saldo.php";
				break;

			case 'Siswa-Data-Absen' :
				if(!file_exists("view/siswa/data_absensi.php")) die ("File Tidak Ditemukan");
				include "view/siswa/data_absensi.php";
				break;

			case 'Siswa-Data-Peminjaman-Buku' :
				if(!file_exists("view/siswa/data_peminjaman_buku.php")) die ("File Tidak Ditemukan");
				include "view/siswa/data_peminjaman_buku.php";
				break;

			case 'Siswa-Data-Transaksi' :
				if(!file_exists("view/siswa/data_transaksi.php")) die ("File Tidak Ditemukan");
				include "view/siswa/data_transaksi.php";
				break;

			case 'Siswa-Data-Saldo' :
				if(!file_exists("view/siswa/data_saldo.php")) die ("File Tidak Ditemukan");
				include "view/siswa/data_saldo.php";
				break;
			
			default:
				if(!file_exists("view/main.php")) die ("File Tidak Ditemukan");
				include "view/main.php";
				break;
		}
	} else {
			if(!file_exists("view/main.php")) die ("File Tidak Ditemukan");
			include "view/main.php";
	}
?>