<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jurnal Umum</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Jurnal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <a href="<?= base_url('admin/jurnal/addjurnal') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Jurnal
                    </a>
                </div>

                <!-- Flash Messages -->
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Filter Form -->
                    <form method="get" action="<?= base_url('admin/jurnal/jurnal') ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" value="<?= isset($tanggal_awal) ? $tanggal_awal : '' ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?= isset($tanggal_akhir) ? $tanggal_akhir : '' ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>

                    <!-- Jurnal Table -->
                    <table id="myTable" class="table table-bordered table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Akun</th>
                                <th>Transaksi</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($jurnal as $nilai) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nilai->nama ?></td>
                                    <td><?= ucfirst($nilai->tipe_transaksi) ?></td>
                                    <td><?= format_rupiah($nilai->jumlah) ?></td>
                                    <td><?= date('d-m-Y', strtotime($nilai->tanggal)) ?></td>
                                    <td>
                                        <?php if ($nilai->bukti_pembayaran) : ?>
                                            <a href="<?= base_url('uploads/bukti/' . $nilai->bukti_pembayaran) ?>" target="_blank">Lihat Bukti</a>
                                        <?php else : ?>
                                            Tidak Ada
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center" style="width: 20%;">
                                        <a href="<?= base_url('admin/jurnal/edit/' . $nilai->id_transaksi) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?= base_url('admin/jurnal/detail/' . $nilai->id_transaksi) ?>" class="btn btn-info btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url('admin/jurnal/delete/' . $nilai->id_transaksi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_transaksi <?= $nilai->id_transaksi ?>?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Total Saldo -->
                    <h4 class="mt-3">Total Saldo: <?= format_rupiah($total_saldo) ?></h4>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
