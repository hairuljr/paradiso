<div>




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

                    <form method="POST" wire:submit.prevent="save">
                        {{-- <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" name="kode_bahan_baku" wire:model="kode_bahan_baku"
                                    class="form-control">
                                @error('kode_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}

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
                                <input  type="text"  name="persediaan" wire:model="persediaan" class="form-control" value="{{ $persediaan }} " readonly>
                                @error('persediaan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Isi Satuan</label>
                            <div class="col-md-5">
                                <input type="text" name="satuan_produk" wire:model="satuan_produk" class="form-control">
                                @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                      
                       
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Satuan</label>
                            <div class="col-md-5">
                                <select wire:model="satuan" class="form-select" aria-label="Default select example">
                                    <option value=""disabled="disabled">Pilih</option>

                                    <option value="Pcs">Pcs</option>
                                    <option value="Mili">Mili</option>
                                    <option value="Gram">Gram</option>
                                    
                                </select>
                                @error('satuan') <span class="error">{{ $message }}</span> @enderror
                                <br>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success" type="button">Finish</button>
                                </div>
                            </div>
                         
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>



</div>
