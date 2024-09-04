<?php $this->load->view('customer/partials/header'); ?>
<?php $this->load->view('customer/partials/sidebar'); ?>

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
        <?php $this->load->view('customer/partials/topbar'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Tagihan</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <!-- DataTables -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $username; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Id Peng</th>
                                            <th>Id Pel</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Jumlah Meter</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tagihan as $t): ?>
                                            <tr>
                                                <td><?= $t->id_tagihan ?></td>
                                                <td><?= $t->id_penggunaan ?></td>
                                                <td><?= $t->id_pelanggan ?></td>
                                                <td><?= $t->bulan ?></td>
                                                <td><?= $t->tahun ?></td>
                                                <td><?= $t->jumlah_meter ?></td>
                                                <td><?= $t->status ?></td>
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
    <?php $this->load->view('customer/partials/footer'); ?>
</div>
<!-- End of Content Wrapper -->
