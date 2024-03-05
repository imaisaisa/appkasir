<?php
$id_beli = $_GET['id_beli'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pembelian</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="index.php?hal=beli">Pembelian</a></li>
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
                <h5>Data Pembelian</h5>
            </div>
            <div class="card-body">
                <?php
                    $sql_beli="SELECT beli.*,pemasok.nama FROM beli,pemasok WHERE beli.id_pemasok=pemasok.id_pemasok AND beli.id_beli=$id_beli";
                    $query_beli=mysqli_query($koneksi,$sql_beli);
                    $kolom_beli=mysqli_fetch_array($query_beli);

                ?>
                <div class="row">
                    <div class="col-md-3"># Transaksi</div>
                    <div class="col-md-3">: <?= $kolom_beli['id_beli']; ?></div>
                    <div class="col-md-3">Tanggal</div>
                    <div class="col-md-3">: <?= $kolom_beli['tanggal']; ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">Pemasok</div>
                    <div class="col-md-3">: <?= $kolom_beli['nama']; ?></div>
                    <div class="col-md-3">Jam</div>
                    <div class="col-md-3">: <?= $kolom_beli['waktu']; ?></div>
                </div>

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA BELI</th>
                        <th>JUMLAH</th>
                        <th>SUBTOTAL</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $total = 0;
                        $sql = "SELECT beli_detail.*,barang.nama_barang FROM beli_detail,barang WHERE beli_detail.id_barang=barang.id_barang AND beli_detail.id_beli=$id_beli";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                            $no++;
                            $total = $total + ($kolom['jumlah'] * $kolom['harga_beli']);

                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $kolom['nama_barang']; ?></td>
                                <td><?= number_format($kolom['harga_beli']); ?></td>
                                <td><?= number_format($kolom['jumlah']); ?></td>
                                <td align="right"><?= number_format($kolom['harga_beli'] * $kolom['jumlah']); ?></td>

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