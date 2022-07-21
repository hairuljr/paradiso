<div>
    <div>

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laporan Bahan Baku Masuk</h4>
                   
                </div>
            </div>
        </div>
        <!-- end page title -->
    
    
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
    
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                @if (session('pesan'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                @if (session('pesan1'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('pesan1')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                @if (session('hapus'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{ session('hapus')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    {{-- <div class="position-relative">
                                        <input wire:model="search" type="text" class="form-control"
                                            placeholder="Cari Nama Bahan Baku">
    
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a wire:click="cetak" href="#" type="button"
                                        class="btn btn-primary btn-rounded waves-effect waves-light mb-1 me-1"><i
                                            class="mdi mdi-printer-settings me-1"></i> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">No</th>
                                        <th class="align-middle">Barcode</th>
                                        <th class="align-middle">Nama Bahan Baku</th>
                                        <th class="align-middle">Tanggal</th>
                                        <th class="align-middle">Stok Masuk</th>
                                        <th class="align-middle">Satuan</th>
                                        <th class="align-middle">Harga</th>
                                     
                                       
                                     
    
                                    </tr>
                                </thead>
    
    
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($bahanbakumasuk as $bbm)
                                        <tr>
                                            <td>{{ $no++ }}</td>
    
                                            <td>{{ $bbm->bahan_baku_kode }}</td>
                                            <td>{{ $bbm->nama_bahan_baku }}</td>
                                            <td>{{ $bbm->tgl_transaksi }}</td>
                                            {{-- <td>{{ $bbm->user->name }}</td> --}}
                                            <td>{{ $bbm->stok_masuk }}</td>
                                            <td>{{ $bbm->satuan }}</td>
                                            <td>{{ rupiah($bbm->harga) }}</td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    
    
      
    </div>
    
</div>
