<?php
// Menghitung Total Koleksi Barang
$sql_koleksi="SELECT COUNT(id_barang) AS total_koleksi_barang FROM barang";
$query_koleksi=mysqli_query($koneksi,$sql_koleksi);
$data_koleksi=mysqli_fetch_array($query_koleksi);
$total_koleksi_barang=$data_koleksi['total_koleksi_barang'];

// Menghitung Total Pelanggan
$sql_pelanggan="SELECT COUNT(id_pelanggan) AS total_koleksi_pelanggan FROM pelanggan";
$query_pelanggan=mysqli_query($koneksi,$sql_pelanggan);
$data_pelanggan=mysqli_fetch_array($query_pelanggan);
$total_koleksi_pelanggan=$data_pelanggan['total_koleksi_pelanggan'];

// Menghitung Total Transaksi Jual
$sql_transaksi="SELECT COUNT(id_jual) AS total_koleksi_transaksi FROM jual";
$query_transaksi=mysqli_query($koneksi,$sql_transaksi);
$data_transaksi=mysqli_fetch_array($query_transaksi);
$total_koleksi_transaksi=$data_transaksi['total_koleksi_transaksi'];

// Menghitung Total Omset
$sql_omset="SELECT SUM(harga_jual*jumlah) AS total_omset FROM jual_detail";
$query_omset=mysqli_query($koneksi,$sql_omset);
$data_omset=mysqli_fetch_array($query_omset);
$total_koleksi_omset=$data_omset['total_omset'];

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_koleksi_barang; ?></h3>

                        <p>Total Koleksi Barang</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?=$total_koleksi_pelanggan;?></h3>

                        <p>Total Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= number_format($total_koleksi_transaksi); ?></h3>

                        <p>Total Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= number_format($total_koleksi_omset);?></h3>

                        <p>Total Omset</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $total_koleksi_barang; ?></h3>

                        <p>Total Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?=$total_koleksi_pelanggan;?></h3>

                        <p>Total Pemasok</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= number_format($total_koleksi_transaksi); ?></h3>

                        <p>Total Transaksi Beli</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= number_format($total_koleksi_omset);?></h3>

                        <p>Total Pembelian</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

    </div><!-- /.container-fluid -->
</section>