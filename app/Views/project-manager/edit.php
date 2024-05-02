<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/pengajuan-teknisi') ?>">
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
            <div class="card-header">
                <p class="badge bg-info mb-0"><?= $data['status'] ?></p>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pengajuan-teknisi/approve') ?>" method="POST">
                    <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Nama Teknisi</label>
                        <input class="form-control" id="exampleInputemail" type="text" value="<?= $data['user_nama'] ?>" name="nama_teknisi" placeholder="Masukan Unit" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Perangkat Yang Diajukan</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="tanggal" value="<?= $data['asset_nama'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="tanggal" value="<?= date('d-m-Y') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Unit</label>
                        <input class="form-control" id="exampleInputemail" type="text" value="<?= $data['unit'] ?>" name="unit" placeholder="Masukan Unit" readonly>
                    </div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                        Approve Permintaan
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>