<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Penjualan;
use App\Models\BahanBakuMasuk;
use App\Models\BahanBakuKeluar;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $searchQuery;
    public $DetailData2 = '';
    public $DetailDataDelete;
    public $no_transaksi;
    public $detailTransaksi = [];
    public $tgl_transaksi;
    public $transaksi_no;
    public $sub_total;
    public $bahan_baku_kode;
    public $kode_bahan_baku;
    public $jumlah;


    public function mount()
    {
        $this->searchQuery = '';
    }
    public function DetailData($no_transaksi)
    {
        $penjualan = DetailPenjualan::with('produk')->where('transaksi_no', $no_transaksi)->get();
        $this->detailTransaksi = $penjualan;
    }


    public function DetailData1($no_transaksi)
    {

        $penjualan = DB::table('tb_detail_penjualan')
            ->join(
                'tb_penjualan',
                'tb_penjualan.no_transaksi',
                '=',
                'tb_detail_penjualan.transaksi_no'


            )->where('no_transaksi', $no_transaksi)->first();

        $this->no_transaksi = $penjualan->no_transaksi;
        $this->tgl_transaksi = $penjualan->tgl_transaksi;
        $this->sub_total = $penjualan->sub_total;
    }

    public function DetailDataDelete($bahan_baku_kode)
    {
        $this->DetailDataDelete = $bahan_baku_kode;
    }
    public function delete()
    {


        $bahanbakukeluar = BahanBakuKeluar::join(
            'tb_penjualan',
            'tb_penjualan.no_transaksi',
            '=',
            'tb_bahan_baku_keluar.transaksi_no'
        )->where('no_transaksi', $this->no_transaksi)->first();

        $bahanbaku = BahanBaku::where('kode_bahan_baku', $bahanbakukeluar->bahan_baku_kode)->first();

        if ($bahanbaku) {
            $bahanbaku->update([
                'persediaan' => $bahanbaku->persediaan + $bahanbakukeluar->jumlah
            ]);
        }

        Penjualan::where('no_transaksi', $this->no_transaksi)->delete();

        $this->emit('deleteModal');
    }
    public function render()
    {

        $penjualan = Penjualan::with('user')->when($this->searchQuery !== '', function ($query) {
            $query->where('tgl_transaksi', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('tgl_transaksi', 'DESC')->paginate(5);


        return view('livewire.penjualan.index', [

            'penjualan' => $penjualan
        ])
            ->extends('template.app');;
    }
}
