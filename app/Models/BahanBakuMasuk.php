<?php

namespace App\Models;

use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBakuMasuk extends Model
{
    use HasFactory;
    protected $table = 'tb_bahan_baku_masuk';
    protected $guarded = [];

    public function bahanbaku()
    {
        return $this->hasOne(BahanBaku::class, 'kode_bahan_baku', 'bahan_baku_kode');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
