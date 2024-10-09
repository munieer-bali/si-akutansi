<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buku Besar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Buku Besar</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/jurnal/jurnal') ?>" class="btn btn-success">return</a>
            </div>
            <!-- ini untuk menangkap session with success-->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alser-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>

                </div>
            <?php endif; ?>
            <!-- ini untuk menangkap session with gagal-->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alser-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('error'); ?>
                    </div>

                </div>
            <?php endif; ?>

            <div class="card-body">

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Akun</th>
                            <th>Tipe Transaksi</th>
                            <th>jumlah</th>
                            <th>Tanggal</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;

                        foreach ($transaksi as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= isset($row['nama']) ? $row['nama'] : 'N/A' ?></td>
                                <td><?= $row['tipe_transaksi'] ?></td>
                                <td><?= format_rupiah($row['jumlah']) ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= isset($saldo_akun[$row['id_akun']]) ? $saldo_akun[$row['id_akun']] : 'N/A' ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td id="myTable" class="table table-bordered table-striped" colspan="5">Total Saldo Keseluruhan</td>
                            <td><?= format_rupiah($total_saldo)  ?></td>
                            
                        </tr>
                    </tbody>




                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
<!-- /.col -->

</section>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>