<div>
    <div>

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Laporan Bahan Baku Keluar</h4>
                   
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
                                <div class="text-sm-start">
                                    <a wire:click="cetak" href="#" type="button"
                                        class="btn btn-primary btn-rounded waves-effect waves-light mb-1 me-1"><i
                                            class="mdi mdi-printer-settings me-1"></i> Print</a>
                                </div>
                            </div><!-- end col-->
                        </div>
                      
                        <div class="table-responsive">
                            <table id="example" class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">No</th>
                                        <th class="align-middle">Tanggal</th>
                                        <th class="align-middle">Barcode</th>
                                        <th class="align-middle">Nama Bahan Baku</th>
                                        <th class="align-middle">Jumlah Keluar</th>
                                    
                                       
                                     
    
                                    </tr>
                                </thead>
    
    
                                <tbody>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $bbm)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $bbm->penjualan?->tgl_transaksi }}</td>
                                                <td>{{ $bbm->bahan_baku_kode }}</td>
                                                <td>{{ $bbm->bahanbaku?->nama_bahan_baku }}</td>
                                                <td>{{ $bbm->jumlah }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    
    
          
    </div>
    
</div>
