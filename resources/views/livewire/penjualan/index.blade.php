<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penjualan</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{route('penjualan.create')}}" type="button" class="btn btn-success "><i
                                class="mdi mdi-plus me-1"></i> Penjualan </a>
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
                            @if (session('pesan'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('pesan')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session('pesan1'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('pesan1')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session('hapus'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('hapus')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">No Transaksi</th>
                                    <th class="align-middle">Tanggal</th>
                                    <th class="align-middle">Sub Total</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($penjualan as $pn)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pn->no_transaksi}}</td>
                                    <td>{{ $pn->tgl_transaksi}}</td>
                                    <td>{{ rupiah($pn->sub_total)}}</td>
                                    <td>
                                        <div class="d-flex gap-3 cursor">
                                            <a wire:click.prevent="DetailData('{{$pn->no_transaksi}}')"
                                                class="text-success" data-bs-toggle="modal"
                                                data-bs-target="#updateModal"><i
                                                    class="mdi mdi-pencil font-size-18"></i>
                                            </a>

                                            <a button class="text-danger"
                                                wire:click="DetailData('{{$pn->no_transaksi}}')"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                    class="mdi mdi-delete font-size-18"></i>
                                            </a>

                                          


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
