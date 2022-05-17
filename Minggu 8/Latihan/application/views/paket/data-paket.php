<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Table <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('paket/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Kode Paket</th>
                    <th>Nama Kategori</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paket as $p) :  ?>
                    <tr>
                        <td><?= $p['kd_paket']; ?></td>
                        <td><?= $p['nm_paket']; ?></td>
                        <td><?= $p['nm_kategori'] ?></td>
                        <td><?= $p['harga']; ?></td>
                        <td>
                            <a href="<?= base_url('paket/edit/' . $p['kd_paket']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin ingin dihapus?');" href="<?= base_url('paket/delete/' . $p['kd_paket']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>