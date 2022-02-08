<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $no_transaksi;
    public $tgl_transaksi;
    public $jumlah;
    public $sub_total;



    public function render()
    {
        $produk = DB::table('tb_produk');
        $sementara = DB::table('tb_sementara');
        $penjualan = DB::table('tb_penjualan')

            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_penjualan.produk_kode'

            )->get();
        $cost = DB::table('tb_cost')

            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_cost.produk_kode'

            )->get();


        return view(
            'livewire.penjualan.create',
            [
                'penjualan' => $penjualan,
                'sementara' => $sementara,
                'cost' => $cost,
                'produk' => $produk
            ]
        )->extends('template.app');
    }
}
