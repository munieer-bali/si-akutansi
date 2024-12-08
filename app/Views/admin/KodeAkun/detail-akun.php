<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1>Detail Akun</h1>
                </div>
                <div class="col-sm-6 text-sm-right">
                    <a href="<?= base_url('admin/KodeAkun/akun') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Informasi Detail Akun</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-right w-25">Kode Akun:</th>
                                    <td><?= esc($akun['kode']) ?></td>
                                </tr>
                                <tr>
                                    <th class="text-right w-25">Nama Akun:</th>
                                    <td><?= esc($akun['nama']) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('admin/KodeAkun/edit-akun/' . $akun['id_akun']) ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Akun
                        </a>
                        <a href="<?= base_url('admin/KodeAkun/akun') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
