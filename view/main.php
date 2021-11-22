<?php
if(isset($_SESSION['SES_LOGIN'])) {
  ?>
<h1 class="h3 mb-2 text-gray-800">Selamat Datang</h1>
<p class="mb-4">
  Selamat datang di sistem informasi terpadu <?php echo $namasekolah;?>. Sistem informasi terpadu ini mencakup sistem absensi siswa, sistem peminjaman buku perpustakaan, dan sistem jual-beli pada kantin di <?php echo $namasekolah;?>.
</p>
<?php } else{
  echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
}
?>