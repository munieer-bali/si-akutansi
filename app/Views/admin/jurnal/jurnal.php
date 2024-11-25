<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <!-- Card for Jurnal Umum -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <!-- Tombol untuk menambah jurnal -->
                    <a href="<?= base_url('admin/jurnal/addjurnal') ?>" class="btn btn-primary">
                         <i class="fas fa-plus"></i> Tambah 
                    </a>
                </div>

                <!-- Menangkap pesan sukses -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Menangkap pesan error -->
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Form Filter berdasarkan tanggal -->
                <div class="card-body">
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

                    <!-- Tabel untuk menampilkan jurnal umum -->
                    <table id="myTable" class="table table-bordered table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Akun</th>
                                <th>Transaksi</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Iterasi data jurnal -->
                            <?php $no = 1; ?>
                            <?php foreach ($jurnal as $nilai) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $nilai->nama ?></td>
                                    <td><?= $nilai->tipe_transaksi ?></td>
                                    <td><?= format_rupiah($nilai->jumlah) ?></td>
                                    <td><?= $nilai->tanggal ?></td>

                                    <!-- Aksi Edit dan Delete -->
                                    <td class="text-center" style="width: 15%;">
                                        <a href="<?= base_url('admin/jurnal/edit/' . $nilai->id_transaksi) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a href="<?= base_url('admin/jurnal/delete/' . $nilai->id_transaksi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_transaksi <?= $nilai->id_transaksi ?>?')">
                                            <i class="fas fa-trash"></i> Del
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Bagian untuk menampilkan saldo akun dan total saldo -->
                    <h4 class="mt-3">Total Saldo: <?= format_rupiah($total_saldo) ?></h4>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
