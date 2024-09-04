<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pelanggan</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/create_pelanggan') ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_pelanggan">Id Pelanggan</label>
                                    <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama Pelanggan</label>
                                    <input type="text" id="nama_pelanggan" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_kwh">No kWh</label>
                                    <input type="text" id="nomor_kwh" name="no_kwh" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_tarif">Tarif</label>
                                    <select id="id_tarif" name="id_tarif" class="form-control" required>
                                        <option value="">Pilih Tarif</option>
                                        <?php foreach ($tarif as $t) : ?>
                                            <option value="<?= $t->id_tarif ?>" data-tarif="<?= $t->tarifperkwh ?>">
                                                <?= $t->id_tarif ?> - <?= $t->tarifperkwh ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('admin/partials/footer'); ?>
</div>
