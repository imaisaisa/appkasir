<?php
include "../koneksi.php";

if($_POST){
    if($_POST['aksi']=='tambah'){
        $id_pemasok=$_POST['id_pemasok'];
        $tanggal=$_POST['tanggal'];
        $waktu=$_POST['waktu'];

        // Simpan Ke Tabel Beli
        $sql_beli="INSERT INTO beli(id_beli,id_pemasok,tanggal,waktu) VALUES(DEFAULT,$id_pemasok,'$tanggal','$waktu')";
        // echo $sql_beli;
        mysqli_query($koneksi,$sql_beli);

        // Simpan Ke Beli Detail
        $sql_cari_id_beli="SELECT id_beli FROM beli WHERE tanggal='$tanggal' AND waktu='$waktu' ORDER BY id_beli DESC";
        // echo $sql_cari_id_beli;
        $query_cari_id_beli=mysqli_query($koneksi,$sql_cari_id_beli);
        $data_id_beli=mysqli_fetch_array($query_cari_id_beli);
        $id_beli=$data_id_beli['id_beli'];

        // echo $id_beli;
        $sql_keranjang="SELECT * FROM beli_keranjang";
        $query_keranjang=mysqli_query($koneksi,$sql_keranjang);
        while($data_keranjang=mysqli_fetch_array($query_keranjang)){
            $id_barang=$data_keranjang['id_barang'];
            $harga_beli=$data_keranjang['harga_beli'];
            $jumlah=$data_keranjang['jumlah'];

            $sql_beli_detail="INSERT INTO beli_detail(id_beli_detail,id_beli,id_barang,harga_beli,jumlah) VALUES(DEFAULT,$id_beli,$id_barang,$harga_beli,$jumlah)";
            //echo $sql_beli_detail."<br>";
            mysqli_query($koneksi,$sql_beli_detail);

            // Perintah Update Stok dan Harga Beli
            $sql_update_barang="UPDATE barang SET stok=stok+$jumlah, harga_pokok=$harga_beli WHERE id_barang=$id_barang";
            // echo $sql_update_barang;
            mysqli_query($koneksi,$sql_update_barang);

            
        }

        // Kosongkan Keranjang
        $sql_hapus_keranjang="DELETE FROM beli_keranjang";
        mysqli_query($koneksi,$sql_hapus_keranjang);

        header("location:../index.php?hal=beli");

    }
}

if($_GET){
    if($_GET['aksi']=='hapus'){
        $id_beli=$_GET['id_beli'];
        // Perintah Kurangi Stok Barang
        $sql="SELECT * FROM beli_detail WHERE id_beli=$id_beli";
        $query=mysqli_query($koneksi,$sql);
        while($data=mysqli_fetch_array($query)){
            $id_barang=$data['id_barang'];
            $jumlah=$data['jumlah'];

            $sql_update_stok="UPDATE barang SET stok=stok-$jumlah WHERE id_barang=$id_barang";
            // echo $sql_update_stok."<br>";
            mysqli_query($koneksi,$sql_update_stok);
        }

        // Perintah Hapus Tabel beli
        $sql_hapus_beli="DELETE FROM beli WHERE id_beli=$id_beli";
        mysqli_query($koneksi,$sql_hapus_beli);

        // Perintah Hapus Tabel beli_detail
        $sql_hapus_beli_detail="DELETE FROM beli_detail WHERE id_beli=$id_beli";
        mysqli_query($koneksi,$sql_hapus_beli_detail);

        header("location:../index.php?hal=beli");
    }
}