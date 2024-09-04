<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<style>
    .table-centered th, .table-centered td {
        text-align: center; /* Perataan teks di tengah */
        vertical-align: middle; /* Perataan vertikal di tengah */
    }
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php $this->load->view('admin/partials/topbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Penggunaan</h1>
                <a href="<?= site_url('admin/create_penggunaan') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Penggunaan</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12 mb-4">

                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Penggunaan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Peng</th>
                                            <th>Id Pel</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($penggunaan as $p): ?>
                                            <tr>
                                                <td><?= $p->id_penggunaan ?></td>
                                                <td><?= $p->id_pelanggan ?></td>
                                                <td><?= $p->bulan ?></td>
                                                <td><?= $p->tahun ?></td>
                                                <td><?= $p->meter_awal ?></td>
                                                <td><?= $p->meter_akhir ?></td>
                                                <td>
                                                    <a href="<?= site_url('admin/edit_penggunaan/'.$p->id_penggunaan) ?>" class="btn btn-warning btn-sm">Ubah</a>
                                                    <a href="<?= site_url('admin/delete_penggunaan/'.$p->id_penggunaan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php $this->load->view('admin/partials/footer'); ?>

</div>
<!-- End of Content Wrapper -->
