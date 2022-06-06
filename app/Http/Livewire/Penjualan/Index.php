<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $no_transaksi;
    public $detailTransaksi;
    public $tgl_transaksi;

    public $sub_total;

    public function DetailData($no_transaksi)
    {
        $penjualan = DetailPenjualan::with('penjualan')->where('transaksi_no', $no_transaksi)->get();
        $this->detailTransaksi = $penjualan;
    }
    public function render()
    {

        $penjualan = DB::table('tb_penjualan')->get();
        $detailTransaksi = DB::table('tb_detail_penjualan')->get();
        return view('livewire.penjualan.index', [

            'penjualan' => $penjualan, $detailTransaksi
        ])
            ->extends('template.app');;
    }
}
