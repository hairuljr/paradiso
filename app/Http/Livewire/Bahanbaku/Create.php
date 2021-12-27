<?php

namespace App\Http\Livewire\Bahanbaku;

use Livewire\Component;

class Create extends Component
{
    // public $kode_bahan_baku;
    // public $nama_bahan_baku;
    // public $persediaan;
    // public $satuan;
    // public $harga_beli;
    // public $satuan_produk;
    // public $bahanbaku;
    // public function store($request)
    // {

    //     DB::table('tb_bahan_baku')->insert(
    //         [
    //             'kode_bahan_baku' => $request['kode_bahan_baku'],
    //             'nama_bahan_baku' => $request['nama_bahan_baku'],
    //             'persediaan' =>  $request['persediaan'],
    //             'satuan' =>  $request['satuan'],
    //             'harga_beli' =>  $request['satuan'],
    //             'satuan_produk' =>  $request['satuan_produk'],
    //         ]

    //     );
    //     // return view('livewire.bahanbaku.index');


    //     return redirect()->route('bahanbaku.index');
    // }

    public function render()
    {
        return view('livewire.bahanbaku.create')->extends('layouts.skote-admin');
    }
}
