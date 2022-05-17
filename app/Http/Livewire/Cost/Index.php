<?php

namespace App\Http\Livewire\Cost;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $cost =  DB::table('tb_cost')->get();
        $detailcost = DB::table('tb_detailcost')
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


        return view('livewire.cost.index', [

            'cost' => $cost,
            'detailcost' => $detailcost
        ])
            ->extends('template.app');
    }
}
