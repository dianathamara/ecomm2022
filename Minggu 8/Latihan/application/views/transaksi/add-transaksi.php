<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <?= form_open() ?>
                <div class="form-group">
                    <label for="">Kode Transaksi</label>
                    <input type="text" name="id_transaksi" readonly value="<?= $no_transaksi; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pelanggan">Nama Pelanggan</label>
                    <select name="pelanggan" id="pelanggan" class="form-control">
                        <option value="">Pilih Pelanggan</option>
                        <?php foreach ($data['pelanggan'] as $pelanggan) :  ?>
                            <option value="<?= $pelanggan['id_pelanggan']; ?>"><?= $pelanggan['nm_pelanggan'] ?></option>
                        <?php endforeach;  ?>
                    </select>
                    <?= form_error('pelanggan'); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="masuk">Tanggal Terima</label>
                            <input type="date" name="masuk" id="masuk" class="form-control">
                        </div>
                        <?php form_error('masuk');  ?>
                        <div class="col-6">
                            <label for="kembali"> Kembali</label>
                            <input type="date" name="kembali" id="kembali" class="form-control">
                        </div>
                        <?= form_error('kembali'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Layanan</label>
                    <select name="layanan" id="layanan" class="form-control">
                        <option value="" selected disabled>Pilih Layanan</option>
                        <?php foreach ($data['jenis_paket'] as $paket) :  ?>
                            <option <?= set_select('layanan', $paket['harga']); ?> value="<?= $paket['kd_paket']; ?>" data-harga="<?= $paket['harga']; ?>"><?= $paket['nm_paket']; ?></option>
                        <?php endforeach;  ?>
                    </select>
                    <?= form_error('layanan') ?>
                </div>
                <div class="form-group">
                    <label for="harga">Tarif</label>
                    <input type="number" name="harga" id="harga" class="form-control" readonly value="<?= set_value('harga'); ?>" placeholder="Tarif">
                </div>
                <div class="form-group">
                    <label for="berat">Berat (kg)</label>
                    <input type="number" name="berat" id="berat" class="form-control" value="<?= set_value('berat'); ?>" placeholder="Berat">
                    <?= form_error('berat'); ?>
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input readonly type="number" name="total" id="total" class="form-control" value="<?= set_value('total'); ?>" placeholder="total">
                </div>
                <div class="form-group">
                    <label for="status">Status Pembayaran</label>
                    <select name="status" id="status" class="form-control">
                        <option value="" selected disabled>Status Pembayaran</option>
                        <option value="Lunas" <?= $data['transaksi'] == "Lunas" ? "Selected" : ""; ?>>Lunas</option>
                        <option value="Belum Lunas" <?= $data['transaksi'] == "Belum Lunas" ? "Selected" : ""; ?>>Belum Lunas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    transaksi = true;
</script>