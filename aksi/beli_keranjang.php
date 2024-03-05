<?php
include "../koneksi.php";

if ($_POST) {
    // Perintah Tambah
    if ($_POST['aksi'] == 'tambah') {
        $id_barang = $_POST['id_barang'];
        $harga_beli = $_POST['harga_beli'];
        $jumlah = $_POST['jumlah'];
        $id_karyawan = 4;

        // Cek Apakah Barang Sudah Ada?
        $sql_cek = "select * from beli_keranjang where id_barang=$id_barang";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $ketemu = mysqli_num_rows($query_cek);

        if ($ketemu >= 1) {
            $sql = "update beli_keranjang set harga_beli=$harga_beli,jumlah=$jumlah where id_barang=$id_barang";
        } else {
            $sql = "insert into beli_keranjang(id_beli_keranjang,id_barang,harga_beli,jumlah,id_karyawan) values(DEFAULT,$id_barang,$harga_beli,$jumlah,$id_karyawan)";
        }

        //echo $sql;
        mysqli_query($koneksi, $sql);

        header('location:../index.php?hal=beli-tambah');
    }

    if ($_POST['aksi'] == 'tambah-by-barcode') {
        $jumlah = $_POST['jumlah'];
        $barcode = $_POST['barcode'];
        $harga_beli = $_POST['harga_beli'];

        $sql_cari = "select * from barang where barcode='$barcode'";
        $query_cari = mysqli_query($koneksi, $sql_cari);
        $ketemu_barcode = mysqli_num_rows($query_cari);

        if ($ketemu_barcode >= 1) {
            $ambil_id = mysqli_fetch_array($query_cari);
            $id_barang = $ambil_id['id_barang'];
            $id_karyawan = 4;

            // Cek Apakah Barang Sudah Ada?
            $sql_cek = "select * from beli_keranjang where id_barang=$id_barang";
            $query_cek = mysqli_query($koneksi, $sql_cek);
            $ketemu = mysqli_num_rows($query_cek);

            if ($ketemu >= 1) {
                $sql = "update beli_keranjang set harga_beli=$harga_beli,jumlah=$jumlah where id_barang=$id_barang";
            } else {
                $sql = "insert into beli_keranjang(id_beli_keranjang,id_barang,harga_beli,jumlah,id_karyawan) values(DEFAULT,$id_barang,$harga_beli,$jumlah,$id_karyawan)";
            }

            //echo $sql;
            mysqli_query($koneksi, $sql);
        } else {
            echo "Barcode Tidak Ketemu";
        }

        header('location:../index.php?hal=beli-tambah');
    }
}

if ($_GET) {
    // Perintah Hapus Data
    if ($_GET['aksi'] == 'hapus') {
        $id = $_GET['id'];
        $sql = "delete from beli_keranjang where id_beli_keranjang=$id";
        mysqli_query($koneksi, $sql);

        header('location:../index.php?hal=beli-tambah');
    }
}
