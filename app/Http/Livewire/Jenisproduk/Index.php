<?php

namespace App\Http\Livewire\Jenisproduk;

use App\Models\JenisProduk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    public $kode_jenis_produk;
    public $jenis_produk;

    protected $rules = [
        'kode_jenis_produk' => 'required',
        'jenis_produk' => 'required',

    ];
    protected $messages = [
        'kode_jenis_produk.required' => 'Barcode tidak boleh kosong.',
        'jenis_produk.required' => 'Jenis Produk tidak boleh kosong.',

    ];
    public function ClearForm()
    {
        $this->kode_jenis_produk = '';
        $this->jenis_produk = '';
    }


    public function DetailData($kode_jenis_produk)
    {
        $jenisproduk = JenisProduk::where('kode_jenis_produk', $kode_jenis_produk)->first();
        $this->kode_jenis_produk = $jenisproduk->kode_jenis_produk;
        $this->jenis_produk = $jenisproduk->jenis_produk;
    }

    public function Update()
    {
        $validasi = $this->validate();
        $jenisproduk = [

            'kode_jenis_produk' => $this->kode_jenis_produk,
            'jenis_produk' => $this->jenis_produk,

        ];
        JenisProduk::where('kode_jenis_produk', $this->kode_jenis_produk)->Update($jenisproduk);

        session()->flash('pesan1', 'Data berhasil di edit');
        $this->Clearform();
        $this->emit('updateModal');
    }

    public function delete()
    {

        JenisProduk::where('kode_jenis_produk', $this->kode_jenis_produk)->delete();
        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }


    public function render()
    {
        $jenisproduk = DB::table('tb_jenis_produk')->get();
        return view('livewire.jenisproduk.index', ['jenisproduk' => $jenisproduk])->extends('template.app');
    }
}
