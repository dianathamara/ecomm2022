<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pelanggan</span>
                <span class="info-box-number"><?= $jumlah['pelanggan']; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fas fa-user-tie"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total User</span>
                <span class="info-box-number"><?= $jumlah['user']; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-money-bill-wave-alt text-white"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan</span>
                <span class="info-box-number">Rp. <?= number_format($tot_transaksi, 2, ',', '.');  ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-tshirt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Paket Cuci</span>
                <span class="info-box-number"><?= $jumlah['jenis_paket']; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <div class="text-left">
                        <h3 class="card-title">Data Transaksi </h3>
                        <span class="text-muted small d-block">
                            <?= date('Y') ?>
                        </span>
                    </div>
                    <?php if (role(1, false)) :  ?>
                        <a class="btn btn-default btn-sm align-self-center" href="<?= base_url('laporan'); ?>"><i class="fas fa-print"></i> Cetak Laporan</a>
                    <?php endif;  ?>
                </div>
            </div>
            <div class="card-body">
                <div class="position-relative mb-4">
                    <canvas id="laundry-chart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>