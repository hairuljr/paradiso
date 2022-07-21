<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bahan Baku Masuk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" >
</head>

<body>
    <div class="container mt-4">
        <h3 class="alert alert-success">Ini Kop Laporan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="align-middle">No</th>
                    <th scope="col" class="align-middle">Barcode</th>
                    <th scope="col" class="align-middle">Nama Bahan Baku</th>
                    <th scope="col" class="align-middle">Tanggal</th>
                    <th scope="col" class="align-middle">Stok Masuk</th>
                    <th scope="col" class="align-middle">Satuan</th>
                    <th scope="col" class="align-middle">Harga</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $bbm)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $bbm->bahan_baku_kode }}</td>
                        <td>{{ $bbm->nama_bahan_baku }}</td>
                        <td>{{ $bbm->tgl_transaksi }}</td>
                        <td>{{ $bbm->stok_masuk }}</td>
                        <td>{{ $bbm->satuan }}</td>
                        <td>{{ rupiah($bbm->harga) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
