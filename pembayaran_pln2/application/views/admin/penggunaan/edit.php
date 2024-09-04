<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Penggunaan</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Penggunaan</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('admin/edit_penggunaan/'.$penggunaan->id_penggunaan) ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_penggunaan">ID Penggunaan</label>
                                    <input type="text" id="id_penggunaan" name="id_penggunaan" class="form-control" value="<?= $penggunaan->id_penggunaan ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_pelanggan">ID Pelanggan</label>
                                    <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($pelanggan as $plg) : ?>
                                            <option value="<?= $plg->id_pelanggan ?>" <?= ($plg->id_pelanggan == $penggunaan->id_pelanggan) ? 'selected' : '' ?>>
                                                <?= $plg->nama_pelanggan ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_pelanggan', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <input type="text" id="bulan" name="bulan" class="form-control" value="<?= $penggunaan->bulan ?>" required>
                                    <?= form_error('bulan', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control" value="<?= $penggunaan->tahun ?>" required>
                                    <?= form_error('tahun', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="meter_awal">Meter Awal</label>
                                    <input type="text" id="meter_awal" name="meter_awal" class="form-control" value="<?= $penggunaan->meter_awal ?>" required>
                                    <?= form_error('meter_awal', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="meter_akhir">Meter Akhir</label>
                                    <input type="text" id="meter_akhir" name="meter_akhir" class="form-control" value="<?= $penggunaan->meter_akhir ?>" required>
                                    <?= form_error('meter_akhir', '<small class="text-danger">', '</small>') ?>
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
