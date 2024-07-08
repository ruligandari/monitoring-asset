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
                <form action="<?= base_url('master-surat/update') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Set Status Surat</label>
                        <select name="nomor_surat" id="" class="form-select">
                            <?php if ($data['nomor_surat'] == 1) : ?>
                                <option value="1" selected><?= ($data['nomor_surat'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></option>
                                <option value="0">Tidak Aktif</option>
                            <?php else : ?>
                                <option value="0" selected><?= ($data['nomor_surat'] == 0) ? 'Tidak Aktif' : 'Aktif' ?></option>
                                <option value="1">Aktif</option>
                            <?php endif ?>
                        </select>
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