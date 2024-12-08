<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Neraca</h1>
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

  <!-- Form Card -->
  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= base_url('admin/Neraca/neraca') ?>">
        <?= csrf_field() ?>
        <!-- Akun Dropdown -->
        <div class="form-group">
          <label for="akun">Akun</label>
          <select class="form-control" name="id_akun" id="akun">
            <?php foreach ($neraca as $key) : ?>
              <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Tanggal Input -->
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" name="tanggal" id="tanggal">
        </div>

        <!-- Total Aset Input -->
        <div class="form-group">
          <label for="total_aset">Total Aset</label>
          <input type="text" class="form-control" name="total_aset" id="total_aset" placeholder="Input total aset">
        </div>

        <!-- Total Kewajiban Input -->
        <div class="form-group">
          <label for="total_kewajiban">Total Kewajiban</label>
          <input type="text" class="form-control" name="total_kewajiban" id="total_kewajiban" placeholder="Input total kewajiban">
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
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- /.content-wrapper -->
<?= $this->endSection() ?>
