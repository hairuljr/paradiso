<?php

namespace App\Models;

use App\Models\Cost;
use App\Models\Produk;
use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCost extends Model
{
    // use HasFactory, AutoNumberTrait;
    use HasFactory;
    protected $table = 'tb_detailcost';
    protected $primaryKey = 'id';
    protected $fillable = ['cost_id', 'produk_kode', 'bahan_baku_kode', 'digunakan', 'cost'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_kode', 'kode_produk');
    }

    public function Cost()
    {
        return $this->hasOne(Cost::class, 'id_cost', 'cost_id');
    }

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_kode', 'kode_bahan_baku');
    }
}
