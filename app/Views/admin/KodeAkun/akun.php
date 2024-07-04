<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kode Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kode Akun</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/KodeAkun/tambah-akun') ?>" class="btn btn-primary">Tambah Akun</a>
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
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;

                        foreach ($kodeAkun as $key => $nilai) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nilai['kode'] ?></td>
                                <td><?= $nilai['nama'] ?></td>
                                <td class="text-center" style="width: 15%;">
                                    <a href="<?= base_url('admin/KodeAkun/edit-akun/' . $nilai['id_akun']) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt btn-small"></i> Edit
                                    </a>
                                    <a href="<?= base_url('admin/KodeAkun/delete-akun/' . $nilai['id_akun']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_akun <?= $nilai['id_akun'] ?>')">
                                        <i class="fas fa-trash btn-small"></i> Del
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <tfoot>
                    <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                    </tr>
                    </tfoot> -->

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