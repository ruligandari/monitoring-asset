<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <!-- Tiny Slider One Wrapper -->

    <div class="container">
        <div class="card card-bg-img bg-img bg-success mb-3">
            <div class="card-body p-3">
                <p class="text-white mb-0">Selamat Datang <b><?= session()->get('nama') ?></b>, <br>Di Aplikasi Sistem Monitoring Aset</p>
            </div>
        </div>
    </div>

    <?php if (session()->get('role') == '1') : ?>
        <div class="container direction-rtl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/master-aset') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Master Aset</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/barang-masuk') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/barangmasuk.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Barang Masuk</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/barang-keluar') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/barangkeluar.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Barang Keluar</p>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/master-surat') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/email.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Master Surat</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/surat-masuk') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/suratmasuk.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Surat Masuk</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="<?= base_url('/surat-keluar') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/suratkeluar.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Surat Keluar</p>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="<?= base_url('/profile') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/admin.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Profile Admin</p>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="<?= base_url('/teknisi') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/teknisi.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Data Teknisi</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="#" onclick="logout()">
                                        <img src="<?= base_url('mobile') ?>/assets/user-logout.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Logout</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif (session()->get('role') == '2') : ?>
        <div class="container direction-rtl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/pengajuan-perangkat') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Permintaan Perangkat</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="<?= base_url('/profile') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/teknisi.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Profil Teknisi</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="#" onclick="logout()">
                                        <img src="<?= base_url('mobile') ?>/assets/user-logout.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Logout</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php elseif (session()->get('role') == '3' || session()->get('role') == '4') : ?>
        <div class="container direction-rtl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <!-- image link -->
                                    <a href="<?= base_url('/pengajuan-teknisi') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Permintaan Teknisi</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="<?= base_url('/teknisi') ?>">
                                        <img src="<?= base_url('mobile') ?>/assets/teknisi.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Profil Project Manager</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="feature-card mx-auto text-center">
                                <div class="card mx-auto bg-gray">
                                    <a href="#" onclick="logout()">
                                        <img src="<?= base_url('mobile') ?>/assets/user-logout.png" alt="">
                                    </a>
                                </div>
                                <p class="mb-0">Logout</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="pb-3"></div>
</div>

<!-- Footer Nav -->
<div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
        <!-- Footer Content -->
        <div class="footer-nav position-relative shadow-sm footer-style-two">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li>
                    <a href="<?= base_url('/') ?>">
                        <i class="bi bi-house"></i>
                    </a>
                </li>

                <li class="active">
                    <a href="#">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('/profile') ?>">
                        <i class="bi bi-person"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda Akan Keluar Dari Aplikasi Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('logout') ?>',
                    type: 'POST',
                    success: function() {
                        location.href = '<?= base_url('login') ?>';
                    },
                    error: function() {
                        Swal.fire(
                            'Gagal!',
                            'Data gagal dihapus.',
                            'error'
                        )
                    }
                })
            }
        })

    }
</script>

<?= $this->endsection(); ?>