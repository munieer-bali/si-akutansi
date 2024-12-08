<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Akuntansi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Akuntansi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Kode Akun -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <!-- Form Pencarian -->
                        <form action="<?= base_url('admin/KodeAkun/search') ?>" method="get" class="form-inline">
                            <input type="text" name="kode" class="form-control mr-2" placeholder="Masukkan Kode Akun" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </form>

                        <!-- Tombol Tambah Akun -->
                        <a href="<?= base_url('admin/KodeAkun/tambah-akun') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Data Akuntansi
                        </a>
                    </div>
                </div>

                <!-- Flash messages for success and error -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Table for displaying Kode Akun -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Data Akuntansi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kodeAkun as $key => $nilai) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($nilai['kode']) ?></td>
                                        <td><?= esc($nilai['nama']) ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/KodeAkun/edit-akun/' . $nilai['id_akun']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a href="<?= base_url('admin/KodeAkun/delete-akun/' . $nilai['id_akun']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_akun <?= esc($nilai['id_akun']) ?>?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                            <a href="<?= base_url('admin/KodeAkun/search?kode=' . $nilai['kode']) ?>" class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
