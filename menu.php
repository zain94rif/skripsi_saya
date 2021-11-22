<?php
  if($_SESSION['SES_LEVEL']=="admin"){ //mengecek level user, halaman ini hanya dapat diakses oleh admin
?>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Dashboard Admin
    </div>

    <li class="nav-item">
      <a class="nav-link" href="?Open=Data-User">
        <i class="fas fa-fw fa-user"></i>
        <span>Data User</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages0a" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Siswa</span>
      </a>
      <div id="collapsePages0a" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Siswa :</h6>
          <a class="collapse-item" href="?Open=Data-Siswa">Data Siswa</a>
          <a class="collapse-item" href="?Open=Data-Kelas">Data Kelas</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages0" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Data Pelajaran</span>
      </a>
      <div id="collapsePages0" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Pelajaran :</h6>
          <a class="collapse-item" href="?Open=Mata-Pelajaran">Mata Pelajaran</a>
          <a class="collapse-item" href="?Open=Jadwal-Pelajaran">Jadwal Pelajaran</a>
        </div>
      </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Sistem
    </div>

    <li class="nav-item">
      <a class="nav-link" href="?Open=Data-Absensi">
        <i class="fas fa-fw fa-clock"></i>
        <span>Absensi Siswa</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-book"></i>
        <span>Perpustakaan</span>
      </a>
      <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Perpustakaan :</h6>
          <a class="collapse-item" href="?Open=Data-Buku">Data Buku</a>
          <a class="collapse-item" href="?Open=Buku-Masih-Dipinjam">Data Peminjaman</a>
          <a class="collapse-item" href="?Open=Data-Peminjaman-Buku">Data Pengembalian</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-coffee"></i>
        <span>Kantin</span>
      </a>
      <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kantin :</h6>
          <a class="collapse-item" href="?Open=Data-Produk">Data Produk</a>
          <a class="collapse-item" href="?Open=Data-Transaksi">Data Transaksi</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Top Up :</h6>
          <a class="collapse-item" href="?Open=Data-Saldo">Data Saldo</a>
          <a class="collapse-item" href="?Open=Data-Topup">Data Top Up</a>
        </div>
      </div>
    </li>

    <!-- <hr class="sidebar-divider"> -->

    <!-- <div class="sidebar-heading">
      Device
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-edit"></i>
        <span>Input</span>
      </a>
      <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Input :</h6>
          <a class="collapse-item" href="?Open=Absensi-RT">Absensi Siswa</a>
          <a class="collapse-item" href="#">Peminjaman Buku</a>
          <a class="collapse-item" href="#">Pembelian Makanan</a>
        </div>
      </div>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="file/share/">
        <i class="fas fa-fw fa-file"></i>
        <span>SHARE FILE</span></a>
    </li> -->


    <hr class="sidebar-divider d-none d-md-block">

<?php
  } elseif ($_SESSION['SES_LEVEL']=="siswa") { //mengecek level user, halaman umum untuk siswa dan orang tua
?>
    
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Dashboard Siswa
    </div>

    <li class="nav-item">
      <a class="nav-link" href="?Open=Siswa-Data-Absen">
        <i class="fas fa-fw fa-clock"></i>
        <span>Absensi</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Siswa-Data-Peminjaman-Buku">
        <i class="fas fa-fw fa-book"></i>
        <span>Peminjaman Buku</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Siswa-Data-Transaksi">
        <i class="fas fa-fw fa-coffee"></i>
        <span>Pembelian Makanan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Siswa-Data-Saldo">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i>
        <span>Saldo</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

<?php
  } elseif ($_SESSION['SES_LEVEL']=="orang tua") {
?>
    
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Dashboard Orang Tua
    </div>

    <li class="nav-item">
      <a class="nav-link" href="?Open=Ortu-Data-Absen">
        <i class="fas fa-fw fa-clock"></i>
        <span>Absensi</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Ortu-Data-Peminjaman-Buku">
        <i class="fas fa-fw fa-book"></i>
        <span>Peminjaman Buku</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Ortu-Data-Transaksi">
        <i class="fas fa-fw fa-coffee"></i>
        <span>Pembelian Makanan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?Open=Ortu-Data-Saldo">
        <i class="fas fa-fw fa-money-bill-wave-alt"></i>
        <span>Saldo</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

<?php
  } 
?>