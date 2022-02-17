<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuKeluar extends Model
{
    use HasFactory;

    protected $table = 'tb_bahan_baku_keluar';
    protected $guarded = [];
}
