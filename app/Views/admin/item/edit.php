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

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/item/update') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="item_id" value="<?= $edit->item_id ?>">

                <div class="form-group">
                    <label for="item_name">Nama Item</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" value="<?= $edit->item_name ?>">
                </div>

                <div class="form-group">
                    <label for="item_description">Deskripsi Item</label>
                    <input type="text" class="form-control" name="item_description" id="item_description" value="<?= $edit->item_description ?>">
                </div>

                <div class="form-group">
                    <label for="transaksi_date">Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="transaksi_date" id="transaksi_date" placeholder="Masukkan tanggal">
                </div>

                <div class="form-group">
                    <label for="item_price">Harga Item</label>
                    <input type="text" class="form-control" name="item_price" id="item_price" value="<?= $edit->item_price ?>">
                </div>

                <div class="form-group">
                    <label for="customer_id">Kode Barang</label>
                    <input type="text" class="form-control" name="customer_id" id="customer_id" placeholder="Masukkan kode barang">
                </div>

                <div class="form-group">
                    <label for="item_stock">Stock Barang</label>
                    <input type="text" class="form-control" name="item_stock" id="item_stock" value="<?= $edit->item_stock ?>">
                </div>

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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>
