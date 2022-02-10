<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Produk</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/produk" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
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
                        @csrf
                        {{-- <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" name="kode_produk" wire:model="kode_produk"
                                    class="form-control">
                                @error('kode_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_produk" wire:model="nama_produk"
                                    class="form-control">
                                @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label  class="col-md-2 col-form-label">Jenis Produk</label>
                            <div class="col-md-10">
                                <select wire:model="jenis_produk_kode" class="form-select" aria-label="Default select example">
                                    <option value=""disabled="disabled">Pilih</option>

                                    @foreach ($jenisproduk as $jk)
                                        <option value="{{ $jk->kode_jenis_produk}}">{{ $jk->jenis_produk }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('jenis_produk_kode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-10">
                                <input type="text" name="harga_satuan" wire:model="harga_satuan" class="form-control">
                                @error('harga_satuan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success" type="button">Finish</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div>
