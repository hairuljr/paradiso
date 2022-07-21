<?php

namespace App\Http\Livewire\Cost;

use App\Models\Cost;
use App\Models\Produk;
use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Sementara;
use App\Models\Temporary;
use App\Models\DetailCost;
use Livewire\WithPagination;
use App\Models\BahanBakuMasuk;
use Illuminate\Support\Facades\DB;

class Create extends Component
{

    use WithPagination;
    public $searchQuery;
    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['search' => ['except' => '']],

    ];

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
        'nama_bahan_baku' => 'required|unique:tb_sementara,nama_bahan_baku',
        'harga' => 'required',
        'satuan_produk' => 'required',
        'satuan' => 'required',
        'digunakan' => 'required|numeric',
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
        'bahan_baku_kode.unique' => 'Nama Bahan Baku tidak boleh sama.',
        'nama_bahan_baku.required' => 'Nama Bahan Baku tidak boleh kosong.',
        'harga.required' => 'Harga Bahan Baku tidak boleh kosong.',
        'satuan_produk.required' => 'Isi Satuan tidak boleh kosong.',
        'satuan.required' => 'Satuan tidak boleh kosong.',
        'digunakan.required' => 'Jumlah yang digunakan tidak boleh kosong.',
        'digunakan.numeric' => 'Jumlah yang digunakan tidak boleh selain angka.',
        'cost.required' => 'Harga Cost tidak boleh kosong.',



    ];

    protected $messages1 = [

        'total_cgs.required' => 'Total Cgs tidak boleh kosong.',
        'harga_jual.required' => 'Harga Jual tidak boleh kosong.',
        'proft.required' => 'Profit tidak boleh kosong.',


    ];


    public function mount()
    {
        $this->searchQuery = '';
    }
    public function ClearForm()
    {
        $this->produk_kode = '';
        $this->nama_produk = '';
        $this->bahan_baku_kode = '';
        $this->nama_bahan_baku = '';
    }
    public function SelectData($bahan_baku_kode)
    {

        $datanya = BahanBakuMasuk::with(['bahanbaku'])->where('bahan_baku_kode', $bahan_baku_kode)->first();
        $this->bahan_baku_kode = $datanya->bahan_baku_kode;
        $this->nama_bahan_baku = $datanya->bahanbaku->nama_bahan_baku;
        $this->satuan_produk = $datanya->bahanbaku->satuan_produk;
        $this->satuan = $datanya->bahanbaku->satuan;
        $this->harga = $datanya->harga;


        // $bahanbaku = BahanBaku::where('kode_bahan_baku', $kode_bahan_baku)->first();
        // $this->bahan_baku_kode = $bahanbaku->kode_bahan_baku;
        // $this->nama_bahan_baku = $bahanbaku->nama_bahan_baku;
        // $this->persediaan = $bahanbaku->persediaan;
        // $this->satuan = $bahanbaku->satuan;
        // $this->satuan_produk = $bahanbaku->satuan_produk;
        // $this->harga = $bahanbaku->harga;
    }

    public function SelectData1($kode_produk)
    {
        session()->forget('barcode');
        session()->forget('nama');
        $produk = Produk::where('kode_produk', $kode_produk)->first();
        $this->produk_kode = $produk->kode_produk;
        $this->nama_produk = $produk->nama_produk;
        $this->jenis_produk_kode = $produk->jenis_produk_kode;
        $this->harga_satuan = $produk->harga_satuan;
    }

    public function DetailDataKeranjang($bahan_baku_kode)
    {

        if ($bahan_baku_kode) {
            $sementara = Sementara::where('bahan_baku_kode', $bahan_baku_kode)->first();
            $sementara->delete();
        }
    }

    public function DeleteKeranjang()
    {

        Sementara::where('bahan_baku_kode', $this->bahan_baku_kode)->delete();
        $this->Clearform();
        $this->emit('deleteModal');
    }


    public function keranjang()
    {
        $validasi = $this->validate();

        $produk = Sementara::create($validasi, [

            'produk_kode' => $this->produk_kode,
            'nama_produk' => $this->nama_produk,
            'bahan_baku_kode' => $this->bahan_baku_kode,
            'nama_bahan_baku' => $this->nama_bahan_baku,
            'cost' => $this->cost,

        ]);
        session(['barcode' => $produk->produk_kode]);
        session(['nama' => $produk->nama_produk]);
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('/cost/create');
    }

    public function save()
    {


        $sementara = Sementara::all();

        Cost::create([

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
            DetailCost::insert($data);

            $sa->delete();
        }
        session()->forget('barcode');
        session()->forget('nama');
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('cost');
    }



    public function render()
    {

        $detailcost = Cost::kode();

        $datanya = BahanBakuMasuk::with(['bahanbaku'])
            ->groupBy('bahan_baku_kode')
            ->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )
            ->when($this->searchQuery !== '', function ($query) {
                $query->where('nama_bahan_baku', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('nama_bahan_baku', 'DESC')->paginate(5);



        $produk = Produk::join(
            'tb_jenis_produk',
            'tb_jenis_produk.kode_jenis_produk',
            '=',
            'tb_produk.jenis_produk_kode'
        )->orderBy('kode_produk', 'DESC')->latest('tb_produk.created_at')->paginate(15);

        //menampilkan 5 data produk
        if ($this->search !== null) {
            $produk = Produk::join(
                'tb_jenis_produk',
                'tb_jenis_produk.kode_jenis_produk',
                '=',
                'tb_produk.jenis_produk_kode'
            )
                ->orderBy('kode_produk', 'DESC')->where('nama_produk', 'like', '%' . $this->search . '%')
                ->latest('tb_produk.created_at')
                ->paginate(15);
        }

        $this->produk_kode = session('barcode') ?? $this->produk_kode;
        $this->nama_produk = session('nama') ?? $this->nama_produk;
        // $bahanbaku = BahanBaku::all();
        $sementara = Sementara::all();
        $sementaras = Sementara::find(1);
        $cost = DB::table('tb_detailcost')

            ->join(
                'tb_cost',
                'tb_cost.id_cost',
                '=',
                'tb_detailcost.cost_id'

            )->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detailcost.produk_kode'

            )->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_detailcost.bahan_baku_kode'

            )->get();





        return view(
            'livewire.cost.create',
            [

                'produk' => $produk,
                'bahanbaku' => $datanya,
                'bahanbakumasuk' => $datanya,
                'sementara' => $sementara, $sementaras,
                'detailcost' => $detailcost,
                'cost' => $cost,

            ]


        )
            ->extends('template.sidebar');
    }
}
