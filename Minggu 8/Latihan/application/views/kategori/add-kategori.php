<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title; ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('kategori'); ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="kode">Kode Kategori</label>
                    <input type="text" name="kode" id="kode" readonly value="<?= $kd_kategori ?>" class="form-control">

                </div>
                <div class="form-group">
                    <label for="nm_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" name="nm_kategori" id="nm_kategori">
                    <?= form_error('nm_kategori'); ?>
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