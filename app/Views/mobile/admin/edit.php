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
                <form action="<?= base_url('teknisi/update') ?>" method="POST">
                    <input type="text" value="<?= $admin['id'] ?>" name="id" hidden>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Nama</label>
                        <input class="form-control" id="exampleInputText" type="text" name="nama" value="<?= $admin['nama'] ?>" placeholder="Nama">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Username</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="username" placeholder="Username" value="<?= $admin['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Password</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="password" placeholder="Password" value="<?= $admin['password'] ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" id="multiple-select-field" for="exampleInputText">Role</label>
                        <select name="role" class="form-select" data-placeholder="role">
                            <option value="2" <?= $admin['role'] == 2 ? 'selected' : '' ?>>Teknisi</option>
                            <option value="3" <?= $admin['role'] == 3 ? 'selected' : '' ?>>Project Manager 1</option>
                            <option value="4" <?= $admin['role'] == 4 ? 'selected' : '' ?>>Kordinator</option>
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