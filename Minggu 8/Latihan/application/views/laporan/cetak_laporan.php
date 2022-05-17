<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>

    <div class="text-center">
        <h3>Laporan Transaksi</h3>
        <p class="desc"><?= $tanggal; ?></p>
    </div>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Pelanggan</th>
                <th>Terima</th>
                <th>Kembali</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($transaksi as $row) :
            ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td align="center"><?= $row->no_transaksi; ?></td>
                    <td align="center"><?= $row->nm_pelanggan; ?></td>
                    <td align="center"><?= $row->tgl_masuk; ?></td>
                    <td align="center"><?= $row->tgl_kembali; ?></td>
                    <td align="center"><?= $row->berat; ?></td>
                    <td align="center"><?= $row->total; ?></td>
                    <td align="center"><?= $row->status; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>