<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_penjualan';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_kode', 'kode_produk');
    }
}
