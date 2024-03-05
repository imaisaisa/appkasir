<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">       
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h5>Laporan Penjualan</h5></div>
                    <div class="card-body">
                        <form action="pdf/examples/laporan_penjualan.php" method="get">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control">
                            <button class="btn btn-success btn-block mt-3" type="submit"><i class="fas fa-print"></i> Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                Laporan Pembelian
            </div>
            <div class="col-md-4">
                Laporan Koleksi Barang
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>