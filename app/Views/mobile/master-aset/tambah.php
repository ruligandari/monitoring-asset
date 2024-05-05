<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/master-aset') ?>">
                    <i class="bi bi-arrow-left-short"></i>
                </a>
            </div>

            <!-- Page Title -->
            <div class="page-heading">
                <h6 class="mb-0"><?= $title ?></h6>
            </div>
            <div class="setting-wrapper">
            </div>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="pt-3"></div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('master-aset/add') ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Nama Aset</label>
                        <input class="form-control" id="exampleInputText" type="text" name="nama" placeholder="Nama Aset">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Serial Number</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="sn" placeholder="Masukan Total">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Status Perangkat</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="status_perangkat" placeholder="Masukan Status Perangkat">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Merk</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="merk" value="" placeholder="Masukan Merk">
                    </div>

                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                        Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>