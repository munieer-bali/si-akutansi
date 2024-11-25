<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Transaksi Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi Detail Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Tambah Transaksi Detail -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/transaksidetail/index') ?>">
                <?= csrf_field() ?>

                <!-- Pilihan Akun -->
                <div class="form-group">
                    <label for="item_id">Akun</label>
                    <select class="form-control" id="item_id" name="item_id" required>
                        <option value="" disabled selected>Pilih Akun</option>
                        <?php foreach ($data as $key) : ?>
                            <option value="<?= $key['item_id'] ?>">
                                <?= $key['item_name'] ?> - <?= $key['item_description'] ?> - <?= $key['customer_id'] ?> - <?= format_rupiah($key['item_price']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tanggal Transaksi -->
                <div class="form-group">
                    <label for="transaksi_date">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="transaksi_date" name="transaksi_date" required>
                </div>

                <!-- Kode Pelanggan -->
                <div class="form-group">
                    <label for="kode_pelanggan">Kode Pelanggan</label>
                    <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" placeholder="Masukkan Kode Pelanggan" required>
                </div>

                <!-- Jumlah (Quantity) -->
                <div class="form-group">
                    <label for="quantity">Kuantitas</label>
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Kuantitas" required>
                </div>

                <!-- Harga Per Item -->
                <div class="form-group">
                    <label for="price_per_item">Harga Per-item</label>
                    <input type="text" class="form-control" id="price_per_item" name="price_per_item" placeholder="Masukkan Harga Per Item" required>
                </div>

                <!-- Tombol Submit dan Reset -->
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

<?= $this->endSection() ?>
