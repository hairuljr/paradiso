<?php

namespace App\Http\Livewire\Bahanbaku;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.bahanbaku.index', ['bahanbaku' => $bahanbaku])->extends('layouts.skote-admin');
    }
}
