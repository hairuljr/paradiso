<?php

namespace App\Http\Livewire\Bahanbaku;

use Livewire\Component;
use App\Models\BahanBaku;

class Create extends Component
{
    // public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $persediaan = 0;
    public $satuan;
    public $satuan_produk;
    // public $harga;



    protected $rules = [
        // 'kode_bahan_baku' => 'required',
        'nama_bahan_baku' => 'required',
        'persediaan' => 'required',
        'satuan' => 'required',
        'satuan_produk' => 'required',
        // 'harga' => 'required'
    ];
    protected $messages = [
        'kode_bahan_baku.required' => 'Barcode tidak boleh kosong.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'persediaan.required' => 'Persediaan tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'satuan_produk.required' => 'Isi Satuan tidak boleh kosong.',
        // 'harga.required' => 'Harga tidak boleh kosong.',

    ];

    public function save()
    {

        $validasi = $this->validate();

        BahanBaku::create($validasi, [
            // 'kode_bahan_baku' => $this->kode_bahan_baku,
            'nama_bahan_baku' => $this->nama_bahan_baku,
            'persediaan' => $this->persediaan,
            'satuan_produk' => $this->satuan_produk,
            'satuan' => $this->satuan,
            // 'harga' => $this->harga
        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('bahanbaku');
    }


    public function render()
    {
        return view('livewire.bahanbaku.create')->extends('template.app');
    }
}
