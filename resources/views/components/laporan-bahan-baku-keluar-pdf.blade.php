<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bahan Baku Keluar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3 class="alert alert-success">Ini Kop Laporan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="align-middle">No</th>
                    <th scope="col" class="align-middle">Tanggal</th>
                    <th scope="col" class="align-middle">Barcode</th>
                    <th scope="col" class="align-middle">Nama Bahan Baku</th>
                    <th scope="col" class="align-middle">Jumlah Keluar</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $bbm)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $bbm->penjualan?->tgl_transaksi }}</td>
                        <td>{{ $bbm->bahan_baku_kode }}</td>
                        <td>{{ $bbm->bahanbaku?->nama_bahan_baku }}</td>
                        <td>{{ $bbm->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
