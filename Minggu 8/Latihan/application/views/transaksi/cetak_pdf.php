<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table tr th,
        .data-table tr td {
            border: 1px solid black;
            font-family: sans-serif;
            font-size: 11pt;
        }
    </style>
</head>

<body>
    <h3>
        <center>Laporan Transaksi Laundry</center>

    </h3>
    <br><br>
    <hr>
    <br><br>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Pelanggan</th>
                <th>Tanggal Terima</th>
                <th>Tanggal kembali</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <br>
        <tbody align="center">
            <?php $no = 1;  ?>
            <?php foreach ($transaksi as $t) :  ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $t['no_transaksi']; ?></td>
                    <td><?= $t['nm_pelanggan']; ?></td>
                    <td><?= $t['tgl_masuk']; ?></td>
                    <td><?= $t['tgl_kembali']; ?></td>
                    <td><?= $t['berat']; ?></td>
                    <td><?= $t['total']; ?></td>
                    <td><?= $t['status']; ?></td>
                </tr>
                <?php $no++;  ?>
            <?php endforeach;  ?>
        </tbody>
    </table>
</body>

</html>