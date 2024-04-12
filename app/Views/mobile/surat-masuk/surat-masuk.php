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
            <div class="card-body">
                <table class="table w-100" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Id Asset</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($suratmasuk as $data) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nomor_surat'] ?></td>
                                <td><?= $data['tgl_pembuatan'] ?></td>
                                <td><?= $data['id_asset'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center align-center">
                                        <button class="btn btn-link btn-sm"><i class="bi bi-trash"></i></button>
                                        <button class="btn btn-link btn-sm"><i class="bi bi-pencil"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endforeach
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary w-100 mt-2" type="submit">Tambah Data
            </div>
        </div>
    </div>
    <div class="pb-3"></div>
</div>
<?= $this->endsection(); ?>