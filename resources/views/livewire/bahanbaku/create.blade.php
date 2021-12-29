<div>

    @extends('layouts.skote-admin')
    @section('content')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah Bahan Baku</h4>
            
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="/bahanbaku" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
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
            
                                <form wire:submit.prevent="save">
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Barcode</label>
                                    <div class="col-md-5">
                                        <input type="text" name="kode_bahan_baku" wire:model="kode_bahan_baku" class="form-control">
                                        @error('kode_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
            
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_bahan_baku" wire:model="nama_bahan_baku" class="form-control">
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
                                    <label class="col-md-2 col-form-label">Satuan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="satuan" wire:model="satuan" class="form-control">
                                        @error('satuan') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Harga</label>
                                    <div class="col-md-10">
                                        <input type="text" name="harga_beli" wire:model="harga_beli" class="form-control" >
                                        @error('harga_beli') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Harga</label>
                                    <div class="col-md-5">
                                        <input type="text" name="satuan_produk" wire:model="satuan_produk" class="form-control">
                                        @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-success"  type="button">Finish</button>
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    @endsection

</div>
