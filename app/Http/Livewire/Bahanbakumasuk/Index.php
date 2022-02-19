<?php

namespace App\Http\Livewire\Bahanbakumasuk;

use Livewire\Component;
use App\Models\BahanBakuMasuk;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    public $bahan_baku_kode;
    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $jumlah;
    public $harga;
    public $satuan;
    public $stok_masuk;

    protected $rules = [
        'bahan_baku_kode' => 'required',
        'jumlah' => 'required',
        'harga' => 'required',

    ];

    protected $messages = [
        'bahan_baku_kode.required' => 'Barcode tidak boleh kosong.',
        'jumlah.required' => 'Jumlah tidak boleh kosong.',
        'harga.required' => 'Harga tidak boleh kosong.',
    ];

    public function ClearForm()
    {
        $this->bahan_baku_kode = '';
        $this->jumlah = '';
        $this->harga = '';
    }

    public function DetailData($bahan_baku_kode)
    {
        $bahanbakumasuk = DB::table('tb_bahan_baku_masuk')
            ->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )
            ->where('bahan_baku_kode', $bahan_baku_kode)->first();

        $this->bahan_baku_kode = $bahanbakumasuk->bahan_baku_kode;
        $this->nama_bahan_baku = $bahanbakumasuk->nama_bahan_baku;
        $this->satuan_produk = $bahanbakumasuk->satuan_produk;
        $this->satuan = $bahanbakumasuk->satuan;
        $this->stok_masuk = $bahanbakumasuk->stok_masuk;
        $this->harga = $bahanbakumasuk->harga;
    }

    public function Update()
    {
        $validasi = $this->validate();
        $bahanbakumasuk = [

            'bahan_baku_kode' => $this->bahan_baku_kode,
            'stok_masuk' => $this->stok_masuk,
            'harga' => $this->harga,

        ];
        BahanBakuMasuk::where('bahan_baku_kode', $this->bahan_baku_kode)->Update($bahanbakumasuk);

        session()->flash('pesan1', 'Data berhasil di edit');
        $this->Clearform();
        $this->emit('updateModal');
    }

    public function delete()
    {

        BahanBakuMasuk::where('bahan_baku_kode', $this->bahan_baku_kode)->delete();
        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }

    public function render()
    {


        $bahanbakumasuk = DB::table('tb_bahan_baku_masuk')
            ->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )
            ->get();
        return view('livewire.bahanbakumasuk.index', ['bahanbakumasuk' => $bahanbakumasuk])->extends('template.app');
    }
}
