<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{

    use HasFactory;
    protected $table = 'tb_jenis_produk';
    protected $primaryKey = 'kode_jenis_produk';
    protected $keyType = 'string';
    protected $fillable = ['kode_jenis_produk', 'jenis_produk'];
}
