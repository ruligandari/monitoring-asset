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
                        <!-- select option $deskripsi -->
                        <select class="form-select" id="exampleInputText" name="nama">
                            <option value="">Pilih Nama Aset</option>
                            <?php foreach ($deskripsi as $data) : ?>
                                <option value="<?= $data['deskripsi'] ?>"><?= $data['deskripsi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Serial Number</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="sn" placeholder="Masukan Serial Number">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Status Perangkat</label>
                        <!-- select option $status -->
                        <select class="form-select" id="exampleInputemail" name="status_perangkat">
                            <option value="">Pilih Status Perangkat</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Sevice">Service</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Merk</label>
                        <!-- select option $merk -->
                        <select class="form-select" id="exampleInputemail" name="merk">
                            <option value="">Pilih Merk</option>
                            <?php foreach ($merk as $data) : ?>
                                <option value="<?= $data['merk'] ?>"><?= $data['merk'] ?></option>
                            <?php endforeach; ?>
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