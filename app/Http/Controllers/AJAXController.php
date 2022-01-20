<?php

namespace App\Http\Controllers;

use App\Models\Temporary;
use Illuminate\Http\Request;

class AJAXController extends Controller
{
    public function storeTemp(Request $request)
    {
        Temporary::create([
            'produk_kode' => $request->produk_kode,
            'nama_produk' => $request->nama_produk,
            'bahan_baku_kode' => $request->bahan_baku_kode,
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'cost' => $request->cost
        ]);

        return response()->json([
            'pesan' => 'Berhasil Menghitung bahan baku.',
            'status' => 200
        ]);
    }
}
