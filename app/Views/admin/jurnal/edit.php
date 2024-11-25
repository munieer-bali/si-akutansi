<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Jurnal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Jurnal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Edit Jurnal -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/jurnal/update') ?>">
                        <?= csrf_field() ?>
                        <!-- Hidden input for ID Transaksi -->
                        <input type="hidden" class="form-control" name="id_transaksi" value="<?= $edit->id_transaksi ?>">

                        <!-- Select Akun -->
                        <div class="form-group">
                            <label for="id_akun">Akun</label>
                            <select class="form-control" name="id_akun" id="id_akun">
                                <?php foreach ($data as $key) : ?>
                                    <option value="<?= $key->id_akun ?>" <?= $key->id_akun == $edit->id_akun ? 'selected' : '' ?>>
                                        <?= $key->nama ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Select Tipe Transaksi -->
                        <div class="form-group">
                            <label for="tipe_transaksi">Tipe Transaksi</label>
                            <select class="form-control" name="tipe_transaksi" id="tipe_transaksi">
                                <option value="debet" <?= $edit->tipe_transaksi == 'debet' ? 'selected' : '' ?>>Debet</option>
                                <option value="credit" <?= $edit->tipe_transaksi == 'credit' ? 'selected' : '' ?>>Kredit</option>
                            </select>
                        </div>

                        <!-- Input Jumlah -->
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $edit->jumlah ?>">
                        </div>

                        <!-- Input Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $edit->tanggal ?>">
                        </div>

                        <!-- Submit and Reset buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Update</button>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i> Reset</button>
                        </div>
                    </form>

                    <!-- Pesan kesalahan validasi -->
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
