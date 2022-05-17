<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title"><?= $title; ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('paket'); ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="kode">Kode Paket</label>
                    <input type="text" name="nm_paket" id="nm_paket" class="form-control" value="<?= $paket['kd_paket']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nm_paket">Nama Paket</label>
                    <input type="text" class="form-control" name="nm_paket" id="nm_paket" value="<?= $paket['nm_paket']; ?>">
                    <?= form_error('nm_paket'); ?>
                </div>
                <div class="form-group">
                    <label for="kategori">Pilih Kategori</label>
                    <select name="kategori" id="kategori" class="form-control select 1">
                        <?php foreach ($kategori as $k) :  ?>
                            <option <?= $k['id_kategori'] == $paket['id_kategori'] ? 'selected' : ''; ?> value="<?= $k['id_kategori']; ?>"><?= $k['nm_kategori']; ?></option>
                        <?php endforeach;  ?>
                    </select>
                    <?= form_error('nm_paket'); ?>
                </div>
                <div class=" form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $paket['harga']; ?>">
                    <?= form_error('harga') ?>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?php form_close();  ?>
            </div>
        </div>
    </div>
</div>