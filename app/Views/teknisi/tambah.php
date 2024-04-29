<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/barang-masuk') ?>">
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
                <form action="<?= base_url('pengajuan-perangkat/add') ?>" method="POST">
                    <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Perangkat Yang Diajukan</label>
                        <select name="nama" id="" class="form-select">
                            <option value="">Pilih Nama Perangkat</option>
                            <?php foreach ($barang as $b) : ?>
                                <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="tanggal" value="<?= date('d-m-Y') ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Unit</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="unit" placeholder="Masukan Unit">
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