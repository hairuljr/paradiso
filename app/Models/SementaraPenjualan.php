<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SementaraPenjualan extends Model
{
    use HasFactory;
    protected $table = 'sementara_penjualans';
    protected $guarded = [];

    public function getBahanBakuAttribute($value)
    {
        return json_decode($value, TRUE);
    }

    public function getDigunakanAttribute($value)
    {
        return json_decode($value, TRUE);
    }
}
