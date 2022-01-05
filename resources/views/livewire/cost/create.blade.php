<div> 
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cost Of Good Sold</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/bahanbakumasuk" type="submit"
                            class="btn btn-secondary waves-effect waves-light">Back</a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="manufacturername">Barcode </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">Cari</button>
                                    </div>
                                </div>
                                <label for="manufacturername">Nama Produk</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                   
                                </div>
                                <label for="manufacturername">Cost</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary ">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturername">Barcode </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturername">Nama Bahan Baku </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
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
                                @foreach ($cost as $cs)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $cs->kode_produk}}</td>
                                    <td>{{ $cs->nama_produk}}</td>
                                    <td>{{ $cs->kode_bahan_baku}}</td>
                                    <td>{{ $cs->nama_bahan_baku}}</td>
                                    <td>{{ $cs->harga}}</td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                               
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="manufacturername">Harga Jual</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="manufacturername">Cost </label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary ">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- <div wire:ignore.self class="modal fade BahanBakuMasukModal" id="modal-item" tabindex="-1" role="dialog"
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
    <td>
        <button wire:click.prevent="SelectData('{{$bb->kode_bahan_baku}}')" class="btn btn-xs btn-info" id="select">
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
</div> --}}
</div>
