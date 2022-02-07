<?php

namespace App\Http\Livewire\Cgs;

use App\Models\Produk;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Sementara;
use App\Models\Temporary;
use Illuminate\Support\Facades\DB;

class Create extends Component
{

    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $persediaan;
    public $satuan;
    public $satuan_produk;


    public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    public $jenis_produk;
    public $harga_satuan;


    public $produk_kode;
    public $bahan_baku_kode;
    public $harga;
    public $digunakan;
    public $cost;
    public $total_cgs;
    public $harga_jual;
    public $profit;



    protected $rules = [
        'produk_kode' => 'required',
        'nama_produk' => 'required',
        'bahan_baku_kode' => 'required',
        'nama_bahan_baku' => 'required',
        'harga' => 'required',
        'satuan_produk' => 'required',
        'satuan' => 'required',
        'digunakan' => 'required',
        'cost' => 'required',
        'total_cgs' => 'required',
        'harga_jual' => 'required',
        'profit' => 'required',

    ];

    protected $messages = [
        'produk_kode.required' => 'Barcode tidak boleh kosong.',
        'nama_produk.required' => 'Nama Produk tidak boleh kosong.',
        'bahan_baku_kode.required' => 'Barcode tidak boleh kosong.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'harga.required' => 'Harga tidak boleh kosong.',
        'satuan_produk.required' => 'Isi Satuan tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'digunakan.required' => 'Digunakan Masuk tidak boleh kosong.',
        'cost.required' => 'Cost tidak boleh kosong.',
        'total_cgs.required' => 'Total Cgs tidak boleh kosong.',
        'harga_jual.required' => 'Harga Jual tidak boleh kosong.',
        'proft.required' => 'Profit tidak boleh kosong.',


    ];

    public function SelectData($kode_bahan_baku)
    {
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        $this->bahan_baku_kode = $bahanbaku->kode_bahan_baku;
        $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        $this->persediaan = $bahanbaku->persediaan;
        $this->satuan = $bahanbaku->satuan;
        $this->satuan_produk = $bahanbaku->satuan_produk;
    }

    public function SelectData1($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->first();
        $this->produk_kode = $produk->kode_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->jenis_produk_kode = $produk->jenis_produk_kode;
        $this->harga_satuan = $produk->harga_satuan;
    }



    public function keranjang()
    {
        $validasi = $this->validate();

        Sementara::create($validasi, [

            'produk_kode' => $this->produk_kode,
            'nama_produk' => $this->nama_produk,
            'bahan_baku_kode' => $this->bahan_baku_kode,
            'nama_bahan_baku' => $this->nama_bahan_baku,
            'cost' => $this->cost,

        ]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('/cost/create');
    }




    public function render()
    {


        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();

        $bahanbaku = DB::table('tb_bahan_baku')->get();
        $sementara = Sementara::all();

        // $temporaries = Temporary::all();

        return view(
            'livewire.cgs.create',
            [
                'produk' => $produk,
                'bahanbaku' => $bahanbaku,
                'sementara' => $sementara
            ]
        )
            ->extends('template.app');
    }
}
