<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>

<!-- sweetalert -->

<?php if (session()->getFlashdata('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
            showConfirmButton: false,
            time: 1000
        })
    </script>
<?php elseif (session()->getFlashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= session()->getFlashdata('error') ?>',
            showConfirmButton: false,
        })
    </script>
<?php endif; ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/') ?>">
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
        <!-- User Information-->
        <div class="card user-info-card mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="user-info">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-1"><?= $user['nama'] ?></h5>
                    </div>
                    <p class="mb-0"><?= $keterangan ?></p>
                </div>
            </div>
        </div>

        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <form action="<?= base_url('/profile/update') ?>" method="POST">
                    <input type="text" value="<?= $user['id'] ?>" name="id_user" hidden>
                    <div class="form-group mb-3">
                        <label class="form-label" for="Username">Nama</label>
                        <input class="form-control" id="Username" type="text" value="<?= $user['nama'] ?>" placeholder="Username" name="nama">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="Username">Username</label>
                        <input class="form-control" id="Username" type="text" value="<?= $user['username'] ?>" placeholder="Username" name="username">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="fullname">Role</label>
                        <input class="form-control" id="fullname" type="text" value="<?= $keterangan ?>" placeholder="Full Name" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Password Baru</label>
                        <input class="form-control" id="email" type="password" placeholder="Password Baru" name="password_baru">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="job">Konfirmasi Password Baru</label>
                        <input class="form-control" id="job" type="password" placeholder="Konfirmasi Password Baru" name="password_baru_1">
                    </div>


                    <button class="btn btn-success w-100" type="submit">Update Now</button>
                </form>
            </div>
        </div>
    </div>
    <div class="pb-3"></div>
</div>
<?= $this->endsection(); ?>