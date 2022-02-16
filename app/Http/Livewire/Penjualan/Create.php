<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\BahanBaku;
use App\Models\Cost;
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
    public $nama_bahan_baku;
    public $persediaan;
    public $satuan;
    public $satuan_produk;
    public $harga;
    public $bahan_baku_kode;
    public $digunakan;
    public $kode_bahan_baku;
    public $gunakan;
    public $total;


    public function SelectData1($produk_kode)
    {

        $datanya = Cost::with(['produk', 'detailCost'])->where('produk_kode', $produk_kode)->first();
        $this->produk_kode = $datanya->produk_kode;
        $this->nama_produk = $datanya->produk->nama_produk;
        $this->harga_jual = $datanya->detailCost->harga_jual;
        $this->bahan_baku_kode = $datanya->bahan_baku_kode;
        $this->digunakan = $datanya->digunakan;

        $kode = Cost::where('produk_kode', $produk_kode)
            ->pluck('bahan_baku_kode');
        $bahan_baku_kode = BahanBaku::whereIn('kode_bahan_baku', $kode)->get();
        $this->bahan_baku_kode = $bahan_baku_kode;


        $digunakan = Cost::where('produk_kode', $produk_kode)
            ->pluck('digunakan');
        $this->digunakan = $digunakan;
    }


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

        // query join 3 tbl
        $datanya = Cost::with(['produk', 'detailCost'])
            ->groupBy('produk_kode')
            ->get();
        // $datanya->first()->bahan_baku_kode;
        // $datanya->first()->produk->nama_produk;
        // $datanya->first()->detailCost->harga_jual;

        return view(
            'livewire.penjualan.create',
            [
                'penjualan' => $penjualan,
                'sementara' => $sementara,
                'cost' => $cost,
                'produk' => $datanya,

                'detailCost' => $datanya
                // 'bahan' => $this->bahan_baku_kode


            ]
        )->extends('template.app');
    }
}
