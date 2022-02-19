<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanBaku extends Model
{

    use HasFactory, AutoNumberTrait;
    protected $table = 'tb_bahan_baku';
    protected $primaryKey = 'kode_bahan_baku';
    protected $keyType = 'string';
    protected $fillable = ['kode_bahan_baku', 'nama_bahan_baku', 'persediaan', 'satuan_produk', 'satuan'];

    public function getAutoNumberOptions()
    {
        return [
            'kode_bahan_baku' => [
                'format' => 'BK-?', // autonumber format. '?' akan diganti menjadi nomor.
                'length' => 3 // panjang nomor otomatisnya.
            ],
        ];
    }
}
