<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\Produk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $no_transaksi;
    public $tgl_transaksi;
    public $jumlah;
    public $sub_total;

    // public $produk;
    public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    // public $harga_satuan;

    public $jenis_produk;
    public $kode_jenis_produk;



    public function render()
    {
        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();
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
