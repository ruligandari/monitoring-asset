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
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mastersurat as $data) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= ($data['nomor_surat'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td>
                                    <div class="d-flex justify-content-center align-center">
                                        <button class="btn btn-link btn-sm" onclick="deleteData(<?= $data['id'] ?>)"><i class="bi bi-trash"></i></button>
                                        <a class="btn btn-link btn-sm" href="<?= base_url('master-surat/update/' . $data['id']) ?>"><i class="bi bi-pencil"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endforeach
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-primary w-100 mt-2" href="<?= base_url('/master-surat/tambah') ?>">Tambah Data </a>
            </div>
        </div>
    </div>
    <div class="pb-3"></div>
</div>

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
                    url: '<?= base_url('master-surat/delete') ?>',
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