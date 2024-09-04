<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<style>
    .table-centered th, .table-centered td {
        text-align: center; /* Perataan teks di tengah */
        vertical-align: middle; /* Perataan vertikal di tengah */
    }
</style>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
                <a href="<?= site_url('admin/create_pelanggan') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pelanggan
                </a>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-centered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Pel</th>
                                            <th>Username</th>
                                            <th>No kWh</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Id Tarif</th>
                                            <th>Tarif</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pelanggan as $p) : ?>
                                        <tr>
                                            <td><?= $p->id_pelanggan ?></td>
                                            <td><?= $p->username ?></td>
                                            <td><?= $p->nomor_kwh ?></td>
                                            <td><?= $p->nama_pelanggan ?></td>
                                            <td><?= $p->alamat ?></td>
                                            <td><?= $p->id_tarif ?></td>
                                            <td><?= $p->tarifperkwh ?></td> <!-- Display tarifkwh -->
                                            <td>
                                                <a href="<?= site_url('admin/edit_pelanggan/'.$p->id_pelanggan) ?>" class="btn btn-sm btn-warning">Ubah</a>
                                                <a href="<?= site_url('admin/delete_pelanggan/'.$p->id_pelanggan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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

    </div>

    <?php $this->load->view('admin/partials/footer'); ?>
</div>
