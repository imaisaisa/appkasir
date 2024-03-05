<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Pembelian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="index.php?hal=beli">Pembelian</a></li>
                    <li class="breadcrumb-item active">Input</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Input Transaksi Pembelian</h5>
            </div>
            <div class="card-body">
                <!-- Form Pencarian Barang -->
                <div class="form-row">
                    <div class="form-group col-sm-2">
                        <form action="aksi/beli_keranjang.php" method="POST">
                            <input type="hidden" name="aksi" value="tambah-by-barcode">

                            <input class="form-control" type="number" name="jumlah" placeholder="Jumlah ..." required>
                    </div>
                    <div class="form-group col-sm-4">
                        <input class="form-control" type="text" name="barcode" placeholder="Barcode ..." required>
                    </div>
                    <div class="form-group col-sm-2">
                        <input class="form-control" type="number" name="harga_beli" placeholder="Harga Beli ..." required>
                    </div>
                    <div class="form-group col-sm-2">
                        <button class="btn btn-info btn-block" type="submit">Tambah</button>
                    </div>
                    </form>
                    <div class="form-group col-sm-2">
                        <button class="btn btn-warning btn-block" type="button" data-toggle="modal" data-target="#exampleModal">Cari</button>
                    </div>
                </div>

                <!-- Tabel Keranjang Belanja -->
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>Hps</th>
                        <th>#</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $grandtotal = 0;
                        $sql1 = "select beli_keranjang.*,barang.nama_barang from beli_keranjang,barang where beli_keranjang.id_barang=barang.id_barang";
                        $query1 = mysqli_query($koneksi, $sql1);
                        while ($kolom1 = mysqli_fetch_array($query1)) {
                            $no++;
                            $subtotal = $kolom1['harga_beli'] * $kolom1['jumlah'];
                            $grandtotal = $grandtotal + $subtotal;

                        ?>
                            <tr>
                                <td align="center">
                                    <a href="aksi/beli_keranjang.php?aksi=hapus&id=<?= $kolom1['id_beli_keranjang']; ?>"><i class="fas fa-trash"></i></a>
                                </td>
                                <td><?= $no; ?></td>
                                <td><?= $kolom1['nama_barang']; ?></td>
                                <td align="right"><?= number_format($kolom1['harga_beli']); ?></td>
                                <td align="right"><?= $kolom1['jumlah']; ?></td>
                                <td align="right"><?= number_format($subtotal); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="4">Total Pembelian</td>
                            <td colspan="2" align="right"><?= number_format($grandtotal); ?></td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn btn-success btn-block mt-5" data-toggle="modal" data-target="#simpanModal"><i class="fas fa-save"></i> Simpan Pembelian</button>
            </div>
            <div class="card-footer"></div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Pencarian -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pencarian Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>ID</th>
                        <th>NAMA BARANG</th>
                        <th>STOK</th>
                        <th>HARGA BELI TERAKHIR</th>
                        <th>HARGA BELI</th>
                        <th>JUMLAH</th>
                        <th>PILIH</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "select * from barang order by nama_barang";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {


                        ?>

                            <tr>
                                <td><?= $kolom['id_barang']; ?></td>
                                <td><?= $kolom['nama_barang']; ?></td>
                                <td><?= $kolom['stok']; ?></td>
                                <td><?= number_format($kolom['harga_pokok']); ?></td>
                                <td>
                                    <form action="aksi/beli_keranjang.php" method="POST">
                                        <input type="hidden" name="aksi" value="tambah">
                                        <input type="hidden" name="id_barang" value="<?= $kolom['id_barang']; ?>">
                                        <input type="number" class="form-control" name="harga_beli" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </td>
                                <td>
                                    <button class="btn btn-info" type="submit"><i class="fas fa-check"></i> Pilih</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal Simpan Pembelian -->
<div class="modal fade" id="simpanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pencarian Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/beli.php" method="POST">
                    <input type="hidden" name="aksi" value="tambah">
                    <label for="id_pemasok">Pemasok</label>
                    <select name="id_pemasok" class="form-control" required>
                        <option value="">-- Pilih Pemasok --</option>
                        <?php
                        $sql_pemasok = "select * from pemasok order by nama";
                        $query_pemasok = mysqli_query($koneksi, $sql_pemasok);
                        while ($kolom_pemasok = mysqli_fetch_array($query_pemasok)) {
                            echo "<option value='$kolom_pemasok[id_pemasok]'>$kolom_pemasok[nama]</option>";
                        }

                        ?>
                    </select>

                    <label for="tanggal">Tanggal</label>
                    <input type="date" value="<?= date("Y-m-d"); ?>" name="tanggal" class="form-control" required>

                    <label for="waktu">Jam</label>
                    <input type="time" value="<?= date("h:i"); ?>" name="waktu" class="form-control" required>

                    <button class="btn btn-info btn-block mt-2" type="submit"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>