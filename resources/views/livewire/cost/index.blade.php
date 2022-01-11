<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Cost Of Good Sold</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="{{route('cost.create')}}" type="button" class="btn btn-success "><i
                                class="mdi mdi-plus me-1"></i> Hitung </a>
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
                                    <th class="align-middle">Barcode Produk</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Total Cgs</th>
                                    <th class="align-middle">Harga Jual</th>
                                    <th class="align-middle">Profit</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($cost as $cs)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $cs->kode_produk}}</td>
                                    <td>{{ $cs->nama_produk}}</td>
                                    {{-- <td>{{ $cs->kode_bahan_baku}}</td>
                                    <td>{{ $cs->nama_bahan_baku}}</td>
                                    <td>{{ $cs->harga}}</td> --}}
                                    <td>
                                        <div class="d-flex gap-3 cursor">
                                            <a wire:click.prevent="DetailData('{{$cs->produk_kode}}')"
                                                class="text-success" data-bs-toggle="modal"
                                                data-bs-target="#updateModal"><i
                                                    class="mdi mdi-pencil font-size-18"></i>
                                            </a>

                                            <a button class="text-danger"
                                                wire:click="DetailData('{{$cs->produk_kode}}')"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                    class="mdi mdi-delete font-size-18"></i>
                                            </a>

                                            <a button class="text-secondary"
                                            wire:click="DetailData('{{$cs->produk_kode}}')"
                                            data-bs-toggle="modal" data-bs-target="#detailModal"><i
                                                class="mdi-eye-outline font-size-18"></i>
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


    {{-- MODAL EDIT --}}
    <div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" wire:model="bahan_baku_kode" 
                                    class="form-control" readonly>
                                @error('bahan_baku_kode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_bahan_baku" wire:model="nama_bahan_baku"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input type="text" name="jumlah" wire:model="jumlah" class="form-control">
                                @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Satuan</label>
                            <div class="col-md-10">
                                <input type="text" name="satuan" wire:model="satuan" class="form-control" 
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-10">
                                <input type="text" name="harga" wire:model="harga" class="form-control">
                                @error('harga') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            {{-- <label class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-5">
                                <input type="text" name="satuan_produk" wire:model="satuan_produk" class="form-control">
                                @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                            </div> --}}
                            <div class="col-md-5">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click.prevent="Update()"
                                    type="button">Update</button>
                            </div>
                        </div>
                    </form>
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
