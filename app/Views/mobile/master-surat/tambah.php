<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/master-surat') ?>">
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
                <form action="<?= base_url('master-surat/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Nama Surat</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="nama_surat" placeholder="cth: Master Surat">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="customFile3">Upload File Surat</label>
                        <input class="form-control border-0" name="file_surat" id="customFile3" type="file">
                        <span>support file docx.</span>
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