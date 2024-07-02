<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/teknisi') ?>">
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
                <form action="<?= base_url('teknisi/add') ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Nama</label>
                        <input class="form-control" id="exampleInputText" type="text" name="nama" placeholder="Nama">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Username</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Password</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="multiple-select-field" for="exampleInputText">Role</label>
                        <select name="role" class="form-select" data-placeholder="Pilih Nama Perangkat">
                            <option value="2">Teknisi</option>
                            <option value="3">Project Manager 1</option>
                            <option value="4">Kordinator</option>
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