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
                                <img src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                            </div>
                            <p class="mb-0">Master Aset</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="feature-card mx-auto text-center">
                            <div class="card mx-auto bg-gray">
                                <img src="<?= base_url('mobile') ?>/img/demo-img/bootstrap.png" alt="">
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
<?= $this->endsection(); ?>