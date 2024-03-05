<?php
include "../koneksi.php";

if($_POST){
    // Perintah Tambah
    if($_POST['aksi']=='tambah'){
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email'];        

        $sql="insert into pemasok (id_pemasok,nama,alamat,no_hp,email) values(DEFAULT,'$nama','$alamat','$no_hp','$email')";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pemasok');
    }
    // Perintah Ubah
    if($_POST['aksi']=='ubah'){
        $id_pemasok=$_POST['id_pemasok'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email']; 

        $sql="update pemasok set nama='$nama',alamat='$alamat',no_hp='$no_hp',email='$email' where id_pemasok=$id_pemasok";

        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pemasok');
    }

}

if($_GET){
    // Perintah Hapus Data
    if($_GET['aksi']=='hapus'){
        $id=$_GET['id'];
        $sql="delete from pemasok where id_pemasok=$id";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=pemasok');
    }
}
