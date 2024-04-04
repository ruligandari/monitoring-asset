<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <!-- Tiny Slider One Wrapper -->

    <div class="container">
        <div class="card card-bg-img bg-img bg-success mb-3">
            <div class="card-body p-3">
                <p class="text-white mb-0">Selamat Datang <b>Akbar</b>, <br>Di Aplikasi Sistem Monitoring Aset</p>
            </div>
        </div>
    </div>

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
                                <img src="<?= base_url('mobile') ?>/assets/email.png" alt="">
                            </div>
                            <p class="mb-0">Master Surat</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <img src="<?= base_url('mobile') ?>/img/demo-img/js.png" alt="">
                            </div>
                            <p class="mb-0">Vanilla JS</p>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <img src="<?= base_url('mobile') ?>/img/demo-img/pwa.png" alt="">
                            </div>
                            <p class="mb-0">PWA Ready</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <img src="<?= base_url('mobile') ?>/img/demo-img/bootstrap.png" alt="">
                            </div>
                            <p class="mb-0">Bootstrap 5</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <img src="<?= base_url('mobile') ?>/img/demo-img/js.png" alt="">
                            </div>
                            <p class="mb-0">Vanilla JS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>
</div>

<!-- Footer Nav -->
<div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
        <!-- Footer Content -->
        <div class="footer-nav position-relative shadow-sm footer-style-two">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li>
                    <a href="<?= base_url('/home') ?>">
                        <i class="bi bi-house"></i>
                    </a>
                </li>

                <li class="active">
                    <a href="elements.html">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </li>

                <li>
                    <a href="settings.html">
                        <i class="bi bi-person"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>