<?php

namespace App\Http\Livewire\Laporanbahanbakukeluar;

use PDF;
use Livewire\Component;
use App\Models\BahanBakuKeluar;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function cetak()
    {
        $bahanbakukeluar  = BahanBakuKeluar::with(['bahanbaku', 'penjualan'])->get();
        $data = PDF::loadview('components.laporan-bahan-baku-keluar-pdf', ['data' => $bahanbakukeluar])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($data),
            "laporan-bahan-baku-keluar.pdf"
        );
    }

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
        return view('livewire.laporanbahanbakukeluar.index', ['bahanbakukeluar' => $bahanbakukeluar])->extends('template.app');
    }
}
