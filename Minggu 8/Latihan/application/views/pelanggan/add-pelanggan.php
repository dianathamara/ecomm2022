<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('pelanggan'); ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="">Kode Pelanggan</label>
                    <input type="text" name="kd_pelanggan" readonly value="<?= $id_pelanggan; ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="nm_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nm_pelanggan" id="nm_pelanggan" class="form-control">
                    <?= form_error('nm_pelanggan'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                    <?= form_error('alamat'); ?>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control">
                    <?= form_error('no_telp'); ?>
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