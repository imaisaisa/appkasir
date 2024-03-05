<?php
session_start();
include "../koneksi.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $id_pelanggan=$_POST['id_pelanggan'];
        $tanggal=$_POST['tanggal'];
        $waktu=$_POST['waktu'];

        // Simpan Ke Tabel Jual
        $sql_jual="INSERT INTO jual(id_jual,id_pelanggan,tanggal,waktu) VALUES(DEFAULT,$id_pelanggan,'$tanggal','$waktu')";
        //echo $sql_jual;
        mysqli_query($koneksi,$sql_jual);

        // Simpan Ke Jual Detail
        $sql_cari_id_jual="SELECT id_jual FROM jual WHERE tanggal='$tanggal' AND waktu='$waktu' ORDER BY id_jual DESC";
        // echo $sql_cari_id_jual;
        $query_cari_id_jual=mysqli_query($koneksi,$sql_cari_id_jual);
        $data_id_jual=mysqli_fetch_array($query_cari_id_jual);
        $id_jual=$data_id_jual['id_jual'];

        // echo $id_jual;
        $sql_keranjang="SELECT * FROM jual_keranjang";
        $query_keranjang=mysqli_query($koneksi,$sql_keranjang);
        while($data_keranjang=mysqli_fetch_array($query_keranjang)){
            $id_barang=$data_keranjang['id_barang'];
            $harga_pokok=$data_keranjang['harga_pokok'];
            $harga_jual=$data_keranjang['harga_jual'];
            $jumlah=$data_keranjang['jumlah'];

            $sql_jual_detail="INSERT INTO jual_detail(id_jual_detail,id_jual,id_barang,harga_pokok,harga_jual,jumlah) VALUES(DEFAULT,$id_jual,$id_barang,$harga_pokok,$harga_jual,$jumlah)";
            //echo $sql_jual_detail."<br>";
            mysqli_query($koneksi,$sql_jual_detail);

            // Perintah Update Stok
            $sql_update_barang="UPDATE barang SET stok=stok-$jumlah WHERE id_barang=$id_barang";
             //echo $sql_update_barang."<br>";
            mysqli_query($koneksi,$sql_update_barang);

            
        }

        // Kosongkan Keranjang
        $sql_hapus_keranjang="DELETE FROM jual_keranjang";
        mysqli_query($koneksi,$sql_hapus_keranjang);

        header("location:../index.php?hal=jual");

    }
}

if($_GET){
    if($_GET['aksi']=='hapus'){
        $id_jual=$_GET['id_jual'];
        // Perintah Kurangi Stok Barang
        $sql="SELECT * FROM jual_detail WHERE id_jual=$id_jual";
        $query=mysqli_query($koneksi,$sql);
        while($data=mysqli_fetch_array($query)){
            $id_barang=$data['id_barang'];
            $jumlah=$data['jumlah'];

            $sql_update_stok="UPDATE barang SET stok=stok+$jumlah WHERE id_barang=$id_barang";
            // echo $sql_update_stok."<br>";
            mysqli_query($koneksi,$sql_update_stok);
        }

        // Perintah Hapus Tabel jual
        $sql_hapus_jual="DELETE FROM jual WHERE id_jual=$id_jual";
        mysqli_query($koneksi,$sql_hapus_jual);

        // Perintah Hapus Tabel jual_detail
        $sql_hapus_jual_detail="DELETE FROM jual_detail WHERE id_jual=$id_jual";
        mysqli_query($koneksi,$sql_hapus_jual_detail);

        header("location:../index.php?hal=jual");
    }
}