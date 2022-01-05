<?php

namespace App\Http\Livewire\Bahanbakumasuk;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
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
