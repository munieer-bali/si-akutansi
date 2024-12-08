<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/jurnal/jurnal') ?>">Jurnal</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Detail -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Informasi Detail Transaksi</h5>
                </div>
                <div class="card-body">
                    <!-- Tabel Detail -->
                    <table class="table table-bordered">
                        <tr>
                            <th>Kode Akun</th>
                            <td><?= esc($transaksi['id_akun']) ?> - <?= esc($transaksi['nama_akun']) ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Transaksi</th>
                            <td><?= esc($transaksi['tipe_transaksi']) ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><?= format_rupiah($transaksi['jumlah']) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= esc($transaksi['tanggal']) ?></td>
                        </tr>
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <td>
                                <?php if (!empty($transaksi['bukti_pembayaran'])) : ?>
                                    <a href="<?= base_url('uploads/bukti/' . $transaksi['bukti_pembayaran']) ?>" target="_blank" class="btn btn-info">
                                        <i class="fas fa-file-download"></i> Lihat Bukti
                                    </a>
                                <?php else : ?>
                                    <span class="text-danger">Tidak ada bukti pembayaran</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url('admin/jurnal/jurnal') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
