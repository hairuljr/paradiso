<?php

namespace App\Http\Livewire\Bahanbakumasuk;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\BahanBakuMasuk;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $searchQuery;
    public $bahan_baku_kode;
    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $jumlah;
    public $stok_masuk;
    public $harga;
    public $satuan_produk;
    public $satuan;
    public $persediaan;

    protected $rules = [
        'bahan_baku_kode' => 'required',
        'nama_bahan_baku' => 'required',
        'jumlah' => 'required|numeric',
        'satuan_produk' => 'required',
        'satuan' => 'required',
        'stok_masuk' => 'required',
        'harga' => 'required|numeric',

    ];



    protected $messages = [
        'bahan_baku_kode.required' => 'Barcode tidak boleh kosong.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'jumlah.numeric' => 'Jumlah tidak boleh selain angka.',
        'jumlah.required' => 'Jumlah tidak boleh kosong.',
        'satuan_produk.required' => 'Isi Satuan tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'stok_masuk.required' => 'Stok Masuk tidak boleh kosong.',
        'harga.required' => 'Harga tidak boleh kosong.',
        'harga.numeric' => 'Jumlah tidak boleh selain angka.',


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

    public function mount()
    {
        $this->searchQuery = '';
    }

    public function save()
    {
        $validasi = $this->validate();

        BahanBakuMasuk::create([

            'bahan_baku_kode' => $this->bahan_baku_kode,
            'tgl_transaksi' => now(),
            'user_id' => auth()->id(),
            'stok_masuk' => $this->stok_masuk,
            'harga' => $this->harga,
        ]);

        // $bahan_baku_kode = BahanBakuMasuk::where('bahan_baku_kode')->get();
        $kode = $this->bahan_baku_kode;
        $bahanBaku = BahanBaku::where('kode_bahan_baku', $kode)->first();

        if ($bahanBaku) {

            $bahanBaku->update([
                'persediaan' => $bahanBaku->persediaan + $this->stok_masuk
            ]);
        }
        // dd($bahanBaku);

        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('bahanbakumasuk');
    }


    public function render()
    {

        $bahanbakumasuk = DB::table('tb_bahan_baku_masuk')->get();
        $bahanbaku = BahanBaku::when($this->searchQuery !== '', function ($query) {
            $query->where('nama_bahan_baku', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('nama_bahan_baku', 'DESC')->paginate(5);
        return view('livewire.bahanbakumasuk.create', ['bahanbaku' => $bahanbaku], ['bahanbakumasuk' => $bahanbakumasuk])->extends('template.app');
    }
}
