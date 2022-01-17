<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{

    use HasFactory;
    protected $table = 'tb_bahan_baku';
    protected $primaryKey = 'kode_bahan_baku';
    protected $keyType = 'string';
    protected $fillable = ['kode_bahan_baku', 'nama_bahan_baku', 'persediaan', 'satuan_produk', 'satuan'];
}
