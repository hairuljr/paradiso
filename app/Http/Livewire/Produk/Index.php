<?php

namespace App\Http\Livewire\Produk;

use App\Models\Produk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    public $harga_satuan;


    protected $rules = [
        'kode_produk' => 'required',
        'nama_produk' => 'required',
        // 'jenis_produk_kode' => 'required',
        'harga_satuan' => 'required',

    ];
    protected $messages = [
        'kode_produk.required' => 'Barcode tidak boleh kosong.',
        'nama_produk.required' => 'Nama Produk tidak boleh kosong.',
        // 'jenis_produk_kode.required' => 'Jenis Produk tidak boleh kosong.',
        'harga_satuan.required' => 'Harga Satuan tidak boleh kosong.',


    ];

    public function ClearForm()
    {
        $this->kode_produk = '';
        $this->nama_produk = '';
        $this->jenis_produk_kode = '';
        $this->harga_satuan = '';
    }


    public function DetailData($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->first();
        $this->kode_produk = $produk->kode_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->jenis_produk_kode = $produk->jenis_produk_kode;
        $this->harga_satuan = $produk->harga_satuan;
    }

    public function Update()
    {
        $validasi = $this->validate();
        $produk = [

            'kode_produk' => $this->kode_produk,
            'nama_produk' => $this->nama_produk,
            'jenis_produk_kode' => $this->jenis_produk_kode,
            'harga_satuan' => $this->harga_satuan,

        ];
        Produk::where('kode_produk', $this->kode_produk)->Update($produk);

        session()->flash('pesan1', 'Data berhasil di edit');
        $this->Clearform();
        $this->emit('updateModal');
    }

    public function delete()
    {

        Produk::where('kode_produk', $this->kode_produk)->delete();
        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }

    public function render()
    {
        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();

        return view('livewire.produk.index', ['produk' => $produk])->extends('template.app');
    }
}
