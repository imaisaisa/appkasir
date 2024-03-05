<?php
include "../koneksi.php";

if($_POST){
    // Perintah Tambah
    if($_POST['aksi']=='tambah'){
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email'];        
        $username=$_POST['username'];        
        $password=$_POST['password'];        
        $hak_akses=$_POST['hak_akses'];        

        $sql="insert into karyawan (id_karyawan,nama,alamat,no_hp,email,username,password,hak_akses) values(DEFAULT,'$nama','$alamat','$no_hp','$email','$username','$password',$hak_akses)";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=karyawan');
    }
    // Perintah Ubah
    if($_POST['aksi']=='ubah'){
        $id_karyawan=$_POST['id_karyawan'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $no_hp=$_POST['no_hp'];
        $email=$_POST['email']; 
        $username=$_POST['username'];        
        $password=$_POST['password'];        
        $hak_akses=$_POST['hak_akses'];

        $sql="update karyawan set nama='$nama',alamat='$alamat',no_hp='$no_hp',email='$email',username='$username',password='$password',hak_akses=$hak_akses where id_karyawan=$id_karyawan";

        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=karyawan');
    }
    // Perintah Ubah Profil
    if ($_POST['aksi'] == 'ubah-profil') {
        $id_karyawan = isset($_POST['id_karyawan']) ? $_POST['id_karyawan'] : "";
        $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : "";
        $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $hak_akses = isset($_POST['hak_akses']) ? $_POST['hak_akses'] : "";
    
        // Sanitize inputs
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $alamat = mysqli_real_escape_string($koneksi, $alamat);
        $no_hp = mysqli_real_escape_string($koneksi, $no_hp);
        $email = mysqli_real_escape_string($koneksi, $email);
        $username = mysqli_real_escape_string($koneksi, $username);
        $password = mysqli_real_escape_string($koneksi, $password);
        $hak_akses = mysqli_real_escape_string($koneksi, $hak_akses);
    
        $sql = "UPDATE karyawan SET nama='$nama', alamat='$alamat', no_hp='$no_hp', email='$email', username='$username', password='$password', hak_akses='$hak_akses' WHERE id_karyawan=$id_karyawan";
    
        mysqli_query($koneksi, $sql);
    
        // Update session variables
        session_start();
        $_SESSION['nama'] = $nama;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['no_hp'] = $no_hp;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['hak_akses'] = $hak_akses;
    
        header('location:../index.php?hal=karyawan');
    }
    
    
    if($_POST['aksi']=='login'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql_cek_login="SELECT * FROM karyawan WHERE username='$username' AND password='$password'";

        // echo $sql_cek_login;
        $query_cek_login=mysqli_query($koneksi,$sql_cek_login);
        $ketemu=mysqli_num_rows($query_cek_login);

        if($ketemu>=1){
            // echo "Login Sukses";
            session_start();
            $data_user=mysqli_fetch_array($query_cek_login);
            $_SESSION['id_karyawan']=$data_user['id_karyawan'];
            $_SESSION['username']=$data_user['username'];
            $_SESSION['password']=$data_user['password'];
            $_SESSION['nama']=$data_user['nama'];
            $_SESSION['alamat']=$data_user['alamat'];
            $_SESSION['no_hp']=$data_user['no_hp'];
            $_SESSION['email']=$data_user['email'];
            $_SESSION['hak_akses']=$data_user['hak_akses'];

            //echo $_SESSION['hak_akses'];
            //echo $_SESSION['nama'];
            header('location:../index.php');

        } else {
            // echo "Login Gagal";
            header('location:../login.php?status=eror-login');
        }

    }

}

if($_GET){
    // Perintah Hapus Data
    if($_GET['aksi']=='hapus'){
        $id=$_GET['id'];
        $sql="delete from karyawan where id_karyawan=$id";
        mysqli_query($koneksi,$sql);

        header('location:../index.php?hal=karyawan');
    }

    // Perintah Log Out
    if($_GET['aksi']=='logout'){
        session_start();
        session_destroy();
        header('location:../login.php');
    }
}
