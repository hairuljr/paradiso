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
                                <a href="/bahanbaku" type="submit"
                                    class="btn btn-secondary waves-effect waves-light">Back</a>
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



                            <form wire:submit.prevent="store/">
                                <div class="mb-3 row">
                                    <label for="kode_bahan_baku" class="col-md-2 col-form-label">Barcode</label>
                                    <div class="col-md-5">
                                        <input type="text" name="kode_bahan_baku" wire:model="kode_bahan_baku"
                                            class="form-control" id="kode_bahan_baku">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nama_bahan_baku" class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" name="nama_bahan_baku" wire:model="nama_bahan_baku"
                                            class="form-control" id="nama_bahan_baku">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="persediaan" class="col-md-2 col-form-label">Persediaan</label>
                                    <div class="col-md-10">
                                        <input name="persediaan" wire:model="persediaan" class="form-control"
                                            type="text" id="persediaan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="satuan" class="col-md-2 col-form-label">Satuan</label>
                                    <div class="col-md-10">
                                        <input name="satuan" wire:model="satuan" class="form-control" type="text"
                                            id="satuan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga_beli" class="col-md-2 col-form-label">Harga</label>
                                    <div class="col-md-10">
                                        <input name="harga_beli" wire:model="harga_beli" class="form-control"
                                            type="text" id="harga_beli">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="satuan_produk" class="col-md-2 col-form-label">Harga</label>
                                    <div class="col-md-5">
                                        <input type="text" name="satuan_produk" wire:model="satuan_produk"
                                            class="form-control" id="satuan_produk">
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary"> Tambah</i></button>
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
