<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sementara extends Model
{
    use HasFactory;
    protected $table = 'tb_sementara';
    protected $primaryKey = 'id';
    protected $fillable = ['produk_kode', 'nama_produk', 'bahan_baku_kode', 'nama_bahan_baku', 'cost'];
}
