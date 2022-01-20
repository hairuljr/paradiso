<?php

namespace App\Http\Livewire\Jenisproduk;

use Livewire\Component;
use App\Models\JenisProduk;

class Create extends Component
{

    // public $kode_jenis_produk;
    public $jenis_produk;


    protected $rules = [
        // 'kode_jenis_produk' => 'required',
        'jenis_produk' => 'required',

    ];
    protected $messages = [
        'kode_jenis_produk.required' => 'Barcode tidak boleh kosong.',
        'jenis_produk.required' => 'Jenis Produk tidak boleh kosong.',


    ];

    public function save()
    {

        $validasi = $this->validate();

        JenisProduk::create($validasi, [

            // 'kode_jenis_produk' => $this->kode_jenis_produk,
            'jenis_produk' => $this->jenis_produk,


        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('jenisproduk');
    }

    public function render()
    {
        return view('livewire.jenisproduk.create')->extends('template.app');
    }
}
