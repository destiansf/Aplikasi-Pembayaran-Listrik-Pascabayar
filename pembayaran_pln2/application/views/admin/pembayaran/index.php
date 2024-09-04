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
                <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
                <a href="<?= site_url('admin/create_pembayaran') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pembayaran
                </a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12 mb-4">

                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran yang Sudah Lunas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Tabel untuk menampilkan data pembayaran -->
                                <table class="table table-bordered table-centered">
                                    <thead>
                                        <tr>
                                            <th>Id Bayar</th>
                                            <th>Id Tagihan</th>
                                            <th>Id Pel</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Biaya Admin</th>
                                            <th>Total Bayar</th>
                                            <th>Id User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pembayaran as $bayar): ?>
                                            <tr>
                                                <td><?= $bayar->id_pembayaran ?></td>
                                                <td><?= $bayar->id_tagihan ?></td>
                                                <td><?= $bayar->id_pelanggan ?></td>
                                                <td><?= $bayar->tanggal_pembayaran ?></td>
                                                <td><?= $bayar->biaya_admin ?></td>
                                                <td><?= $bayar->total_bayar ?></td>
                                                <td><?= $bayar->id_user ?></td>
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
