<?php

namespace App\Http\Livewire\Cost;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {

        $cost = DB::table('tb_cost')
            ->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_cost.bahan_baku_kode'
            )
            ->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_cost.produk_kode'
            )
            ->get();
        return view('livewire.cost.index', ['cost' => $cost])->extends('template.app');
    }
}
