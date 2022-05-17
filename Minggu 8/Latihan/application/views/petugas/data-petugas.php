<!-- Card header -->
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Tabel <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('petugas/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus">
                    </i> Tambah Data
                </a>
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body table-responsive">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Id_Petugas</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Akses</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $u) :  ?>
                    <tr>
                        <td><?= $u['id_user']; ?></td>
                        <td><?= $u['nama']; ?></td>
                        <td><?= $u['username']; ?></td>
                        <td>
                            <div class="badge badge-<?= $u['role_id'] == 1 ? 'primary' : 'secondary' ?>">
                                <?= $u['role_id'] == 1 ? 'Admin' : 'Petugas' ?>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-<?= $u['active'] == 1 ? 'success' : 'danger' ?>">
                                <?= $u['active'] == 1 ? 'Aktif' : 'NonAktif'; ?>
                            </div>
                        </td>
                        <td>
                            <a href="<?= base_url('petugas/toggle/' . $u['id_user']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-power-off"></i>
                            </a>
                            <a href="<?= base_url('petugas/edit/' . $u['id_user']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('petugas/delete/' . $u['id_user']); ?>" class="btn btn-default btn-sm" onclick="return confirm('Yakin ingin dihapus')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>

            </tbody>
        </table>
    </div>
</div>