<?php

namespace App\Http\Livewire\Bahanbakumasuk;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\BahanBakuMasuk;
use Illuminate\Support\Facades\DB;

class Create extends Component
{

    public $bahan_baku_kode;
    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $jumlah;
    public $harga;

    public $satuan;

    protected $rules = [
        'bahan_baku_kode' => 'required',
        'nama_bahan_baku' => 'required',
        'jumlah' => 'required',
        'satuan' => 'required',
        'harga' => 'required',

    ];
    protected $messages = [
        'bahan_baku_kode.required' => 'Barcode tidak boleh kosong.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'jumlah.required' => 'Jumlah tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'harga.required' => 'Harga tidak boleh kosong.',


    ];


    public function SelectData($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        $this->bahan_baku_kode = $bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        $this->persediaan = $bahanbaku->persediaan;
        $this->satuan = $bahanbaku->satuan;
        $this->harga_beli = $bahanbaku->harga_beli;
        $this->satuan_produk = $bahanbaku->satuan_produk;
    }


    public function save()
    {
        $validasi = $this->validate();

        BahanBakuMasuk::create($validasi, [

            'bahan_baku_kode' => $this->bahan_baku_kode,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('bahanbakumasuk');
    }


    public function render()
    {


        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.bahanbakumasuk.create', ['bahanbaku' => $bahanbaku])->extends('template.app');
    }
}
