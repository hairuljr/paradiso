<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">PENJUALAN</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <a href="/penjualan" type="submit" class="btn btn-secondary waves-effect waves-light">Back</a>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>No Transaksi </label>
                            <div class="input-group mb-3">
                                <div class="col-sm-9">
                                    <input type="hidden" id="no_transaksi" wire:model="no_transaksi">
                                    <input type="text" id="no_transaksi_masukan" class="form-control"
                                        value="{{$penjualan}}" readonly>
                                    {{-- <input type="text"wire:model="no_transaksi" class="form-control" value="{{$penjualan}}"
                                    readonly> --}}
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Tanggal </label>
                                <div class="input-group mb-3">
                                    <input id="tgl_transaksi" type="date" class="form-control"
                                        wire:model="tgl_transaksi">
                                    @error('tgl_transaksi') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
               
            </div>
            <div class="card">
                <div class="card-body">
                  
                 
                    <div class="table-responsive">
                        <table id="example" class="table align-middle table-nowrap table-check">
                            <thead class=" table-light">
                                <tr>
                                    <th class="align-middle">Nama Produk</th>
                                    <th class="align-middle">Jumlah</th>
                                    <th class="align-middle">Total</th>
                                    <th class="align-middle">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sub_total =0;
                                @endphp
                                @foreach ($temp as $item)
                                <tr>


                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ rupiah($item->total) }}</td>
                                    <td>
                                        <a button class="text-danger"
                                            wire:click="DetailDataKeranjang('{{ $item->produk_kode }}')"
                                            ><i class="mdi mdi-delete font-size-18"></i></a>

                                    </td>
                                </tr>
                                @php
                                $sub_total += $item->total;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" wire:submit.prevent="keranjang">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Barcode </label>
                                <div class="input-group mb-3">
                                    <input id="produk_kode" type="text" class="form-control" wire:model="kode_produk"
                                        readonly>
                                  
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".ProdukModal">Cari</button>
                                    </div>
                                    @error('kode_produk') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <label>jumlah </label>
                                <div class="input-group mb-2">
                                    <input id="jumlah" type="text" class="form-control" wire:model="jumlah" autofocus>
                                    @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <label>Harga </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Rp.</span>
                                    </div>
                                    <input id="harga_jual" type="text" class="form-control" wire:model="harga_jual"
                                        readonly>
                                    @error('harga_jual') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>Nama Produk</label>
                                <div class="input-group mb-3">
                                    <input id="nama_produk" type="text" class="form-control" wire:model="nama_produk"
                                        readonly autofocus>
                                        @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <label>Total </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Rp.</span>
                                    </div>
                                    <input type="hidden" id="total" wire:model="total">
                                    <input id="total_masukan" type="text" class="form-control" readonly>
                                    @error('total') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <br>

                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-success w-md btnHitung">Hitung</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div wire:ignore.self class="modal fade ProdukModal" id="modal-item1" tabindex="-1" role="dialog"
                    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-l">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myExtraLargeModalLabel">Data Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input wire:model="searchQuery" type="text" class="form-control" placeholder="Cari Nama Produk">
                                               
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="datatable" class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Nama</th>
                                                <th class="align-middle">Harga Jual</th>

                                                <th class="align-middle">Actions</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($produk as $dt)
                                            <tr>


                                                <td>{{ $no++ }}</td>
                                                {{-- <td>{{ $dt->produk->kode_produk}}</td> --}}
                                                <td>{{ $dt->produk->nama_produk}}</td>
                                                <td>{{ rupiah($dt->Cost->harga_jual)}}</td>



                                                {{-- <input id="bahan_baku_kodes_{{ $dt->id }}" type="text"
                                                value="{{ $dt->bahan_baku_kode}}">
                                                <input id="digunakans_{{ $dt->id }}" type="text"
                                                    value="{{ $dt->digunakan}}"> --}}

                                                <td>
                                                    <button wire:click.prevent="SelectData1('{{$dt->produk_kode}}')"
                                                        class="btn btn-primary btn-sm btn-rounded" id="select1">
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
                {{-- <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda ingin mengahapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger"
                                    wire:click.prevent="DeleteKeranjang()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <input type="hidden" id="transaksi_no" wire:model="transaksi_no">
                            <input type="hidden" id="transaksi_no_masukan" class="form-control" value="{{$penjualan}}"
                                readonly>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Sub Total </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Rp.</span>
                                        </div>
                                        <input id="sub_total" wire:model="sub_total" type="hidden" readonly>
                                        <input value="{{ $sub_total }}" id="sub_total_masukan" type="text"
                                            class="form-control" readonly>
                                        @error('sub_total') <span class="error">{{ $message1 }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Bayar </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Rp.</span>
                                        </div>
                                        <input id="bayar" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label>Kembali </label>
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Rp.</span>
                                        </div>
                                        <input id="kembali" type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function () {
        let no_tr = $("#no_transaksi_masukan").val()
        $("#no_transaksi").val(no_tr);
        let tr_no = $("#transaksi_no_masukan").val()
        $("#transaksi_no").val(tr_no);

        document.getElementById("no_transaksi").dispatchEvent(new Event('input'));
        document.getElementById("transaksi_no").dispatchEvent(new Event('input'));

        $("#sub_total_masukan").val();
        let sub_total = $('#sub_total_masukan').val()
        $("#sub_total").val(sub_total);

        document.getElementById("sub_total").dispatchEvent(new Event('input'));

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
            $("#kembali").val($(this).val() - total);




            // $("#sub_total_masukan").val();
            // let sub_total = $("#sub_total_masukan").val()
            // $("#sub_total").val(sub_total);

            // document.getElementById("sub_total").dispatchEvent(new Event('input'));
        });

    });

</script>
