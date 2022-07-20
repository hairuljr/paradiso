<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3 class="alert alert-success">Ini Kop Laporan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">No Transaksi</th>
                    <th class="align-middle">Tanggal</th>
                    <th class="align-middle">Kode Barang</th>
                    <th class="align-middle">Nama Barang</th>
                    <th class="align-middle">Jumlah</th>
                    <th class="align-middle">Harga</th>
                    <th class="align-middle">Total</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $bbm)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $bbm->no_transaksi }}</td>
                        <td>{{ $bbm->tgl_transaksi }}</td>
                        <td>{{ $bbm->detailPenjualan?->produk?->kode_produk }}</td>
                        <td>{{ $bbm->detailPenjualan?->produk?->nama_produk }}</td>
                        <td>{{ $bbm->detailPenjualan?->jumlah }}</td>
                        <td>{{ rupiah($bbm->sub_total) }}</td>
                        <td>{{ rupiah($bbm->detailPenjualan?->total) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
