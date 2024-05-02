<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/pengajuan-perangkat') ?>">
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
            <form action="" method="GET">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title align-center">
                        <p class="badge bg-info"><?= $data['status'] ?></p>
                    </div>
                    <a class="btn m-1 btn-primary" href="<?= base_url('download/' . $data['nama_surat']) ?>">
                        <i class="bi bi-arrow-down"></i> Download Surat
                    </a>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal Pengajuan</label>
                        <input class="form-control-plaintext" id="exampleInputemail" type="text" name="tanggal" value="<?= date('d-m-Y') ?>" readonly>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Perangkat Disimpan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataSimpan as $ds) : ?>
                                <tr>
                                    <td><?= $ds['deskripsi'] . ' - ' . $ds['sn'] . ' - MERK ' . $ds['merk'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Perangkat Diambil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataAmbil as $da) : ?>
                                <tr>
                                    <td><?= $da['deskripsi'] . ' - ' . $da['sn'] . ' - MERK ' . $da['merk'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Unit</label>
                        <input class="form-control-plaintext" id="exampleInputemail" type="text" value="<?= $data['unit'] ?>" name="unit" placeholder="Masukan Unit">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Estimasi Penyimpanan/Pengambilan</label>
                        <input class="form-control-plaintext" id="exampleInputemail" type="text" value="<?= $data['tgl_awal'] . ' - ' . $data['tgl_akhir'] ?>" name="unit" placeholder="Masukan Unit">
                    </div>
                    <!-- <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                        Simpan Perubahan
                    </button> -->
            </form>
        </div>
    </div>
</div>

</div>

<?= $this->endSection(); ?>