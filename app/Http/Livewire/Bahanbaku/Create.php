<?php

namespace App\Http\Livewire\Bahanbaku;

use Livewire\Component;
use App\Models\BahanBaku;

class Create extends Component
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

    public function save()
    {

        $validasi = $this->validate();

        BahanBaku::create($validasi, [

            'kode_bahan_baku' => $this->kode_bahan_baku,
            'nama_bahan_baku' => $this->nama_bahan_baku,
            'persediaan' => $this->persediaan,
            'satuan' => $this->satuan,
            'harga_beli' => $this->harga_beli,
            'satuan_produk' => $this->satuan_produk

        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('bahanbaku');
    }


    public function render()
    {
        return view('livewire.bahanbaku.create')->extends('template.app');
    }
}
