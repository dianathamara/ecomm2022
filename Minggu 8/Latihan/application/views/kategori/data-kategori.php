<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">Tabel <?= $title; ?></h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('kategori/add'); ?>" class="btn btn-sm btn-info">
                    <div class="fas fa-plus"></div> Tambah Data
                </a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $k) :  ?>
                    <tr>
                        <td><?= $k['id_kategori']; ?></td>
                        <td><?= $k['nm_kategori']; ?></td>
                        <td>
                            <a href="<?= base_url('kategori/edit/' . $k['id_kategori']); ?>" class="btn sm btn-default">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick=" return confirm('Yakin ingin dihapus')" href="<?= base_url('kategori/delete/' . $k['id_kategori']); ?>" class="btn sm btn-default">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>