<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex">
                <h3 class="card-title align-self-center">Tabel <?= $title; ?></h3>
            </div>
            <div class="col text-right">
                <a href="<?= base_url('transaksi/add'); ?>" class="btn btn-sm btn-info">
                    <div class="fas fa-plus"></div> Tambah Data
                </a>
                <a href="<?= base_url('transaksi/cetak_pdf'); ?>" class="btn btn-sm btn-default">
                    <i class="fas fa-print"></i> Laporan
                </a>
            </div>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Pelanggan</th>
                    <th>Terima</th>
                    <th>Kembali</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $row) :  ?>
                    <tr>
                        <td>
                            <a href="<?= base_url('transaksi/detail/' . $row['no_transaksi']); ?> ">
                                <?= $row['no_transaksi'];  ?>
                            </a>
                        </td>
                        <td><?= $row['nm_pelanggan']; ?></td>
                        <td><?= $row['tgl_masuk'] ?></td>
                        <td><?= $row['tgl_kembali'] ?></td>
                        <td><?= $row['berat'] ?></td>
                        <td>Rp. <?= number_format($row['tarif'], 2, ',', '.');  ?></td>
                        <?php if ($row['status'] == "Lunas") {
                            $status = "warning";
                        } else {
                            $status = "secondary";
                        } ?>
                        <td>
                            <i class="btn btn-outline-<?= $status ?> btn-sm"> <?= $row['status']; ?></i>
                        </td>
                        <td>
                            <?php if ($row['status'] == 'Belum Lunas') :  ?>
                                <a href="<?= base_url('transaksi/status/' . $row['no_transaksi']); ?>" class="btn btn-sm btn-default">
                                    <i class="fas fa-check-square"></i>
                                </a>
                            <?php endif;  ?>
                            <a href="<?= base_url('transaksi/cetak_pdf_pelanggan/' . $row['no_transaksi']); ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-print"></i>
                            </a>
                            <a href="<?= base_url('transaksi/edit/' . $row['no_transaksi']) ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick=" return confirm('Yakin ingin dihapus')" href="<?= base_url('transaksi/delete/' . $row['no_transaksi']) ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>