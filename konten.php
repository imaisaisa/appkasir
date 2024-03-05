<?php
// Mengarahkan Konten Sesuai Navigasi

if(empty($_GET['hal'])){
    $judul="App Kasirku V 1.0 | Dashboard";
    $konten="konten/home.php";
}
// Modul Data Pokok
else if($_GET['hal']=='barang'){
    $judul="Data Barang";
    $konten="konten/barang.php";
}
else if($_GET['hal']=='pemasok'){
    $judul="Data Pemasok";
    $konten="konten/pemasok.php";
}
else if($_GET['hal']=='pelanggan'){
    $judul="Data Pelanggan";
    $konten="konten/pelanggan.php";
}
else if($_GET['hal']=='karyawan'){
    $judul="Data Karyawan";
    $konten="konten/karyawan.php";
}
else if($_GET['hal']=='ubah-profil'){
    $judul="Update Profil Pengguna";
    $konten="konten/ubah-profil.php";
}
// Akhir Modul Data Pokok

// Modul Pembelian
else if($_GET['hal']=='beli'){
    $judul="Data Pembelian";
    $konten="konten/beli.php";
}
else if($_GET['hal']=='beli-tambah'){
    $judul="Input Pembelian Baru";
    $konten="konten/beli-tambah.php";
}
else if($_GET['hal']=='beli-detail'){
    $judul="Detail Transaksi Pembelian";
    $konten="konten/beli-detail.php";
}
// Akhir Modul Pembelian

// Modul Penjualan
else if($_GET['hal']=='jual'){
    $judul="Data Penjualan";
    $konten="konten/jual.php";
}
else if($_GET['hal']=='jual-tambah'){
    $judul="Input Penjualan Baru";
    $konten="konten/jual-tambah.php";
}
else if($_GET['hal']=='jual-detail'){
    $judul="Detail Transaksi Penjualan";
    $konten="konten/jual-detail.php";
}
// Akhir Modul Penjualan

// Modul Laporan
else if($_GET['hal']=='laporan'){
    $judul="Menu Laporan";
    $konten="konten/laporan.php";
}

else {
    $judul="Halaman Tidak Ditemukan";
    $konten="konten/home.php"; // Jika Tidak Ditemukan Diarahkan Ke Halaman Utama
}
