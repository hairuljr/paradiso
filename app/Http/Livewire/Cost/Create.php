<?php

namespace App\Http\Livewire\Cost;

use App\Models\Produk;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Cost;
use App\Models\DetailCost;
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
    // public $kode;
    public $cost_id;
    public $id_cost;



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


    ];

    protected $rules1 = [
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



    ];

    protected $messages1 = [

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
        $this->harga = $bahanbaku->harga;
    }

    public function SelectData1($kode_produk)
    {
        $produk = Produk::where('kode_produk', $kode_produk)->first();
        $this->produk_kode = $produk->kode_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->jenis_produk_kode = $produk->jenis_produk_kode;
        $this->harga_satuan = $produk->harga_satuan;
    }

    public function DetailDataKeranjang($produk_kode)
    {
        $sementara = Sementara::where('produk_kode', $produk_kode)->first();
        $this->produk_kode = $sementara->produk_kode;
        $this->nama_produk = $sementara->nama_produk;
        $this->bahan_baku_kode = $sementara->bahan_baku_kode;
        $this->nama_bahan_baku = $sementara->nama_bahan_baku;
        $this->cost = $sementara->cost;
    }

    public function DeleteKeranjang()
    {

        Sementara::where('produk_kode', $this->produk_kode)->delete();
        $this->emit('deleteModal');
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

    public function save()
    {


        $sementara = Sementara::all();
        DetailCost::create([

            'id_cost' => $this->id_cost,
            'total_cgs' => $this->total_cgs,
            'harga_jual' => $this->harga_jual,
            'profit' => $this->profit,

        ]);
        foreach ($sementara as $sa) {
            $data = array(
                'cost_id' => $this->cost_id,
                'produk_kode' => $sa->produk_kode,
                'bahan_baku_kode' => $sa->bahan_baku_kode,
                'digunakan' => $sa->digunakan,
                'cost' => $sa->cost,
            );
            Cost::insert($data);
            $sa->delete();
        }


        return redirect('cost');
    }



    public function render()
    {

        $detailcost = DetailCost::kode();

        $produk  = DB::table('tb_produk')->join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->get();

        $bahanbaku = BahanBaku::all();
        $sementara = Sementara::all();
        $cost = DB::table('tb_cost')

            ->join(
                'tb_detailcost',
                'tb_detailcost.id_cost',
                '=',
                'tb_cost.cost_id'

            )->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_cost.produk_kode'

            )->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_cost.bahan_baku_kode'

            )->get();





        return view(
            'livewire.cost.create',
            [

                'produk' => $produk,
                'bahanbaku' => $bahanbaku,
                'sementara' => $sementara,
                'cost' => $cost,
                'detailcost' => $detailcost

            ]


        )
            ->extends('template.app');
    }
}
