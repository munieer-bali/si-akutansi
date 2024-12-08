<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Form -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/databarang/barang') ?>">
                <?= csrf_field() ?>

                <!-- Kode Barang -->
                <div class="form-group">
                    <label for="kodeBarang">Kode Barang</label>
                    <select class="form-control" id="kodeBarang" name="item_id">
                        <?php foreach ($data as $key) : ?>
                            <option value="<?= $key->item_id ?>"><?= $key->item_name ?> - <?= $key->customer_id ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Nama Barang -->
                <div class="form-group">
                    <label for="namaBarang">Nama Barang</label>
                    <select class="form-control" id="namaBarang" name="nama_barang">
                        <?php foreach ($data as $key) : ?>
                            <option value="<?= $key->item_id ?>"><?= $key->item_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Jumlah Barang -->
                <div class="form-group">
                    <label for="jumlahBarang">Jumlah Barang</label>
                    <input type="number" min="1" class="form-control" id="jumlahBarang" name="jumlah_barang" placeholder="Masukkan jumlah barang" required>
                </div>

                <!-- Tanggal Masuk -->
                <div class="form-group">
                    <label for="tanggalMasuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggalMasuk" name="tanggal" required>
                </div>

                <!-- Harga Beli -->
                <div class="form-group">
                    <label for="hargaBeli">Harga Beli</label>
                    <input type="text" class="form-control" id="hargaBeli" name="harga_beli" placeholder="Masukkan harga beli" required>
                </div>

                <!-- Harga Jual -->
                <div class="form-group">
                    <label for="hargaJual">Harga Jual</label>
                    <input type="text" class="form-control" id="hargaJual" name="harga_jual" placeholder="Masukkan harga jual" required>
                </div>

                <!-- Buttons -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane"></i> Save
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
