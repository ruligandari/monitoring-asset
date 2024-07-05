<?= $this->extend('mobile/layouts'); ?>

<?= $this->section('content'); ?>

<!-- Styles -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            <div class="card-body">
                <form action="<?= base_url('pengajuan-perangkat/add') ?>" method="POST">
                    <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal Pengajuan</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="tanggal" value="<?= date('d-m-Y') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Unit</label>
                        <input class="form-control" id="exampleInputemail" type="text" name="unit" placeholder="Masukan Unit">
                    </div>
                    <div class="form-group">
                        <label class="form-label" id="multiple-select-field" for="exampleInputText">Perangkat Yang Disimpan</label>
                        <select name="perangkat_disimpan[]" id="perangkat-disimpan" class="form-select" data-placeholder="Pilih Nama Perangkat" multiple>
                            <?php foreach ($barang as $b) : ?>
                                <?php if ($b['status_perangkat'] != 'Tersedia') : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['deskripsi'] . ' - ' . $b['sn'] . ' (' . $b['status_perangkat'] . ') ' ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText">Perangkat Yang Diambil</label>
                        <select name="perangkat_diambil[]" id="perangkat-diambil" class="form-select" data-placeholder="Pilih Nama Perangkat" multiple>
                            <?php foreach ($barang as $b) : ?>
                                <?php if ($b['status_perangkat'] == 'Tersedia') : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['deskripsi'] . ' - ' . $b['sn'] . ' (' . $b['status_perangkat'] . ') ' ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal Awal Penyimpanan/Pengambilan</label>
                        <input class="form-control" id="inputDate" name="tanggal_awal" type="date">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputemail">Tanggal Akhir Penyimpanan/Pengambilan</label>
                        <input class="form-control" id="inputDate" name="tanggal_akhir" type="date">
                    </div>
                    <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                        Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- Scripts -->

<script>
    $(document).ready(function() {
        $('#perangkat-disimpan').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
        $('#perangkat-diambil').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    });
</script>
<?= $this->endSection(); ?>