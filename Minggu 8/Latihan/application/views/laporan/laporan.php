<div class="row">
    <div class="col-lg-6">
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
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" type="text" name="tanggal" id="tanggal" placeholder="tanggal" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="far fa-fw fa-calendar-alt"></i>
                            </span>
                        </div>
                    </div>
                    <?= form_error('tanggal'); ?>
                </div>
                <div class="text-right">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-info">Cetak</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>