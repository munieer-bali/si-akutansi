<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Neraca</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Edit Neraca</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Edit Neraca -->
  <div class="card">
    <div class="card-body">
      <form method="post" action="<?= base_url('admin/Neraca/update') ?>">
        <?= csrf_field() ?>
        
        <!-- ID Neraca (Hidden) -->
        <input type="hidden" class="form-control" name="id_neraca" value="<?= $edit->id_neraca ?>">

        <!-- Akun Dropdown -->
        <div class="form-group">
          <label for="akun">Akun</label>
          <select class="form-control" name="id_akun" id="akun">
            <?php foreach ($data as $key) : ?>
              <option value="<?= $key->id_akun ?>" <?= ($key->id_akun == $edit->id_akun) ? 'selected' : '' ?>><?= $key->nama ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <!-- Tanggal Input -->
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $edit->tanggal ?>">
        </div>

        <!-- Total Aset Input -->
        <div class="form-group">
          <label for="total_aset">Total Aset</label>
          <input type="text" class="form-control" name="total_aset" id="total_aset" value="<?= $edit->total_aset ?>">
        </div>

        <!-- Total Kewajiban Input -->
        <div class="form-group">
          <label for="total_kewajiban">Total Kewajiban</label>
          <input type="text" class="form-control" name="total_kewajiban" id="total_kewajiban" value="<?= $edit->total_kewajiban ?>">
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

      <!-- Pesan Kesalahan Validasi -->
      <?php if (isset($validation)) : ?>
        <div class="alert alert-danger">
          <?= $validation->listErrors() ?>
        </div>
      <?php endif; ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>
