<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Karyawan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data Pokok</a></li>
                    <li class="breadcrumb-item active">Karyawan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Tombol Tambah -->
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
            Tambah
        </button>

        <div class="card">
            <div class="card-header">
                <h5>Data Karyawan</h5>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>NO HANDPHONE</th>
                        <th>EMAIL</th>
                        
                        <th>HAK AKSES</th>
                        <th>AKSI</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from karyawan order by nama";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {


                        ?>

                            <tr>
                                <td><?= $kolom['id_karyawan']; ?></td>
                                <td><?= $kolom['nama']; ?></td>
                                <td><?= $kolom['alamat']; ?></td>
                                <td><?= $kolom['no_hp']; ?></td>
                                <td><?= $kolom['email']; ?></td>
                                
                                <td><?= $kolom['hak_akses']; ?></td>
                                <td>
                                    <button class="btn btn-link" data-toggle="modal" data-target="#ubahModal<?= $kolom['id_karyawan']; ?>"><i class="fas fa-edit"></i></button>

                                    <a onclick="return confirm('Apakah Anda Yakin Data Ini Akan Dihapus?')" href="aksi/karyawan.php?aksi=hapus&id=<?= $kolom['id_karyawan']; ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
<!-- Modal Ubah -->
<div class="modal fade" id="ubahModal<?= $kolom['id_karyawan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/karyawan.php" method="POST">
                    <input type="hidden" name="aksi" value="ubah">
                    
                    <label for="id_karyawan">ID</label>
                    <input type="text" name="id_karyawan" class="form-control" value="<?= $kolom['id_karyawan']; ?>" readonly>

                    <label for="nama">Nama</label>
                    <input type="text" value="<?= $kolom['nama']; ?>" name="nama" class="form-control" required>

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control" required> <?= $kolom['alamat']; ?></textarea>

                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" value="<?= $kolom['no_hp']; ?>" class="form-control" required>
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= $kolom['email']; ?>" class="form-control" required>

                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?= $kolom['username']; ?>" class="form-control" required>

                    <label for="password">Password</label>
                    <input type="text" name="password" value="<?= $kolom['password']; ?>" class="form-control" required>

                    <label for="hak_akses">Hak Akses</label>
                    <select name="hak_akses" class="form-control" required>
                        <?php
                            if($kolom['hak_akses']==1){
                                echo "<option value='1'>Adminstrator</option>";    
                            }
                            if($kolom['hak_akses']==2){
                                echo "<option value='2'>Kasir</option>";    
                            }
                            if($kolom['hak_akses']==3){
                                echo "<option value='3'>Purchasing</option>";    
                            }
                        ?>
                        <option value="1">Adminstrator</option>
                        <option value="2">Kasir</option>
                        <option value="3">Pembelian</option>
                    </select>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/karyawan.php" method="POST">
                    <input type="hidden" name="aksi" value="tambah">
                    
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>

                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control" required></textarea>

                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control" required>
                    
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>

                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required>

                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" required>

                    <label for="hak_akses">Hak Akses</label>
                    <select name="hak_akses" class="form-control" required>
                        <option value="">-- Pilih Hak Akses --</option>
                        <option value="1">Adminstrator</option>
                        <option value="2">Kasir</option>
                        <option value="3">Pembelian</option>
                    </select>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>