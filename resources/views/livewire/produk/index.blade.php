<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Produk</h4>
              
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
                                    <input wire:model="searchQuery" type="text" class="form-control" placeholder="Cari Nama Produk">
                                   
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('produk.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-1 me-1"><i class="mdi mdi-plus me-1"></i> Add</a>
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
                                    <th class="align-middle">Jenis Produk</th>
                                    {{-- <th class="align-middle">Harga Satuan</th> --}}
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($produk as $pk)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pk->kode_produk}}</td>
                                    <td>{{ $pk->nama_produk}}</td>
                                    <td>{{ $pk->jenis_produk}}</td>
                                    {{-- <td>{{ rupiah($pk->harga_satuan) }}</td> --}}
                                    <td>
                                        <div class="d-flex gap-3 cursor">
                                            <a wire:click.prevent="DetailData('{{$pk->kode_produk}}')"
                                                class="text-success" data-bs-toggle="modal"
                                                data-bs-target="#updateModal"><i
                                                    class="mdi mdi-pencil font-size-18"></i>
                                            </a>


                                            <a button class="text-danger"
                                                wire:click="DetailData('{{$pk->kode_produk}}')" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"><i
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


    {{-- MODAL EDIT --}}
    <div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal">Ubah Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" name="kode_produk" wire:model="kode_produk" class="form-control"
                                    readonly>
                                @error('kode_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_produk" wire:model="nama_produk" class="form-control">
                                @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Jenis Produk</label>
                            <div class="col-md-10">
                                <select wire:model="jenis_produk_kode" class="form-control select2-search-disable">
                                    <option value="" disabled="disabled">Pilih</option>
                                    @foreach ($jenisproduk as $jk)
                                    <option value="{{ $jk->kode_jenis_produk}}">{{ $jk->jenis_produk }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_produk_kode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                       
                        <div class="mb-3 row">
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
