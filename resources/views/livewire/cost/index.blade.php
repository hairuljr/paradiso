<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cost </h4>




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
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input wire:model="search" type="text" class="form-control"
                                        placeholder="Cari Nama Produk">

                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('cost.create')}}" type="button"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-1 me-1"><i
                                        class="mdi mdi-plus me-1"></i> Hitung</a>
                            </div>
                        </div><!-- end col-->
                    </div>




                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Barcode</th>
                                    <th class="align-middle">Nama Produk</th>
                                    <th class="align-middle">Total Cgs</th>
                                    <th class="align-middle">Harga Jual</th>
                                    <th class="align-middle">Profit</th>
                                    <th class="align-middle">Cost Details</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($cost as $cs)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $cs->produk_kode}}</td>
                                    <td>{{ $cs->produk->nama_produk}}</td>
                                    <td>{{ rupiah($cs->Cost->total_cgs) }}</td>
                                    <td>{{ rupiah($cs->Cost->harga_jual) }}</td>
                                    <td>{{ persen($cs->Cost->profit)  }}</td>

                                    <td>
                                        <div class="d-flex gap-3 cursor">

                                            <button type="button"
                                                wire:click.prevent="DetailData('{{$cs->Cost->id_cost}}')"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"
                                                class="btn btn-primary btn-sm btn-rounded">
                                                View Details
                                            </button>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 cursor">

                                            <a button class="text-danger"
                                                wire:click="DetailData1('{{$cs->Cost->id_cost}}')"
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


    {{-- MODAL DETAIL --}}
    <div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal">Detail Cost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table align-middle table-nowrap table-check">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Nama Bahan Baku</th>
                                <th class="align-middle">Digunakan</th>
                                <th class="align-middle">Satuan</th>
                                <th class="align-middle">Cost</th>


                            </tr>
                        </thead>


                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($detailCosts as $ds)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $ds->bahanbaku->nama_bahan_baku }}</td>
                                <td>{{ $ds->digunakan }}</td>
                                <td>{{ $ds->bahanbaku->satuan }}</td>
                                <td>{{  rupiah($ds->cost) }}</td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- MODAL DELETE --}}

    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin mengahapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" wire:click.prevent="delete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
