<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/surat-masuk') ?>">
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
        <form action="<?= base_url('surat-masuk/approve') ?>" method="POST">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title align-center">
                        <p class="badge bg-info"><?= $data['status'] ?></p>
                    </div>
                    <button class="btn m-1 btn-primary " type="submit">
                        Approve
                    </button>

                </div>
                <div class="card-body">
                    <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>">
                    <input type="hidden" name="role_pm" value="<?= session()->get('role') ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Nama Teknisi</label>
                        <input class="form-control-plaintext" id="exampleInputemail" type="text" name="tanggal" value="<?= $namaTeknisi ?>" readonly>
                    </div>
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
                </div>
                <!-- <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                        Simpan Perubahan
                    </button> -->
            </div>
        </form>
    </div>
</div>
</div>

</div>

<?= $this->endSection(); ?>