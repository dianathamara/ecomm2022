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
                <?= form_open(); ?>
                <div class="form-group">
                    <label for="id_user">Nomor Petugas</label>
                    <input type="text" readonly name="id_user" value="<?= $id_user; ?>" id="id_user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
                    <?= form_error('nama'); ?>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role_id', '1'); ?> value="1" class="custom-control-input" type="radio" id="admin" name="role_id">
                                <label for="admin" class="custom-control-label">Admin</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input <?= set_radio('role_id', '2'); ?> value="2" class="custom-control-input" type="radio" id="pertugas" name="role_id">
                                <label for="petugas" class="custom-control-label">Petugas</label>
                            </div>
                        </div>

                    </div>
                    <?= form_error('role'); ?>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <?= form_error('username'); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                            <?= form_error('password'); ?>
                        </div>
                        <div class="col-lg-6">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" class="form-control">
                            <?= form_error('password2'); ?>
                        </div>
                    </div>
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