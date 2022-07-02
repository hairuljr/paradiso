<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">DATA BAHAN BAKU KELUAR</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      
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
                                    <th class="align-middle">Tanggal</th>
                                    <th class="align-middle">Barcode</th>
                                    <th class="align-middle">Nama Bahan Baku</th>
                                    <th class="align-middle">Jumlah Keluar</th>
                                    <th class="align-middle">Satuan</th>
                                 

                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($bahanbakukeluar as $br)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $br->tgl_transaksi}}</td>
                                    <td>{{ $br->bahan_baku_kode}}</td>
                                    <td>{{ $br->nama_bahan_baku}}</td>
                                    <td>{{ $br->jumlah}}</td>
                                    <td>{{ $br->satuan}}</td>
                                   
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
                                <input type="text" name="kode_jenis_produk" wire:model="kode_jenis_produk"
                                    class="form-control" readonly>
                                @error('kode_jenis_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="jenis_produk" wire:model="jenis_produk"
                                    class="form-control">
                                @error('jenis_produk') <span class="error">{{ $message }}</span> @enderror
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
