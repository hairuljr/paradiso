<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pembelian</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/bahanbakumasuk" type="submit"
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

                    <form method="POST" wire:submit.prevent="save">
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" name="bahan_baku_kode" wire:model="bahan_baku_kode"
                                    id="bahan_baku_kode" class="form-control" readonly >
                                @error('bahan_baku_kode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2 col-4">
                                    <button type="button"  class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Cari</button>
                                </div>
                            </div>
                        </div>
                      
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_bahan_baku" 
                                    id="nama_bahan_baku" class="form-control" readonly>
                                @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input type="text" name="jumlah" wire:model="jumlah" class="form-control" >
                                @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Satuan</label>
                            <div class="col-md-10">
                                <input type="text" name="satuan" class="form-control" id="satuan" readonly>
                                @error('satuan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Harga</label>
                            <div class="col-md-10">
                                <input type="text" name="harga" wire:model="harga" class="form-control" >
                                @error('satuan') <span class="error">{{ $message }}</span> @enderror
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


    {{-- modal --}}
    <div class="modal fade bs-example-modal-xl"  id="modal-item" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
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

                                    {{-- <td>{{ $bb->harga_beli}}</td> --}}
                                    {{-- <td>{{ $bb->satuan_produk}}</td> --}}
                                    <td>
                                        <button  class="btn btn-xs btn-info" id="select"

                                            data-bahan_baku_kode="{{ $bb->kode_bahan_baku}}"
                                            data-nama_bahan_baku="{{ $bb->nama_bahan_baku}}"
                                            data-satuan="{{ $bb->satuan}}">
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
    </div>
