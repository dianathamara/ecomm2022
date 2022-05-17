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
                    <label for="kode">Kode Pelanggan</label>
                    <input type="text" name="kode" id="kode" value="<?= $pelanggan['id_pelanggan'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="nm_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nm_pelanggan" id="nm_pelanggan" value="<?= $pelanggan['nm_pelanggan'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $pelanggan['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label for="no_telp">Nama Pelanggan</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $pelanggan['no_telp'] ?>">
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