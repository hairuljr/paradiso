<div>

    @extends('layouts.skote-admin')
    @section('content')



    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Bahan Baku</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="bahanbaku/create" type="button" class="btn btn-success "><i
                                        class="mdi mdi-plus me-1"></i> Add Data </a>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-2">
                                <div class="col-sm-4">

                                </div>

                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="align-middle">No</th>
                                            <th class="align-middle">Barcode</th>
                                            <th class="align-middle">Nama</th>
                                            <th class="align-middle">Persedian</th>
                                            <th class="align-middle">Satuan</th>
                                            <th class="align-middle">Harga Beli</th>
                                            <th class="align-middle">Satuan Produk</th>
                                            <th class="align-middle">Actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($bahanbaku as $bb)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $bb->kode_bahan_baku}}</td>
                                            <td>{{ $bb->nama_bahan_baku}}</td>
                                            <td>{{ $bb->persediaan}}</td>
                                            <td>{{ $bb->satuan}}</td>

                                            <td>{{ $bb->harga_beli}}</td>
                                            <td>{{ $bb->satuan_produk}}</td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="javascript:void(0);" class="text-success"><i
                                                            class="mdi mdi-pencil font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="text-danger"><i
                                                            class="mdi mdi-delete font-size-18"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    @endsection

</div>
