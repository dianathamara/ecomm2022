<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Form <?= $title ?></h3>
                <div class="card-tools">
                    <a href="<?= base_url('petugas'); ?>" class="btn btn-tool">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?= form_open("", ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>">
                    <?= form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role_id', '1', $user['role_id'] == 1 ? true : false); ?> value="1" class="custom-control-input" type="radio" id="admin" name="role_id">
                                <label for="admin" class="custom-control-label">Admin</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role_id', '2', $user['role_id'] == 2 ? true : false); ?> value="2" class="custom-control-input" type="radio" id="pertugas" name="role_id">
                                <label for="pertugas" class="custom-control-label">Petugas</label>
                            </div>
                        </div>

                    </div>
                    <?= form_error('role'); ?>
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