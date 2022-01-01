<?php

namespace App\Http\Livewire\Bahanbaku;

use App\Models\BahanBaku;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $persediaan;
    public $satuan;
    public $harga_beli;
    public $satuan_produk;


    protected $rules = [
        'kode_bahan_baku' => 'required',
        'nama_bahan_baku' => 'required',
        'persediaan' => 'required',
        'satuan' => 'required',
        'harga_beli' => 'required',
        'satuan_produk' => 'required'
    ];
    protected $messages = [
        'kode_bahan_baku.required' => 'Barcode tidak boleh kosong.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'persediaan.required' => 'Persediaan tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'harga_beli.required' => 'Harga tidak boleh kosong.',
        'satuan_produk.required' => 'Satuan tidak boleh kosong.',

    ];



    public function DetailData($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        $this->kode_bahan_baku = $bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        $this->persediaan = $bahanbaku->persediaan;
        $this->harga_beli = $bahanbaku->harga_beli;
        $this->satuan_produk = $bahanbaku->satuan_produk;
    }

    public function delete($kode_bahan_baku)
    {

        $bahanbaku = BahanBaku::find($kode_bahan_baku);

        if ($bahanbaku) {
            $bahanbaku->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('bahanbaku');
    }

    public function edit($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::findOrFail($kode_bahan_baku);

        $this->kode_bahan_baku->$bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku->$bahanbaku->nama_bahan_baku;
        $this->persediaan->$bahanbaku->persediaan;
        $this->satuan->$bahanbaku->satuan;
        $this->harga_beli->$bahanbaku->harga_beli;
        $this->satuan_produk->$bahanbaku->satuan_produk;

        return redirect('bahanbaku');
    }


    public function render()
    {
        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.bahanbaku.index', ['bahanbaku' => $bahanbaku])->extends('layouts.skote-admin');
    }
}
