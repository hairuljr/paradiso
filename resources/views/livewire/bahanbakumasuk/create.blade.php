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
                            <label class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-2">
                                <input id="tgl_transaksi" type="date" class="form-control"
                                wire:model="tgl_transaksi" >
                                @error('tgl_transaksi') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input type="text" wire:model="bahan_baku_kode" 
                                    class="form-control" readonly>
                                @error('bahan_baku_kode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".bs-BahanBakuModal-modal-lg">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama_bahan_baku" wire:model="nama_bahan_baku"
                                    class="form-control" readonly>
                                @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Jumlah</label>
                            <div class="col-md-10">
                                <input type="text" wire:model="jumlah" id="jumlah"  class="form-control" >
                                @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label" >Isi Satuan</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="satuan_produk"  wire:model="satuan_produk" readonly>
                                @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-5">
                                    <input type="text" name="satuan"  wire:model="satuan" class="form-control" readonly>
                                    {{-- @error('satuan') <span class="error">{{ $message }}</span> @enderror --}}
                                </div>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Stok Masuk</label>
                            <div class="col-md-5">
                                <input type="hidden" id="stok_masuk" wire:model="stok_masuk">
                                <input id="stok_masukan" type="text" class="form-control" readonly>
                                @error('stok_masuk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-5">
                                    <input type="text" name="satuan"  wire:model="satuan" class="form-control" readonly>
                                    {{-- @error('satuan') <span class="error">{{ $message }}</span> @enderror --}}
                                </div>
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
    <div wire:ignore.self class="modal fade bs-BahanBakuModal-modal-lg" id="modal-item" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Data Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                   
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input wire:model="searchQuery" type="text" class="form-control"
                                            placeholder="Cari Nama Bahan Baku">

                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>

                        
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Kode BK</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Stok</th>
                                    <th class="align-middle">Isi Satuan</th>
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
                                    <td>{{ $bb->satuan_produk}}</td>
                                    <td>{{ $bb->satuan}}</td>
                                    <td>
                                        <button wire:click.prevent="SelectData('{{$bb->kode_bahan_baku}}')" class="btn btn-primary btn-sm btn-rounded" id="select">
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

    <script type="text/javascript">
    
    $(document).ready(function () {
     //Hitung pembelian Bahan Baku
     $("#jumlah").keyup(function () {
            let satuan_produk = $('#satuan_produk').val()
            let jumlah = $('#jumlah').val()
            $("#stok_masukan").val(jumlah * satuan_produk);
            let stok = $("#stok_masukan").val()
            $("#stok_masuk").val(stok);
            
            document.getElementById("stok_masuk").dispatchEvent(new Event('input'));
        }); 

    });
    </script>