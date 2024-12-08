<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Jurnal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/jurnal/jurnal') ?>">Jurnal</a></li>
                        <li class="breadcrumb-item active">Edit Jurnal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Jurnal</h3>
                </div>

                <div class="card-body">
                    <!-- Form Edit Jurnal -->
                    <form method="post" action="<?= base_url('admin/jurnal/update') ?>" enctype="multipart/form-data">
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

                        <!-- Bukti Pembayaran -->
                        <div class="form-group">
                            <label for="bukti_pembayaran">Bukti Pembayaran (Opsional)</label>
                            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*,application/pdf">
                            <?php if ($edit->bukti_pembayaran) : ?>
                                <small>File saat ini: <a href="<?= base_url('uploads/bukti/' . $edit->bukti_pembayaran) ?>" target="_blank">Lihat</a></small>
                            <?php endif; ?>
                        </div>

                        <!-- Input Jumlah -->
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $edit->jumlah?>" required>
                        </div>

                        <!-- Input Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $edit->tanggal ?>" required>
                        </div>

                        <!-- Submit and Reset buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Flash Message -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Pesan Validasi -->
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger mt-3">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
