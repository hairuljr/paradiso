<?php

namespace App\Http\Livewire\Cost;

use App\Models\Produk;
use Livewire\Component;
use App\Models\BahanBaku;
use Illuminate\Support\Facades\DB;

class Create extends Component
{

    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $persediaan;
    public $satuan;
    public $satuan_produk;


    public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    public $jenis_produk;
    public $harga_satuan;

    public function SelectData($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        $this->bahan_baku_kode = $bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        $this->persediaan = $bahanbaku->persediaan;
        $this->satuan = $bahanbaku->satuan;
        $this->satuan_produk = $bahanbaku->satuan_produk;
    }

    public function SelectData1($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->first();
        $this->produk_kode = $produk->kode_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->jenis_produk_kode = $produk->jenis_produk_kode;
        $this->harga_satuan = $produk->harga_satuan;
    }

    public function render()
    {


        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();
        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.cost.create', ['produk' => $produk], ['bahanbaku' => $bahanbaku])->extends('template.app');
    }
}
