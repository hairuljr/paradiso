<?php

namespace App\Http\Livewire\Laporanpenjualan;

use PDF;
use Livewire\Component;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;


class Index extends Component
{
    public $searchQuery;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];
    public function cetak()
    {
        $penjualan = Penjualan::with(['user', 'detailPenjualan'])->when($this->searchQuery !== '', function ($query) {
            $query->where('tgl_transaksi', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('tgl_transaksi', 'DESC')->get();
        $data = PDF::loadview('components.laporan-penjualan-pdf', ['data' => $penjualan])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($data),
            "laporan-penjualan.pdf"
        );
    }
    public function render()
    {

        $penjualan = Penjualan::with(['user', 'detailPenjualan'])->when($this->searchQuery !== '', function ($query) {
            $query->where('tgl_transaksi', 'like', '%' . $this->searchQuery . '%');
        })->orderBy('tgl_transaksi', 'DESC')->paginate(5);


        return view('livewire.laporanpenjualan.index', [
            // 'detailPenjualan' => $detailPenjualan,
            'penjualan' => $penjualan
        ])
            ->extends('template.app');;
    }
}
