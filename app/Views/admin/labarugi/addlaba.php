<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Laba</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Neraca</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Form -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/labarugi/laba') ?>">
                <?= csrf_field() ?>
                
                <!-- Akun Selection -->
                <div class="form-group">
                    <label for="id_akun">Akun</label>
                    <select class="form-control" name="id_akun">
                        <?php foreach ($laba as $key) : ?>
                            <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Keterangan Input -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                </div>

                <!-- Pendapatan Usaha Input -->
                <div class="form-group">
                    <label for="pendapatan_usaha">Pendapatan Usaha</label>
                    <input type="text" class="form-control" name="pendapatan_usaha" placeholder="Masukkan Pendapatan Usaha">
                </div>

                <!-- Beban Operasional Input -->
                <div class="form-group">
                    <label for="beban_operasional">Beban Operasional</label>
                    <input type="text" class="form-control" name="beban_operasional" placeholder="Masukkan Beban Operasional">
                </div>

                <!-- Pendapatan Lain Input -->
                <div class="form-group">
                    <label for="pendapatan_lain">Pendapatan Lain</label>
                    <input type="text" class="form-control" name="pendapatan_lain" placeholder="Masukkan Pendapatan Lain">
                </div>

                <!-- Beban Lain Input -->
                <div class="form-group">
                    <label for="beban_lain">Beban Lain</label>
                    <input type="text" class="form-control" name="beban_lain" placeholder="Masukkan Beban Lain">
                </div>

                <!-- Form Buttons -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-trash"></i> Reset
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $this->endSection() ?>
