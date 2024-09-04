<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Pelanggan</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pelanggan</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/edit_pelanggan/'.$pelanggan->id_pelanggan) ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_pelanggan">Id Pelanggan</label>
                                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control" value="<?= $pelanggan->id_pelanggan ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?= $pelanggan->username ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" value="********" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama Pelanggan</label>
                                    <input type="text" id="nama_pelanggan" name="nama" class="form-control" value="<?= $pelanggan->nama_pelanggan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $pelanggan->alamat ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_kwh">No kWh</label>
                                    <input type="text" id="nomor_kwh" name="no_kwh" class="form-control" value="<?= $pelanggan->nomor_kwh ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_tarif">Tarif</label>
                                    <div class="form-control" readonly>
                                        <?= $pelanggan->id_tarif ?> - <?= $tarif[array_search($pelanggan->id_tarif, array_column($tarif, 'id_tarif'))]->tarifperkwh ?>
                                    </div>
                                    <input type="hidden" name="id_tarif" value="<?= $pelanggan->id_tarif ?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('admin/partials/footer'); ?>
</div>
