<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .table-body th {
            text-align: left;
            padding: 8px;
        }

        .table-catatan td {
            text-align: left;
            padding: 8px;
        }

        .ttd {
            margin-bottom: 0;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <img src="assets/img/logo_hiro.png" style="position: absolute; width:60px; height:auto;">
    <table style="width:100%;">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-weight:bold;">
                    Hiro Laundry
                    <br>Sukahati - Cibinong
                    <br>WA 085782338757 atau folow IG @hiro_laundry
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <br>
    <table class="table-body">
        <tr>
            <td>
                <h3 style="font-weight: bold;">Struk Laundry</h3>
            </td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td>:</td>
            <td> <?= $transaksi['nm_pelanggan']; ?> </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td> <?= $transaksi['alamat']; ?> </td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>:</td>
            <td> <?= $transaksi['no_telp']; ?> </td>
        </tr>
        <tr>
            <th>Tanggal Terima</th>
            <td>:</td>
            <td> <?= $transaksi['tgl_masuk']; ?> </td>
        </tr>
        <tr>
            <th>Tanggal Kembali</th>
            <td>:</td>
            <td> <?= $transaksi['tgl_kembali']; ?></td>
        </tr>
        <tr>
            <th>Jumlah Kiloan</th>
            <td>:</td>
            <td> <?= $transaksi['berat']; ?> kg </td>
        </tr>
        <tr>
            <th>Nominal</th>
            <td>:</td>
            <td> <?= $transaksi['total']; ?></td>
        </tr>
        <tr>
            <th>Status Pembayaran</th>
            <td>:</td>
            <td> <?= $transaksi['status']; ?></td>
        </tr>
        <tr>
            <th>Paket Cucian</th>
            <td>:</td>
            <td> <?= $transaksi['nm_paket']; ?></td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>:</td>
            <td> <?= $transaksi['keterangan']; ?></td>
        </tr>
    </table>
    <br><br><br>
    <hr>
    <table class="table-catatan">
        <tr>
            <td>Catatan : </td>
        </tr>
        <tr>
            <td>
                - Barang yang sudah lebih dari 30 hari tidak diambil bukan tanggung jawab kami.
            </td>
        </tr>
        <tr>
            <td>
                - Barang yang <b>Rusak</b> akan diganti sesuai dengan harga baju.
            </td>
        </tr>
        <tr>
            <td>
                - Bukti Pembayaran sah dengan kwitansi.
            </td>
        </tr>
        <tr>
            <td>
                - Komplain berlaku 24jam setelah barang diambil.
            </td>
        </tr>
        <br><br>
        <tr class="ttd">
            <td>
                <h3>Customer</h3>
                <h4>( <?= $transaksi['nm_pelanggan'] ?> )</h4>
            </td>
            <td>
                <h3>Kasir</h3>
                <h4>( <?= $transaksi['nama']; ?> )</h4>
            </td>
        </tr>
    </table>

</body>

</html>