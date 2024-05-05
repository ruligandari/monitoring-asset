<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
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
        <div class="card">
            <?php if ($pengajuan) : ?>
                <ul class="ps-0 chat-user-list">
                    <!-- Single Chat User -->
                    <?php foreach ($pengajuan as $data) : ?>
                        <li class="p-3">
                            <a class="d-flex" href="<?= base_url('surat-keluar/edit/' . $data['id_pengajuan']) ?>">
                                <!-- Thumbnail -->
                                <div class="chat-user-thumbnail me-3 shadow">
                                    <img class="img-circle" src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                                </div>
                                <!-- Info -->
                                <div class="chat-user-info">
                                    <h6 class="text-truncate mb-0">ID #<?= $data['id_simpan'] ?></h6>
                                    <div class="last-chat">
                                        <p class="text-truncate mb-0"><?= $data['tgl_pengajuan'] ?></p>
                                        <p class="text-truncate mb-0"><?= $data['nama_surat'] ?></p>
                                    </div>
                                </div>
                            </a>

                            <!-- Options -->



                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <div class="card-body">
                    <p class="text-center">Belum ada pengajuan perangkat.</p>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="pb-3"></div>
</div>
<?= $this->endsection(); ?>