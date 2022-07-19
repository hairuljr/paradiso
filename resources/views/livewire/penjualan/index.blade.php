<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penjualan</h4>
                
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
                                    <input wire:model="searchQuery" type="date" class="form-control" placeholder="Cari Tanggal Transaksi">
                                   
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('penjualan.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-1 me-1"><i class="mdi mdi-plus me-1"></i> Add</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">No Transaksi</th>
                                    <th class="align-middle">Kasir</th>
                                    <th class="align-middle">Tanggal</th>

                                    <th class="align-middle">Sub Total</th>
                                    <th class="align-middle">Detail Penjualan</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($penjualan as $pn)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pn->no_transaksi}}</td>
                                    <td>{{ $pn->user->name}}</td>
                                    <td>{{ $pn->tgl_transaksi}}</td>
                                    <td>{{ rupiah($pn->sub_total)}}</td>
                                    <td>
                                        <div class="d-flex gap-3 cursor">
                                            
                                            <button type="button" wire:click.prevent="DetailData('{{$pn->no_transaksi}}')" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateModal" class="btn btn-primary btn-sm btn-rounded">
                                                View Details
                                            </button> 
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 cursor">
                                            <a button class="text-danger"
                                                wire:click="DetailData1('{{$pn->no_transaksi}}')"
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

    <div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModal">Detail Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                <table id="example" class="table align-middle table-nowrap table-check">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Produk</th>
                            <th class="align-middle">Jumlah</th>
                            <th class="align-middle">Total</th>
                            
                          
                        </tr>
                    </thead>


                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($detailTransaksi as $di)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $di->produk->nama_produk }}</td>
                                    <td>{{ $di->jumlah }}</td>
                                    <td>{{  rupiah($di->total) }}</td>
                                  
                                </tr>
                         
                            @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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


