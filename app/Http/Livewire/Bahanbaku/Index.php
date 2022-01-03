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

    public function ClearForm()
    {
        $this->kode_bahan_baku = '';
        $this->nama_bahan_baku = '';
        $this->persediaan = '';
        $this->satuan = '';
        $this->harga_beli = '';
        $this->satuan_produk = '';
    }


    public function DetailData($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        $this->kode_bahan_baku = $bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        $this->persediaan = $bahanbaku->persediaan;
        $this->satuan = $bahanbaku->satuan;
        $this->harga_beli = $bahanbaku->harga_beli;
        $this->satuan_produk = $bahanbaku->satuan_produk;
    }

    public function Update()
    {
        $validasi = $this->validate();
        $bahanbaku = [

            'nama_bahan_baku' => $this->nama_bahan_baku,
            'persediaan' => $this->persediaan,
            'satuan' => $this->satuan,
            'harga_beli' => $this->harga_beli,
            'satuan_produk' => $this->satuan_produk
        ];
        BahanBaku::where('kode_bahan_baku', $this->kode_bahan_baku)->Update($bahanbaku);

        session()->flash('pesan1', 'Data berhasil di edit');
        $this->Clearform();
        $this->emit('updateModal');
    }

    public function delete()
    {

        BahanBaku::where('kode_bahan_baku', $this->kode_bahan_baku)->delete();
        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }




    public function render()
    {
        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.bahanbaku.index', ['bahanbaku' => $bahanbaku])->extends('template.app');
    }
}
