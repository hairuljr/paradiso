<?php

namespace App\Http\Livewire\Penjualan;

use App\Models\BahanBaku;
use App\Models\BahanBakuKeluar;
use App\Models\Cost;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\SementaraPenjualan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $no_transaksi;
    public $tgl_transaksi;
    public $jumlah;
    public $sub_total;

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


    public function SelectData1($produk_kode)
    {

        $datanya = Cost::with(['produk', 'detailCost'])->where('produk_kode', $produk_kode)->first();
        $this->kode_produk = $datanya->produk_kode;
        $this->nama_produk = $datanya->produk->nama_produk;
        $this->harga_jual = $datanya->detailCost->harga_jual;

        $kode = Cost::with(['bahanBaku', 'produk'])->where('produk_kode', $produk_kode)
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


    public function render()
    {

        $sementara = DB::table('tb_sementara');
        $penjualan = DB::table('tb_penjualan')
            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_penjualan.produk_kode'

            )->get();
        $cost = DB::table('tb_cost')

            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_cost.produk_kode'

            )->get();

        // query join 3 tbl
        $datanya = Cost::with(['produk', 'detailCost'])
            ->groupBy('produk_kode')
            ->get();
        // $datanya->first()->bahan_baku_kode;
        // $datanya->first()->produk->nama_produk;
        // $datanya->first()->detailCost->harga_jual;

        $temp = SementaraPenjualan::get();

        return view(
            'livewire.penjualan.create',
            [
                'penjualan' => $penjualan,
                'sementara' => $sementara,
                'cost' => $cost,
                'produk' => $datanya,
                'detailCost' => $datanya,
                'temp' => $temp


            ]
        )->extends('template.app');
    }

    public function keranjang()
    {
        $data = collect($this->bahan_baku_kode)->map(function ($item) {
            return [
                'bahan_baku' => $item,
            ];
        });
        SementaraPenjualan::create([
            'no_trf' => 'TRF-' . rand(10, 100),
            'produk_kode' => $this->kode_produk,
            'nama_produk' => $this->nama_produk,
            'jumlah' => $this->jumlah,
            'total' => $this->total,
            'bahan_baku' => $data
        ]);

        session()->flash('pesan', 'Produk berhasil ditambahkan');
        return redirect('/penjualan/create');
    }

    public function save()
    {
        $sementara = SementaraPenjualan::get();
        $subTotal = array_sum($sementara->pluck('total')->toArray());
        foreach ($sementara as $value) {
            DetailPenjualan::create([
                'no_transaksi' => $value->no_trf,
                'tgl_transaksi' => now(),
                'sub_total' => $subTotal
            ]);

            Penjualan::create([
                'transaksi_no' => $value->no_trf,
                'produk_kode' => $value->produk_kode,
                'jumlah' => $value->jumlah,
                'sub_total' => $value->total
            ]);

            // mengupdate bahan baku
            foreach ($value->bahan_baku as  $item) {
                $kode = $item['bahan_baku']['kode_bahan_baku'];
                $digunakan = $item['bahan_baku']['digunakan'];
                BahanBakuKeluar::create([
                    'bahan_baku_kode' => $kode,
                    'jumlah' => $digunakan,
                ]);
                // Mengurangi persediaan bahan baku
                $bahanBaku = BahanBaku::where('kode_bahan_baku', $kode)->first();
                if ($bahanBaku) {
                    $bahanBaku->update([
                        'persediaan' => $bahanBaku->persediaan - $digunakan
                    ]);
                }
            }
        }

        // Kosongkan Tbl Sementara Penjualan
        SementaraPenjualan::truncate();
    }
}
