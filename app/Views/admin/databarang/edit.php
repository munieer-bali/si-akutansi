<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Form -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/databarang/update') ?>">
                <?= csrf_field() ?>

                <!-- Hidden Input for ID -->
                <input type="hidden" class="form-control" name="id_akun" value="<?= $edit->id_barang ?>">

                <!-- Nama Barang -->
                <div class="form-group">
                    <label for="namaBarang">Nama Barang</label>
                    <input type="text" class="form-control" id="namaBarang" name="nama_barang" value="<?= $edit->nama_barang ?>" required>
                </div>

                <!-- Jumlah Barang -->
                <div class="form-group">
                    <label for="jumlahBarang">Jumlah Barang</label>
                    <input type="number" min="1" class="form-control" id="jumlahBarang" name="jumlah_barang" value="<?= $edit->jumlah_barang ?>" required>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $edit->tanggal ?>" required>
                </div>

                <!-- Harga Beli -->
                <div class="form-group">
                    <label for="hargaBeli">Harga Beli</label>
                    <input type="text" class="form-control" id="hargaBeli" name="harga_beli" value="<?= $edit->harga_beli ?>" required>
                </div>

                <!-- Harga Jual -->
                <div class="form-group">
                    <label for="hargaJual">Harga Jual</label>
                    <input type="text" class="form-control" id="hargaJual" name="harga_jual" value="<?= $edit->harga_jual ?>" required>
                </div>

                <!-- Buttons -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane"></i> Update
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
