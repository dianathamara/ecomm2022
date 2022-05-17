<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">
                    Tabel <?= $title; ?>
                </h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('pelanggan/add'); ?>" class="btn btn-sm btn-info">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($pelanggan as $pl) :  ?>
                    <tr>
                        <td><?= $pl['id_pelanggan']; ?></td>
                        <td><?= $pl['nm_pelanggan']; ?></td>
                        <td><?= $pl['alamat']; ?></td>
                        <td><?= $pl['no_telp']; ?></td>
                        <td>
                            <a href="<?= base_url('pelanggan/edit/' . $pl['id_pelanggan']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin ingin dihapus');" href="<?= base_url('pelanggan/delete/' . $pl['id_pelanggan']); ?>" class="btn btn-default btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>