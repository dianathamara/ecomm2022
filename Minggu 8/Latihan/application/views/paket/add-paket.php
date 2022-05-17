<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

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
                    <input type="text" name="kode" id="kode" readonly value="<?= $kd_paket ?>" class="form-control">

                </div>
                <div class="form-group">
                    <label for="nm_paket">Nama Paket</label>
                    <input type="text" class="form-control" name="nm_paket" id="nm_paket">
                    <?= form_error('nm_paket'); ?>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control select1">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k) :  ?>
                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nm_kategori']; ?></option>
                        <?php endforeach;  ?>
                    </select>
                    <?= form_error('kategori'); ?>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga">
                    <?= form_error('harga'); ?>
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