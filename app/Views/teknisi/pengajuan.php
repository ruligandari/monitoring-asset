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
        <div class="card">
            <?php if ($pengajuan > 0) : ?>
                <ul class="ps-0 chat-user-list">
                    <!-- Single Chat User -->
                    <?php foreach ($pengajuan as $data) : ?>
                        <li class="p-3">
                            <a class="d-flex" href="<?= base_url('pengajuan-perangkat/edit/' . $data['id_pengajuan']) ?>">
                                <!-- Thumbnail -->
                                <div class="chat-user-thumbnail me-3 shadow">
                                    <img class="img-circle" src="<?= base_url('mobile') ?>/assets/technical-support.png" alt="">
                                </div>
                                <!-- Info -->
                                <div class="chat-user-info">
                                    <h6 class="text-truncate mb-0"><?= $data['nama'] ?></h6>
                                    <div class="last-chat">
                                        <p class="text-truncate mb-0"><?= $data['tgl_pengajuan'] ?></p>
                                        <p class="text-truncate mb-0">Unit : <?= $data['unit'] ?></p>
                                        <p class="text-truncate mb-0 badge bg-info"><?= $data['status'] ?></p>
                                    </div>
                                </div>
                            </a>

                            <!-- Options -->
                            <?php if (session()->get('role') == '2') : ?>
                                <div class="dropstart chat-options-btn">
                                    <a href="#" onclick="deleteData(<?= $data['id_pengajuan'] ?>)"><i class="bi bi-trash"></i></a>

                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>Belum ada pengajuan perangkat baru</p>
            <?php endif ?>
        </div>
    </div>
    <div class="pb-3"></div>
</div>

<?php if (session()->get('role') == '2') : ?>
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Footer Content -->
            <div class="footer-nav position-relative shadow-sm footer-style-two">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li>

                    </li>

                    <li class="active">
                        <a href="<?= base_url('pengajuan-perangkat/tambah') ?>">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </li>

                    <li>

                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function deleteData(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('pengajuan-perangkat/delete') ?>',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function() {
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil dihapus.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
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