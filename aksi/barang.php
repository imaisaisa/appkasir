<?php
include "../koneksi.php";

if($_POST){
    // Perintah Tambah
    if($_POST['aksi']=='tambah'){
        $nama_barang=$_POST['nama_barang'];
        $stok=$_POST['stok'];
        $harga_pokok=$_POST['harga_pokok'];
        $harga_jual=$_POST['harga_jual'];
        $barcode=$_POST['barcode'];
        
        $sql="insert into barang (id_barang,nama_barang,stok,harga_pokok,harga_jual,barcode) values(DEFAULT,'$nama_barang',$stok,$harga_pokok,$harga_jual,$barcode)";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=barang');
    }
    // Perintah Ubah
    if($_POST['aksi']=='ubah'){
        $id_barang=$_POST['id_barang'];
        $nama_barang=$_POST['nama_barang'];
        $stok=$_POST['stok'];
        $harga_pokok=$_POST['harga_pokok'];
        $harga_jual=$_POST['harga_jual'];
        $barcode=$_POST['barcode'];

        $sql="update barang set nama_barang='$nama_barang',stok=$stok,harga_pokok=$harga_pokok,harga_jual=$harga_jual,barcode=$barcode where id_barang=$id_barang";

        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=barang');
    }

}

if($_GET){
    // Perintah Hapus Data
    if($_GET['aksi']=='hapus'){
        $id=$_GET['id'];
        $sql="delete from barang where id_barang=$id";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=barang');
    }
}
