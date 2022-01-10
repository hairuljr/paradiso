<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cost Of Good Sold</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/cost" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Barcode </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" wire:model="produk_kode" readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".ProdukModal">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Nama Produk </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" wire:model="nama_produk" readonly>
                                    </div>
                                </div>
                              
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" wire:model="bahan_baku_kode" 
                                    class="form-control" readonly>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".BahanBakuMasukModal">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" wire:model="nama_bahan_baku" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Harga </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label" >Isi</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" wire:model="satuan_produk" readonly>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-15">
                                    <input type="text" wire:model="satuan" class="form-control" readonly>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Digunakan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Cost</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control"  readonly>
                            </div>
                        </div>
                        <div class="row mb-4">   
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div class="form-check mb-4">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Hitung</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
 

    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Barcode Produk</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Barcode BB</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Cost</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                {{-- @foreach ($cost as $cs) --}}
                                <tr>
                                    {{-- <td>{{ $no++ }}</td>
                                    <td>{{ $cs->kode_produk}}</td>
                                    <td>{{ $cs->nama_produk}}</td>
                                    <td>{{ $cs->kode_bahan_baku}}</td>
                                    <td>{{ $cs->nama_bahan_baku}}</td>
                                    <td>{{ $cs->harga}}</td> --}}

                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-xl-6">
          
            <!-- end card -->
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Total Cgs</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Harga Jual</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Profit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                       
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                              
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    {{-- Modal  Bahan Baku--}}
    <div wire:ignore.self class="modal fade BahanBakuMasukModal" id="modal-item" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Extra large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Kode BK</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Persedian</th>
                                    <th class="align-middle">Satuan</th>
                                    <th class="align-middle">Isi Satuan</th>
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    @php $no = 1; @endphp
                                    @foreach ($bahanbaku as $bb)


                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bb->kode_bahan_baku}}</td>
                                    <td>{{ $bb->nama_bahan_baku}}</td>
                                    <td>{{ $bb->persediaan}}</td>
                                    <td>{{ $bb->satuan}}</td>
                                    <td>{{ $bb->satuan_produk}}</td>
                                    <td>
                                        <button wire:click.prevent="SelectData('{{$bb->kode_bahan_baku}}')"
                                            class="btn btn-xs btn-info" id="select">
                                            <i class="fa fa-check"></i> Select

                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    {{-- Modal Produk --}}
    <div wire:ignore.self class="modal fade ProdukModal" id="modal-item1" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Extra large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Barcode</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Jenis Produk</th>
                                    <th class="align-middle">Harga Satuan</th>

                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    @php $no = 1; @endphp
                                    @foreach ($produk as $pk)


                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pk->kode_produk}}</td>
                                    <td>{{ $pk->nama_produk}}</td>
                                    <td>{{ $pk->jenis_produk_kode}}</td>
                                    <td>{{ $pk->harga_satuan}}</td>
                                    <td>
                                        <button wire:click.prevent="SelectData1('{{$pk->kode_produk}}')"
                                            class="btn btn-xs btn-info" id="select1">
                                            <i class="fa fa-check"></i> Select

                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
