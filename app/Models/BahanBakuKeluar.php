<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuKeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_bahan_baku_keluar';
    protected $guarded = [];

    public function bahanbaku()
    {
        return $this->hasOne(BahanBaku::class, 'kode_bahan_baku', 'bahan_baku_kode');
    }

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class, 'no_transaksi', 'transaksi_no');
    }
}
