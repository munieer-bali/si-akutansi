<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Edit Akun -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/KodeAkun/update-akun') ?>">
                        <?= csrf_field() ?>
                        
                        <!-- Hidden input for ID Akun -->
                        <input type="hidden" class="form-control" name="id_akun" value="<?= $edit->id_akun ?>">

                        <!-- Kode Akun Input
                        <div class="form-group">
                            <label for="kodeAkun">Data Akuntansi</label>
                            <input type="text" class="form-control" id="kodeAkun" name="kode" placeholder="Masukkan Kode Akun" value="" required>
                        </div> -->

                        <!-- Nama Akun Input -->
                        <div class="form-group">
                            <label for="namaAkun">Nama Akuntansi</label>
                            <input type="text" class="form-control" id="namaAkun" name="nama" placeholder="Masukkan Nama Akun" value="<?= $edit->nama ?>" required>
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane"></i> Update
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-trash-alt"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
