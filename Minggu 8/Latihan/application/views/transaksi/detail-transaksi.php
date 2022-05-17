<div class="row">
    <div class="col-md-8">
        <div class="card card-outline">
            <div class="card-header bg-info">
                <h3 class="card-title font-weight-bold"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm p-0">
                        <table class="w-100 table-sm table-hover">
                            <tr>
                                <th width="150">No Transaksi</th>
                                <td><?= $detail['no_transaksi'];  ?></td>
                            </tr>
                            <tr>
                                <th width="150">Pelanggan</th>
                                <td><?= $detail['nm_pelanggan'];  ?></td>
                            </tr>
                            <tr>
                                <th width="150">Paket Cuci</th>
                                <td><?= $detail['nm_paket']; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Keterengan</th>
                                <td><?= $detail['keterangan']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm p-0">
                        <table class="w-100 table-sm table-hover">
                            <tr>
                                <th width="150">Berat</th>
                                <td><?= $detail['berat']; ?> /Kg</td>
                            </tr>
                            <tr>
                                <th width="150">Tanggal Terima</th>
                                <td><?= $detail['tgl_masuk']; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Tanggal Ambil</th>
                                <td><?= $detail['tgl_kembali']; ?></td>
                            </tr>
                            <tr>
                                <th width="150">Petugas</th>
                                <td><?= $detail['nama']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-outline-sm">
            <div class="card-header bg-info">
                <h3 class="card-title font-weight-bold">Rincian Biaya</h3>
            </div>
            <div class="card-body">
                <table class="w-100 table-sm table-hover">
                    <tr>
                        <th>Biaya Laundry</th>
                        <td>Rp. <?= number_format($detail['tarif'], 2, ',', '.');  ?></td>
                    </tr>
                    <tr>
                        <th>Berat</th>
                        <td><?= $detail['berat']; ?> kg</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp. <?= number_format($detail['total'], 2, ',', '.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>