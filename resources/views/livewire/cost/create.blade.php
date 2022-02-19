<div>
            <form method="POST" wire:submit.prevent="keranjang">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Cost Of Good Sold</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <a href="/cost" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
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
                                        <label>Barcode </label>
                                        <div class="input-group mb-3">
                                            <input id="produk_kode" type="text" class="form-control" wire:model="produk_kode"
                                                readonly>
                                            @error('produk_kode') <span class="error">{{ $message }}</span> @enderror
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target=".ProdukModal">Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Nama Produk </label>
                                            <div class="input-group mb-3">
                                                <input id="nama_produk" type="text" class="form-control"
                                                    wire:model="nama_produk" readonly>
                                                @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
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
                                        <input id="bahan_baku_kode" type="text" wire:model="bahan_baku_kode"
                                            class="form-control" readonly>
                                        @error('bahan_baku_kode') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-2 col-4">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target=".BahanBakuMasukModal">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input id="nama_bahan_baku" type="text" class="form-control"
                                            wire:model="nama_bahan_baku" readonly>
                                        @error('nama_bahan_baku') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"
                                        title="harga didapat dari harga beli bahan baku">Harga </label>
                                    <div class="col-sm-9">
                                        <input id="harga" type="number" class="form-control" wire:model="harga" autofocus
                                            readonly>
                                        @error('harga') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"
                                        title="isi satuan merupakan jumlah isi bahan baku yang dibeli, bisa berbentuk pcs, ml, grm">Isi
                                        Satuan</label>
                                    <div class="col-md-5">
                                        <input id="satuan_produk" type="text" class="form-control" wire:model="satuan_produk"
                                            readonly>
                                        @error('satuan_produk') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-md-15">
                                            <input type="text" wire:model="satuan" class="form-control" readonly>
                                            @error('satuan') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>           
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Digunakan</label>
                                        <div class="col-sm-9">
                                            <input type="text" wire:model="digunakan" class="form-control" id="digunakan">
                                            @error('digunakan') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Cost</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="cost" wire:model="cost">
                                            <input id="cost_masukan" type="text" class="form-control" readonly>
                                       
                                          
                                            @error('cost') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                </div>
                                <div class="row mb-4">
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div class="form-check mb-4">
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
            </form>

         
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
                                        <thead class="table-light">
                                            <tr>

                                                <th class="align-middle">Barcode Produk</th>
                                                <th class="align-middle">Nama Produk</th>
                                                <th class="align-middle">Barcode BB</th>
                                                <th class="align-middle">Nama Bahan Baku</th>
                                                <th class="align-middle">Cost</th>
                                                <th class="align-middle">Actions</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                            $total_cgs = 0;
                                            @endphp
                                            @foreach ($sementara as $sa)
                                            <tr>
                                                
                                                <td>{{ $sa->produk_kode}}</td>
                                                <td>{{ $sa->nama_produk}}</td>
                                                <td>{{ $sa->bahan_baku_kode}}</td>
                                                <td>{{ $sa->nama_bahan_baku}}</td>
                                               
                                                <td>{{ $sa->cost}}</td>
                                                <td>

            
                                                        <a button class="text-danger"
                                                            wire:click="DetailDataKeranjang('{{$sa->bahan_baku_kode}}')"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                                                class="mdi mdi-delete font-size-18"></i></a>
            
            
            
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                            $total_cgs += $sa->cost;
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
                        <div class="row mb-3">
                         
                            <div class="col-sm-9">
                            <input type="hidden" id="id_cost" wire:model="id_cost">
                            <input type="hidden" id="id_cost_masukan" class="form-control" value="{{$detailcost}}" readonly>

                            <input type="hidden" id="cost_id" wire:model="cost_id">
                            <input type="hidden" id="cost_id_masukan" class="form-control" value="{{$detailcost}}" readonly>

                          
                                {{-- @error('total_cgs') <span class="error">{{ $message1 }}</span> @enderror --}}
                            </div>
                        </div>
                        @foreach ($sementara as $sa)
                       
                        <input type="hidden" id="produk_kodes "wire:model="produk_kode">
                        <input type="hidden" id="produk_kode_masukan"  class="form-control" value="{{ $sa->produk_kode }}" readonly>

                        <input type="hidden" id="nama_produks" wire:model="nama_produk">
                        <input type="hidden" id="nama_produk_masukan" class="form-control" value="{{ $sa->nama_produk }}" readonly>

                        <input type="hidden" id="bahan_baku_kodes"  wire:model="bahan_baku_kode">
                        <input type="hidden" id="bahan_baku_kode_masukan" class="form-control" value="{{ $sa->bahan_baku_kode }}" readonly>

                        <input type="hidden" id="nama_bahan_bakus" wire:model="nama_bahan_baku">
                        <input type="hidden" id="nama_bahan_baku_masukan" class="form-control" value="{{ $sa->nama_bahan_baku }}" readonly>
                        
                        <input type="hidden" id="digunakan" class="form-control" value="{{ $sa->digunakan }}" readonly>

                        <input type="hidden" id="cost_masuk " wire:model="cost">
                        <input type="hidden" id="cost_masuk" class="form-control" value="{{ $sa->cost }}" readonly>
                        @endforeach
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                              
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Total Cgs</label>
                                    <div class="col-sm-9">
                                        <input id="total_cgs" type="hidden" wire:model="total_cgs" class="form-control" value="{{ $total_cgs }}" readonly>
                                        <input id="total_cgs_masukan" type="text" class="form-control" value="{{ $total_cgs }}" readonly>
                                      
                                        @error('total_cgs') <span class="error">{{ $message1 }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Harga Jual</label>
                                    <div class="col-sm-9">
                                        <input wire:model="harga_jual" id="hrg_jual" type="text" class="form-control">
                                        @error('total_cgs') <span class="error">{{ $message1 }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3"> 
                                    <label class="col-sm-3 col-form-label">Profit</label>
                                    <div class="col-sm-9">
                                        <input id="profit" wire:model="profit" type="hidden" class="form-control" readonly>
                                        <input id="profit_masukan" type="text" class="form-control" readonly>
                                        @error('profit') <span class="error">{{ $message1 }}</span> @enderror
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
            <div wire:ignore.self class="modal fade BahanBakuMasukModal" id="modal-item" tabindex="-1" role="dialog"
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
            </div>

            {{-- Modal Produk --}}
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
                                            <th class="align-middle">Jenis Produk</th>
                                            {{-- <th class="align-middle">Harga Satuan</th> --}}

                                            <th class="align-middle">Actions</th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            @php $no = 1; @endphp
                                            @foreach ($produk as $pk)


                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pk->kode_produk}}</td>
                                            <td>{{ $pk->nama_produk}}</td>
                                            <td>{{ $pk->jenis_produk}}</td>
                                            {{-- <td>{{ rupiah($pk->harga_satuan)}}</td> --}}
                                            <td>
                                                <button wire:click.prevent="SelectData1('{{$pk->kode_produk}}')"
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
        // Cost
        $("#digunakan").keyup(function () {
            // ---------------------------------------------------------------------
            let produk_kode = $("#produk_kode_masukan").val()
            $("#produk_kodes").val(produk_kode);

            let nama_produk = $("#nama_produk_masukan").val()
            $("#nama_produks").val(nama_produk);

            let bahan_baku_kode = $("#bahan_baku_kode_masukan").val()
            $("#bahan_baku_kodes").val(bahan_baku_kode);

            let nama_bahan_baku = $("#nama_bahan_baku_masukan").val()
            $("#nama_bahan_bakus").val(nama_bahan_baku);

            let cost1 = $("#cost_masuk").val()
            $("#cost").val(cost1);
           
            document.getElementById("produk_kode").dispatchEvent(new Event('input'));
            document.getElementById("nama_produk").dispatchEvent(new Event('input'));
            document.getElementById("bahan_baku_kode").dispatchEvent(new Event('input'));
            document.getElementById("nama_bahan_baku").dispatchEvent(new Event('input'));
            document.getElementById("cost").dispatchEvent(new Event('input'));
            // ---------------------------------------------------------------------
            // Hitung Cost
            let harga = $('#harga').val()
            let satuan_produk = $('#satuan_produk').val()
            let digunakan = $('#digunakan').val()
            $("#cost_masukan").val(harga / satuan_produk * digunakan);
            let cost = $("#cost_masukan").val()
            $("#cost").val(cost);

            document.getElementById("cost").dispatchEvent(new Event('input'));
        }); 


            // ---------------------------------------------------------------------
            let cost_id = $("#cost_id_masukan").val()
            $("#cost_id").val(cost_id);
            let id_cost = $("#id_cost_masukan").val()
            $("#id_cost").val(id_cost);

            document.getElementById("cost_id").dispatchEvent(new Event('input'));
            document.getElementById("id_cost").dispatchEvent(new Event('input'));
            // ---------------------------------------------------------------------
        // Hitung Profit
        $("#hrg_jual").keyup(function () {

            $("#total_cgs_masukan").val();
            let total_cgs = $('#total_cgs_masukan').val()
            $("#total_cgs").val(total_cgs);

            document.getElementById("total_cgs").dispatchEvent(new Event('input'));

            let hrg_jual = $('#hrg_jual').val()
            $("#profit_masukan").val(hrg_jual - total_cgs);
            let profit = $("#profit_masukan").val()
            $("#profit").val(profit);

            document.getElementById("profit").dispatchEvent(new Event('input'));

         
        });

          
    });

</script>