<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'tb_penjualan';
    protected $guarded = [];

    public static function kode()
    {

        $penjualan = DB::table('tb_penjualan')->max('no_transaksi');
        $addNol = '';
        $penjualan = str_replace("JP-", "", $penjualan);
        $penjualan = (int) $penjualan + 1;
        $incrementKode = $penjualan;

        if (strlen($penjualan) == 1) {
            $addNol = "00";
        } elseif (strlen($penjualan) == 2) {
            $addNol = "00";
        } elseif (strlen($penjualan == 3)) {
            $addNol = "0";
        }

        $kodeBaru = "JP-" . $addNol . $incrementKode;
        return $kodeBaru;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
