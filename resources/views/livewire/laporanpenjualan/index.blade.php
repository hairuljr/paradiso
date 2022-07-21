<div>
    <div>

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laporan penjualan</h4>
                   
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
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                               
                                <a wire:click="cetak" href="#" type="button"
                                    class="btn btn-primary btn-rounded waves-effect waves-light mb-1 me-1"><i
                                        class="mdi mdi-printer-settings me-1"></i> Print</a>
                            </div>
                        </div><!-- end col-->
                        <div class="table-responsive">
                            <table id="example" class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">No</th>
                                        <th class="align-middle">No Transaksi</th>
                                        <th class="align-middle">Tanggal</th>
                                        <th class="align-middle">Kode Barang</th>
                                        <th class="align-middle">Nama Barang</th>
                                        <th class="align-middle">Jumlah</th>
                                        <th class="align-middle">Harga</th>
                                        <th class="align-middle">Total</th>
                                       
                                     
    
                                    </tr>
                                </thead>
    
    
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data as $bbm)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $bbm->no_transaksi }}</td>
                                            <td>{{ $bbm->tgl_transaksi }}</td>
                                            <td>{{ $bbm->detailPenjualan?->produk?->kode_produk }}</td>
                                            <td>{{ $bbm->detailPenjualan?->produk?->nama_produk }}</td>
                                            <td>{{ $bbm->detailPenjualan?->jumlah }}</td>
                                            <td>{{ rupiah($bbm->sub_total) }}</td>
                                            <td>{{ rupiah($bbm->detailPenjualan?->total) }}</td>
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
        {{-- <div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateModal"
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
                                    <input type="text" name="kode_bahan_baku" wire:model="kode_bahan_baku"
                                        class="form-control" >
                                    @error('kode_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
    
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_bahan_baku" wire:model="nama_bahan_baku"
                                        class="form-control">
                                    @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Persediaan</label>
                                <div class="col-md-10">
                                    <input type="text" name="persediaan" wire:model="persediaan" class="form-control">
                                    @error('persediaan') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Isi Satuan</label>
                                <div class="col-md-10">
                                    <input type="text" name="satuan_produk" wire:model="satuan_produk" class="form-control">
                                    @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Satuan</label>
                                <div class="col-md-5">
                                    <input type="text" name="satuan" wire:model="satuan" class="form-control">
                                    @error('satuan') <span class="error">{{ $message }}</span> @enderror
                                </div>
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
        </div> --}}
    
        {{-- MODAL DELETE --}}
    
        {{-- <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
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
        </div> --}}
    
    </div>
    
</div>
