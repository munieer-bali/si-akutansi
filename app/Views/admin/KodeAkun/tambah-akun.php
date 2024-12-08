<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Akuntansi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="card">
            <div class="card-body">
                <!-- Tampilkan pesan error jika ada -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('admin/KodeAkun/akun') ?>">
                    <?= csrf_field() ?>
                    <!-- <div class="form-group">
                        <label for="kode">Kode Akuntansi</label>
                        <input type="text" class="form-control" name="kode" placeholder="Enter Kode" value="">
                    </div> -->
                    <div class="form-group">
                        <label for="nama">Nama Akuntansi</label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter Nama" value="<?= old('nama') ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
