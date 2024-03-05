<?php
$id_jual = $_GET['id_jual'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Penjualan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="index.php?hal=jual">Penjualan</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
                <h5>Data Penjualan</h5>
            </div>
            <div class="card-body">
                <?php
                    $sql_jual="SELECT jual.*,pelanggan.nama FROM jual,pelanggan WHERE jual.id_pelanggan=pelanggan.id_pelanggan AND jual.id_jual=$id_jual";
                    $query_jual=mysqli_query($koneksi,$sql_jual);
                    $kolom_jual=mysqli_fetch_array($query_jual);

                ?>
                <div class="row">
                    <div class="col-md-3"># Transaksi</div>
                    <div class="col-md-3">: <?= $kolom_jual['id_jual']; ?></div>
                    <div class="col-md-3">Tanggal</div>
                    <div class="col-md-3">: <?= $kolom_jual['tanggal']; ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">pelanggan</div>
                    <div class="col-md-3">: <?= $kolom_jual['nama']; ?></div>
                    <div class="col-md-3">Jam</div>
                    <div class="col-md-3">: <?= $kolom_jual['waktu']; ?></div>
                </div>

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA jual</th>
                        <th>JUMLAH</th>
                        <th>SUBTOTAL</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $total = 0;
                        $sql = "SELECT jual_detail.*,barang.nama_barang FROM jual_detail,barang WHERE jual_detail.id_barang=barang.id_barang AND jual_detail.id_jual=$id_jual";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                            $no++;
                            $total = $total + ($kolom['jumlah'] * $kolom['harga_jual']);

                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $kolom['nama_barang']; ?></td>
                                <td><?= number_format($kolom['harga_jual']); ?></td>
                                <td><?= number_format($kolom['jumlah']); ?></td>
                                <td align="right"><?= number_format($kolom['harga_jual'] * $kolom['jumlah']); ?></td>

                            </tr>

                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4"><b>GRANDTOTAL</b></td>
                            <td align="right"><?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div><!-- /.container-fluid -->
</section>