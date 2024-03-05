<?php
include "../koneksi.php";

if($_POST){
    // Perintah Tambah
    if($_POST['aksi']=='tambah'){
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email'];        

        $sql="insert into pelanggan (id_pelanggan,nama,alamat,no_hp,email) values(DEFAULT,'$nama','$alamat','$no_hp','$email')";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pelanggan');
    }
    // Perintah Ubah
    if($_POST['aksi']=='ubah'){
        $id_pelanggan=$_POST['id_pelanggan'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email']; 

        $sql="update pelanggan set nama='$nama',alamat='$alamat',no_hp='$no_hp',email='$email' where id_pelanggan=$id_pelanggan";

        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pelanggan');
    }

}

if($_GET){
    // Perintah Hapus Data
    if($_GET['aksi']=='hapus'){
        $id=$_GET['id'];
        $sql="delete from pelanggan where id_pelanggan=$id";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pelanggan');
    }
}
