<?php
session_start();
include "../koneksi.php";

if ($_POST) {
    // Perintah Tambah
    if ($_POST['aksi'] == 'tambah') {
        $id_barang = $_POST['id_barang'];
        $harga_pokok = $_POST['harga_pokok'];
        $harga_jual = $_POST['harga_jual'];
        $jumlah = $_POST['jumlah'];
        $id_karyawan = $_SESSION['id_karyawan'];

        // Cek Apakah Barang Sudah Ada?
        $sql_cek = "select * from jual_keranjang where id_barang=$id_barang";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $ketemu = mysqli_num_rows($query_cek);

        if ($ketemu >= 1) {
            $sql = "update jual_keranjang set harga_pokok=$harga_pokok,harga_jual=$harga_jual,jumlah=$jumlah where id_barang=$id_barang";
        } else {
            $sql = "insert into jual_keranjang(id_jual_keranjang,id_barang,harga_pokok,harga_jual,jumlah,id_karyawan) values(DEFAULT,$id_barang,$harga_pokok,$harga_jual,$jumlah,$id_karyawan)";
        }

        //echo $sql;
        mysqli_query($koneksi, $sql);
        header('location:../index.php?hal=jual-tambah');
    }

    if ($_POST['aksi'] == 'tambah-by-barcode') {
        $jumlah = $_POST['jumlah'];
        $barcode = $_POST['barcode'];        

        $sql_cari = "select * from barang where barcode='$barcode'";
        $query_cari = mysqli_query($koneksi, $sql_cari);
        $ketemu_barcode = mysqli_num_rows($query_cari);

        if ($ketemu_barcode >= 1) {
            $ambil_id = mysqli_fetch_array($query_cari);
            $id_barang = $ambil_id['id_barang'];
            $harga_pokok = $ambil_id['harga_pokok'];
            $harga_jual = $ambil_id['harga_jual'];
            $id_karyawan = $_SESSION['id_karyawan'];

            // Cek Apakah Barang Sudah Ada?
            $sql_cek = "select * from jual_keranjang where id_barang=$id_barang";
            $query_cek = mysqli_query($koneksi, $sql_cek);
            $ketemu = mysqli_num_rows($query_cek);

            if ($ketemu >= 1) {
                $sql = "update jual_keranjang set jumlah=jumlah+$jumlah where id_barang=$id_barang";
            } else {
                $sql = "insert into jual_keranjang(id_jual_keranjang,id_barang,harga_pokok,harga_jual,jumlah,id_karyawan) values(DEFAULT,$id_barang,$harga_pokok,$harga_jual,$jumlah,$id_karyawan)";
            }

            //echo $sql;
            mysqli_query($koneksi, $sql);
        } else {
            echo "Barcode Tidak Ketemu";
        }

        header('location:../index.php?hal=jual-tambah');
    }
}

if ($_GET) {
    // Perintah Hapus Data
    if ($_GET['aksi'] == 'hapus') {
        $id = $_GET['id'];
        $sql = "delete from jual_keranjang where id_jual_keranjang=$id";
        mysqli_query($koneksi, $sql);

        header('location:../index.php?hal=jual-tambah');
    }
}
