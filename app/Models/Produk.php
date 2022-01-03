<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'tb_produk';
    protected $primaryKey = 'kode_produk';
    protected $keyType = 'string';
    protected $fillable = ['kode_produk', 'nama_produk', 'jenis_produk_kode', 'harga_satuan'];
}
