<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuMasuk extends Model
{
    use HasFactory;
    protected $table = 'tb_bahan_baku_masuk';
    protected $primaryKey = 'id';
    protected $fillable = ['bahan_baku_kode', 'jumlah', 'harga'];
}
