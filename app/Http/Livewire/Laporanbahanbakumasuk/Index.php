<?php

namespace App\Http\Livewire\Laporanbahanbakumasuk;

use Livewire\Component;
use PDF;
use App\Models\BahanBakuMasuk;

class Index extends Component
{
    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];
    public function cetak()
    {
        $bahanbakumasuk = BahanBakuMasuk::join(
            'tb_bahan_baku',
            'tb_bahan_baku.kode_bahan_baku',
            '=',
            'tb_bahan_baku_masuk.bahan_baku_kode'
        )->with('user')->orderBy('bahan_baku_kode', 'DESC')
            ->latest('tb_bahan_baku_masuk.created_at')->get();
        $data = PDF::loadview('components.laporan-bahan-baku-masuk-pdf', ['data' => $bahanbakumasuk])->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($data),
            "laporan-bahan-baku-masuk.pdf"
        );
    }

    public function render()
    {

        $bahanbakumasuk = BahanBakuMasuk::join(
            'tb_bahan_baku',
            'tb_bahan_baku.kode_bahan_baku',
            '=',
            'tb_bahan_baku_masuk.bahan_baku_kode'
        )->with('user')->orderBy('bahan_baku_kode', 'DESC')
            ->latest('tb_bahan_baku_masuk.created_at')
            ->paginate(5);

        if ($this->search !== null) {
            $bahanbakumasuk = BahanBakuMasuk::join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )->with('user')
                ->orderBy('bahan_baku_kode', 'DESC')
                ->where('nama_bahan_baku', 'like', '%' .  $this->search . '%')
                ->latest('tb_bahan_baku_masuk.created_at')
                ->paginate(5);
        }
        return view('livewire.laporanbahanbakumasuk.index', ['bahanbakumasuk' => $bahanbakumasuk])->extends('template.app');
    }
}
