<?php

namespace App\Http\Livewire\Laporanpenjualan;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.laporanpenjualan.index')->extends('template.app');
    }
}
