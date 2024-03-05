<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ubah Profil Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Ubah Profil Pengguna</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">

        <form action="aksi/karyawan.php" method="POST">
            <input type="hidden" name="aksi" value="ubah-profil">

            <label for="id_karyawan">ID</label>
            <input type="text" name="id_karyawan" class="form-control" readonly value="<?= $_SESSION['id_karyawan']; ?>">

            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $_SESSION['nama']; ?>">

            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="3" class="form-control"><?= $_SESSION['alamat']; ?></textarea>

            <label for="no_hp">Nomor Handphone</label>
            <input type="text" name="no_hp" class="form-control" value="<?= $_SESSION['no_hp']; ?>">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?= $_SESSION['email']; ?>">

            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="<?= $_SESSION['username']; ?>">

            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" value="<?= $_SESSION['password']; ?>">

            <label for="hak_akses">Hak Akses</label>
            <select name="hak_akses" class="form-control">
                <?php
                    if($_SESSION['hak_akses']==1){
                        echo "<option value='1'>Administrator</option>";
                    }
                    if($_SESSION['hak_akses']==2){
                        echo "<option value='2'>Kasir</option>";
                    }
                    if($_SESSION['hak_akses']==3){
                        echo "<option value='3'>Purchasing</option>";
                    }
                ?>
                <option value="1">Administrator</option>
                <option value="2">Kasir</option>
                <option value="3">Purchasing</option>
            </select>

            <button class="btn btn-info btn-block mt-3 mb-3" type="submit">Update</button>
        </form>


        <!-- Main row -->

    </div><!-- /.container-fluid -->
</section>