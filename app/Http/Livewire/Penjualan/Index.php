<?php

namespace App\Http\Livewire\Penjualan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {

        $penjualan = DB::table('tb_penjualan')->get();

        return view('livewire.penjualan.index', [

            'penjualan' => $penjualan
        ])
            ->extends('template.app');;
    }
}
