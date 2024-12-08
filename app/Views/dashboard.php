<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_data_barang ?></h3>
                            <p>Data Barang Gudang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('admin/databarang/barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_data_neraca ?></h3>
                            <p>Neraca</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('admin/Neraca/neraca') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_data_transaksi ?></h3>
                            <p>Jurnal Umum</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <a href="<?= base_url('admin/jurnal/jurnal') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah_data_akun ?></h3>
                            <p>Data Akutansi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="<?= base_url('admin/KodeAkun/akun') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-sm-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlah_data_labarugi ?></h3>
                            <p>Laba Rugi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <a href="<?= base_url('admin/labarugi/laba') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah_data_item ?></h3>
                            <p>Data Item Satuan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('admin/item/item') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlah_data_item_keluar ?></h3>
                            <p>Item Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <a href="<?= base_url('admin/transaksidetail/index') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
