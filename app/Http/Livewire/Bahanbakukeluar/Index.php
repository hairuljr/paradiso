<?php

namespace App\Http\Livewire\Bahanbakukeluar;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $bahanbakukeluar  = DB::table('tb_bahan_baku_keluar')->join(
            'tb_penjualan',
            'tb_penjualan.no_transaksi',
            '=',
            'tb_bahan_baku_keluar.transaksi_no'
        )->join(
            'tb_bahan_baku',
            'tb_bahan_baku.kode_bahan_baku',
            '=',
            'tb_bahan_baku_keluar.bahan_baku_kode'

        )->get();
        return view('livewire.bahanbakukeluar.index', ['bahanbakukeluar' => $bahanbakukeluar])->extends('template.app');
    }
}
