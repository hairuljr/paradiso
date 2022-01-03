<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Jenis Produk</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/jenisproduk" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
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
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" name="kode_jenis_produk" wire:model="kode_jenis_produk"
                                    class="form-control">
                                @error('kode_jenis_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Jenis Produk</label>
                            <div class="col-md-5">
                                <input type="text" name="jenis_produk" wire:model="jenis_produk"
                                    class="form-control">
                                @error('jenis_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                     
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
