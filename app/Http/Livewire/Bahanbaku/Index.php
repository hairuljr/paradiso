<?php

namespace App\Http\Livewire\Bahanbaku;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $bahanbaku = DB::table('tb_bahan_baku')->get();
        return view('livewire.bahanbaku.index', ['bahanbaku' => $bahanbaku]);
    }
}
