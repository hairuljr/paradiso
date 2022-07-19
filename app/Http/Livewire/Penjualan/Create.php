<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\BahanBaku;
use App\Models\BahanBakuKeluar;
use App\Models\Cost;
use App\Models\DetailCost;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\SementaraPenjualan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $seacrhQuery;
    public $id_cost;
    public $cost_id;
    public $no_transaksi;
    public $transaksi_no;
    public $tgl_transaksi;
    public $jumlah;
    public $sub_total;
    public $produk_kode;

    // public $produk;
    public $kode_produk;
    public $nama_produk;
    public $jenis_produk_kode;
    public $harga_jual;

    public $dataSementara;

    public $jenis_produk;
    public $kode_jenis_produk;
    public $nama_bahan_baku;
    public $persediaan;
    public $satuan;
    public $satuan_produk;
    public $harga;
    public $bahan_baku_kode;

    public $digunakan;
    public $kode_bahan_baku;
    public $gunakan;
    public $total;


    protected $rules = [

        'kode_produk' => 'required',
        'nama_produk' => 'required',
        'jumlah' => 'required',
        'total' => 'required',
        'harga_jual' => 'required',

    ];
    protected $rules1 = [

        'sub_total' => 'required',

    ];


    protected $messages = [
        'kode_produk.required' => 'Barcode tidak boleh kosong.',
        'nama_produk.required' => 'Nama Produk tidak boleh kosong.',
        'jumlah.required' => 'Jumlah Produk tidak boleh kosong.',
        'total.required' => 'Total tidak boleh kosong.',
        'harga_jual.required' => 'Harga Produk tidak boleh kosong.',

    ];
    protected $messages1 = [
        'sub_total.required' => 'Sub Total tidak boleh kosong.',


    ];


    public function mount()
    {
        $this->searchQuery = '';
    }
    public function SelectData1($produk_kode)
    {

        $datanya = DetailCost::with(['produk', 'Cost'])->where('produk_kode', $produk_kode)->first();
        $this->kode_produk = $datanya->produk_kode;
        $this->nama_produk = $datanya->produk->nama_produk;
        $this->harga_jual = $datanya->Cost->harga_jual;

        $kode = DetailCost::with(['bahanBaku', 'produk'])->where('produk_kode', $produk_kode)
            ->get();

        $merged = collect($kode)->map(function ($item) {
            return [
                'kode_bahan_baku' => $item->bahanBaku->kode_bahan_baku,
                'nama_bahan_baku' => $item->bahanBaku->nama_bahan_baku,
                'persediaan' => $item->bahanBaku->persediaan,
                'satuan_produk' => $item->bahanBaku->satuan_produk,
                'satuan' => $item->bahanBaku->satuan,
                'harga' => $item->bahanBaku->harga,
                'digunakan' => $item->digunakan,
                'produk_kode' => $item->produk_kode,
                'nama_produk' => $item->produk->nama_produk,
            ];
        });

        $this->bahan_baku_kode = $merged;
    }

    public function keranjang()
    {
        $data = collect($this->bahan_baku_kode)->map(function ($item) {
            return [
                'bahan_baku' => $item,
            ];
        });
        $validasi = $this->validate();
        SementaraPenjualan::create([
            'produk_kode' => $this->kode_produk,
            'nama_produk' => $this->nama_produk,
            'jumlah' => $this->jumlah,
            'total' => $this->total,
            'bahan_baku' => $data
        ]);

        session()->flash('pesan', 'Produk berhasil ditambahkan');
        return redirect('/penjualan/create');
    }
    public function DetailDataKeranjang($produk_kode)
    {
        $temp = SementaraPenjualan::where('produk_kode', $produk_kode)->first();
        $this->produk_kode = $temp->produk_kode;
        $this->nama_produk = $temp->nama_produk;
        $this->jumlah = $temp->jumlah;
        $this->total = $temp->total;
        $this->bahan_baku = $temp->bahan_baku;
    }

    public function DeleteKeranjang()
    {

        SementaraPenjualan::where('produk_kode', $this->produk_kode)->delete();
        $this->emit('deleteModal');
    }

    public function save()
    {
        $sementara = SementaraPenjualan::get();
        // $subTotal = array_sum($sementara->pluck('total')->toArray());
        $validasi = $this->validate();
        Penjualan::create($validasi, [

            'no_transaksi' => $this->no_transaksi,
            'user_id' => auth()->id(),
            'tgl_transaksi' => now(),
            'sub_total' => $this->sub_total,

        ]);
        foreach ($sementara as $value) {


            DetailPenjualan::create([
                'transaksi_no' => $this->transaksi_no,
                'produk_kode' => $value->produk_kode,
                'jumlah' => $value->jumlah,
                'total' => $value->total
            ]);

            // mengupdate bahan baku
            foreach ($value->bahan_baku as  $item) {
                $kode = $item['bahan_baku']['kode_bahan_baku'];
                $digunakan = $item['bahan_baku']['digunakan'];
                BahanBakuKeluar::create([
                    'transaksi_no' => $this->transaksi_no,
                    'bahan_baku_kode' => $kode,
                    'jumlah' => $digunakan * $value->jumlah,
                ]);
                // Mengurangi persediaan bahan baku
                $bahanBaku = BahanBaku::where('kode_bahan_baku', $kode)->first();
                if ($bahanBaku) {
                    $bahanBaku->update([
                        'persediaan' => $bahanBaku->persediaan - $digunakan * $value->jumlah
                    ]);
                }
            }
        }

        // Kosongkan Tbl Sementara Penjualan
        SementaraPenjualan::truncate();
        session()->flash('pesan', 'Data berhasil ditambah');
        return redirect('penjualan');
    }
    public function render()
    {

        $sementara = DB::table('tb_sementara');
        $penjualan = Penjualan::kode();
        $detailPenjualan = DB::table('tb_detail_penjualan')
            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detail_penjualan.produk_kode'

            )->get();
        $detailcost = DB::table('tb_detailcost')

            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detailcost.produk_kode'

            )->get();

        // query join 3 tbl
        $datanya = DetailCost::with(['produk', 'cost'])
            ->groupBy('produk_kode')
            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detailcost.produk_kode'
            )
            ->when($this->searchQuery !== '', function ($query) {
                $query->where('nama_produk', 'like', '%' . $this->searchQuery . '%');
            })->orderBy('nama_produk', 'DESC')->paginate(5);
        // $datanya->first()->bahan_baku_kode;
        // $datanya->first()->produk->nama_produk;
        // $datanya->first()->detailCost->harga_jual;

        $temp = SementaraPenjualan::get();

        return view(
            'livewire.penjualan.create',
            [
                'penjualan' => $penjualan,
                'detailpenjulan' =>  $detailPenjualan,
                'sementara' => $sementara,
                'detailcost' => $detailcost,
                'produk' => $datanya,
                'detailCost' => $datanya,
                'temp' => $temp


            ]
        )->extends('template.app');
    }
}
