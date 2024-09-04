<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Tambah Penggunaan</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="id_penggunaan">Id Penggunaan</label>
                    <input type="text" name="usage_id" class="form-control" id="id_penggunaan" required>
                </div>
                <div class="form-group">
                    <label for="id_pelanggan">Id Pelanggan</label>
                    <select name="id_pelanggan" class="form-control" id="id_pelanggan" required>
                        <option value="">Pilih Pelanggan</option>
                        <?php foreach ($pelanggan as $p) : ?>
                            <option value="<?= $p->id_pelanggan ?>"><?= $p->id_pelanggan ?> - <?= $p->nama_pelanggan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <input type="text" name="bulan" class="form-control" id="bulan" required>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" class="form-control" id="tahun" required>
                </div>
                <div class="form-group">
                    <label for="meter_awal">Meter Awal</label>
                    <input type="text" name="meter_awal" class="form-control" id="meter_awal" required>
                </div>
                <div class="form-group">
                    <label for="meter_akhir">Meter Akhir</label>
                    <input type="text" name="meter_akhir" class="form-control" id="meter_akhir" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <?php $this->load->view('admin/partials/footer'); ?>
</div>
