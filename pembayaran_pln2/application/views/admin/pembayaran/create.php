<?php $this->load->view('admin/partials/header'); ?>
<?php $this->load->view('admin/partials/sidebar'); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php $this->load->view('admin/partials/topbar'); ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Pembayaran</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <!-- Form untuk input detail pembayaran -->
                            <form action="<?= site_url('admin/create_pembayaran') ?>" method="post">
                                <div class="form-group">
                                    <label for="id_tagihan">Pilih Tagihan</label>
                                    <select name="id_tagihan" id="id_tagihan" class="form-control" required onchange="this.form.submit()">
                                        <option value="">-- Pilih Tagihan --</option>
                                        <?php foreach ($tagihan as $t): ?>
                                            <?php if ($t->status != 'lunas'): ?>
                                                <option value="<?= $t->id_tagihan ?>" <?= set_select('id_tagihan', $t->id_tagihan) ?>><?= $t->id_tagihan ?> - <?= $t->username ?> - <?= $t->bulan ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_tagihan', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_bayar">Tanggal Pembayaran</label>
                                    <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= set_value('tgl_bayar') ?>" required>
                                    <?= form_error('tgl_bayar', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="biaya_adm">Biaya Admin</label>
                                    <input type="number" class="form-control" id="biaya_adm" name="biaya_adm" value="2500" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total Bayar</label>
                                    <input type="number" class="form-control" id="total" name="total" value="<?= $total_bayar ?>" readonly required>
                                    <?= form_error('total', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <button type="submit" name="submit_pembayaran" class="btn btn-primary">Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('admin/partials/footer'); ?>
</div>
