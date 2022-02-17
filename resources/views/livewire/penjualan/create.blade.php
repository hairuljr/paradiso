<div>
    <form method="POST" wire:submit.prevent="keranjang">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Penjualan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="/penjualan" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            {{-- <input id="id_cost" type="text" wire:model="id_cost" class="form-control" value="{{ $id_cost }}" readonly> --}}
                            <div class="col-sm-6">
                                <label>No Transaksi </label>
                                <div class="input-group mb-3">
                                    <input id="no_transaksi" type="text" class="form-control" wire:model="no_transaksi"
                                        readonly>
                                    @error('no_transaksi') <span class="error">{{ $message }}</span> @enderror
                                   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Tanggal </label>
                                    <div class="input-group mb-3">
                                        <input id="tgl_transaksi" type="date" class="form-control"
                                            wire:model="tgl_transaksi" >
                                        {{-- @error('nama_produk') <span class="error">{{ $message }}</span> @enderror --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- </form> --}}


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        {{-- <form> --}}
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Barcode</label>
                            <div class="col-md-5">
                                <input id="produk_kode" type="text" wire:model="kode_produk"
                                    class="form-control" readonly>
                                @error('kode_produk') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-2 col-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".ProdukModal">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input id="nama_produk" type="text" class="form-control"
                                    wire:model="nama_produk" readonly>
                                @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Jumlah </label>
                            <div class="col-sm-9">
                                <input min="1" id="jumlah" type="number" class="form-control" wire:model="jumlah" autofocus>
                                @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                     
                      
                        {{-- @foreach ($cost as $cs)
                            <input type="text" wire:model="bahan_baku_kode" value="{{ $cs->bahan_baku_kode}}">
                            <input type="text" wire:model="digunakan" value="{{ $cs->digunakan}}">
                        @endforeach --}}
                        
                        <div class="row mb-3">
                   
                            <div class="col-sm-9">
                             
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input id="harga_jual" type="text" class="form-control"
                                    wire:model="harga_jual" readonly>
                                @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Total</label>
                                <div class="col-sm-9">
                                    <input type="hidden" id="total" wire:model="total">
                                    <input id="total_masukan" type="text" class="form-control" readonly>
                            
                                    @error('cost') <span class="error">{{ $message }}</span> @enderror
                                </div>
                        </div>
                        <div class="row mb-1">
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div class="form-check mb-2">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md btnHitung">Hitung</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- @foreach ($produk as $dt)
        <input id="bahan_baku_kode_{{$dt->id}}" type="text" value="{{ $dt->bahan_baku_kode}}">
        @endforeach --}}
        {{-- @if ($bahan_baku_kode)
        @foreach ($bahan_baku_kode as $bh)
            <input id="bahan_baku_kode" type="text" wire:model="bahan_baku_kode">
            <input id="bahan_baku_kodes" type="text" value="{{ $bh->kode_bahan_baku}}">
        @endforeach
        @endif
      

        @if ($digunakan)
        @foreach ($digunakan as $bh)
            <input id="digunakan" type="text" wire:model="digunakan">
            <input id="digunakans" type="text" value="{{ $bh}}">
        @endforeach
        @endif --}}
      
    </form>
   
    {{-- @foreach ($cost as $cs)
    <input type="text" id="bahan_baku_kode">
  

    <input type="text" id="bahan_baku_kode" >
    @endforeach --}}
   
        
  

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                @if (session('pesan'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @if (session('pesan1'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan1')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @if (session('hapus'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('hapus')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table align-middle table-nowrap table-check">
                                <thead class=" -light">
                                    <tr>

                                        <th class="align-middle">No Transaksi</th>
                                        <th class="align-middle">Barcode</th>
                                        <th class="align-middle">Nama Produk</th>
                                        <th class="align-middle">Jumlah</th>
                                        <th class="align-middle">Total</th>
                                        <th class="align-middle">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subTotal =0;
                                    @endphp
                                    @foreach ($temp as $item)
                                        <tr>
                                            <td>{{ $item->no_trf }}</td>
                                            <td>{{ $item->produk_kode }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ rupiah($item->total) }}</td>
                                            <td>
                                                <a button class="text-danger"
                                                        wire:click="DetailDataKeranjang('{{ $item->produk_kode }}')"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                            class="mdi mdi-delete font-size-18"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $subTotal += $item->total;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-xl-6">
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3"> 
                                <label class="col-sm-3 col-form-label">Sub Total</label>
                                <div class="col-sm-9">
                                    <input value="{{ $subTotal }}" id="sub_total" wire:model="sub_total" type="hidden" class="form-control" readonly>
                                    <input value="{{ $subTotal }}" id="sub_total_masukan" type="text" class="form-control" readonly>
                                    @error('sub_total') <span class="error">{{ $message1 }}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-3"> 
                                <label class="col-sm-3 col-form-label">Bayar</label>
                                <div class="col-sm-9">
                                    <input id="bayar" type="text" class="form-control">
                                
                                </div>
                            </div>
                            <div class="row mb-3"> 
                                <label class="col-sm-3 col-form-label">Kembali</label>
                                <div class="col-sm-9">
                                    <input id="kembali" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    {{-- Modal  Bahan Baku--}}
    {{-- <div wire:ignore.self class="modal fade BahanBakuMasukModal" id="modal-item" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Data Bahan Baku</h5>
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
                                    <th class="align-middle">Stok</th>
                                    <th class="align-middle">Isi Satuan</th>
                                    <th class="align-middle">Satuan</th>
                                    <th class="align-middle">Harga</th>
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($bahanbaku as $bb)
                                <tr>


                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bb->kode_bahan_baku}}</td>
                                    <td>{{ $bb->nama_bahan_baku}}</td>
                                    <td>{{ $bb->persediaan}}</td>
                                    <td>{{ $bb->satuan_produk}}</td>
                                    <td>{{ $bb->satuan}}</td>
                                    <td>{{ $bb->harga}}</td>

                                    <td>
                                        <button wire:click.prevent="SelectData('{{$bb->kode_bahan_baku}}')"
                                            class="btn btn-xs btn-info" id="select">
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
    </div> --}}

    {{-- Modal Produk  --}}
   <div wire:ignore.self class="modal fade ProdukModal" id="modal-item1" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Barcode</th>
                                    <th class="align-middle">Nama</th>
                                    {{-- <th class="align-middle">Jenis Produk</th> --}}
                                    <th class="align-middle">Harga Jual</th>

                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>


                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($produk as $dt)
                                <tr>


                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->produk->kode_produk}}</td>
                                    <td>{{ $dt->produk->nama_produk}}</td>
                                    <td>{{ rupiah($dt->detailCost->harga_jual)}}</td>
                                    
                                   
                                  
                                    {{-- <input id="bahan_baku_kodes_{{ $dt->id }}" type="text"  value="{{ $dt->bahan_baku_kode}}">
                                    <input id="digunakans_{{ $dt->id }}" type="text"  value="{{ $dt->digunakan}}"> --}}
                                   
                                    <td>
                                        <button wire:click.prevent="SelectData1('{{$dt->produk_kode}}')"
                                            class="btn btn-xs btn-info" id="select1">
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

    {{-- Modal Delete Keranjang --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <button type="submit" class="btn btn-danger" wire:click.prevent="DeleteKeranjang()">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>

</div>


<script type="text/javascript">
    
    $(document).ready(function () {    

     //Hitung pembelian Bahan Baku
        $("#jumlah").keyup(function () {
            let harga_jual = $('#harga_jual').val()
            let jumlah = $('#jumlah').val()
            $("#total_masukan").val(jumlah * harga_jual);
            let total = $("#total_masukan").val()
            $("#total").val(total);            
            document.getElementById("total").dispatchEvent(new Event('input'));
        });

        $("#bayar").keyup(function () {
            var total = $("#sub_total_masukan").val();
            $("#kembali").val($(this).val()-total);
        });

    });
    </script>