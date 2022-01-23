<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, AutoNumberTrait;
    protected $table = 'tb_produk';
    protected $primaryKey = 'kode_produk';
    protected $keyType = 'string';
    protected $fillable = ['kode_produk', 'nama_produk', 'jenis_produk_kode', 'harga_satuan'];

    public function getAutoNumberOptions()
    {
        return [
            'kode_produk' => [
                'format' => 'PK-?', // autonumber format. '?' akan diganti menjadi nomor.
                'length' => 3 // panjang nomor otomatisnya.
            ],
        ];
    }
}
