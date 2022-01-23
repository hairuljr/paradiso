<?php

namespace App\Http\Livewire\Produk;

use App\Models\JenisProduk;
use App\Models\Produk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{

    public $produk;
    // public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    public $harga_satuan;

    public $jenis_produk;
    public $kode_jenis_produk;

    protected $rules = [
        // 'kode_produk' => 'required',
        'nama_produk' => 'required',
        'jenis_produk_kode' => 'required',
        'harga_satuan' => 'required',

    ];
    protected $messages = [
        'kode_produk.required' => 'Barcode tidak boleh kosong.',
        'nama_produk.required' => 'Nama Produk tidak boleh kosong.',
        'jenis_produk_kode.required' => 'Jenis Produk tidak boleh kosong.',
        'harga_satuan.required' => 'Harga tidak boleh kosong.',


    ];

    public function mount()
    {
        $this->jenisproduk = JenisProduk::orderBy('jenis_produk')->get();
    }

    public function save()
    {

        $validasi = $this->validate();

        Produk::create($validasi, [

            // 'kode_produk' => $this->kode_produk,
            'nama_produk' => $this->nama_produk,
            'jenis_produk_kode' => $this->jenis_produk_kode,
            'harga_satuan' => $this->harga_satuan,


        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('produk');
    }

    public function render()
    {

        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();

        return view('livewire.produk.create', ['produk' => $produk])->extends('template.app');
    }
}
