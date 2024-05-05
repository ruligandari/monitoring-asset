<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url('/barang-keluar') ?>">
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
                <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan'] ?>">
                <input type="hidden" name="role_pm" value="<?= session()->get('role') ?>">
                <div class="form-group">
                    <label class="form-label" for="exampleInputemail">Nama Teknisi</label>
                    <input class="form-control-plaintext" id="exampleInputemail" type="text" name="tanggal" value="<?= $data['nama'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputemail">Tanggal Pengajuan</label>
                    <input class="form-control-plaintext" id="exampleInputemail" type="text" name="tanggal" value="<?= $data['tanggal_barang_keluar'] ?>" readonly>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Detail Perangkat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><?= 'Deskripsi: ' . $data['deskripsi'] . ' - SN: ' . $data['sn'] . ' - MERK: ' . $data['merk'] ?></td>
                        </tr>

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

    </div>

    <?= $this->endSection(); ?>