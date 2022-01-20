<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;

class JenisProduk extends Model
{

    use HasFactory, AutoNumberTrait;
    protected $table = 'tb_jenis_produk';
    protected $primaryKey = 'kode_jenis_produk';
    protected $keyType = 'string';
    protected $fillable = ['kode_jenis_produk', 'jenis_produk'];

    public function getAutoNumberOptions()
    {
        return [
            'kode_jenis_produk' => [
                'format' => 'JP-?', // autonumber format. '?' akan diganti menjadi nomor.
                'length' => 3 // panjang nomor otomatisnya.
            ],
        ];
    }
}
