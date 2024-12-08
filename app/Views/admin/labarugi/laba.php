<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laba Rugi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laba Rugi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Laba Rugi Table -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/labarugi/addlaba') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Laba
            </a>
        </div>

        <!-- Flash Message for Success -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Flash Message for Error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Table for Laba Rugi -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Akun</th>
                            <th>Keterangan</th>
                            <th>Pendapatan Usaha</th>
                            <th>Beban Operasional</th>
                            <th>Pendapatan Lain</th>
                            <th>Beban Lain</th>
                            <th>Laba Kotor</th>
                            <th>Laba Bersih</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($laba as $nilai) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nilai->nama ?></td>
                                <td><?= $nilai->keterangan ?></td>
                                <td><?= format_rupiah($nilai->pendapatan_usaha) ?></td>
                                <td><?= format_rupiah($nilai->beban_operasional) ?></td>
                                <td><?= format_rupiah($nilai->pendapatan_lain) ?></td>
                                <td><?= format_rupiah($nilai->beban_lain) ?></td>
                                <td><?= format_rupiah($nilai->laba_kotor) ?></td>
                                <td><?= format_rupiah($nilai->laba_bersih) ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="<?= base_url('admin/labarugi/edit/' . $nilai->id_laba) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?= base_url('admin/labarugi/delete/' . $nilai->id_laba) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_transaksi <?= $nilai->id_laba ?>?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
