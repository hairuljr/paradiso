<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\DetailCost;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cost extends Model
{
    use HasFactory;
    protected $table = 'tb_cost';
    protected $primaryKey = 'id_cost';
    protected $keyType = 'string';
    protected $fillable = ['id_cost', 'total_cgs', 'harga_jual', 'profit'];

    public static function kode()
    {

        $detailcost = DB::table('tb_cost')->max('id_cost');
        $addNol = '';
        $detailcost = str_replace("CS-", "", $detailcost);
        $detailcost = (int) $detailcost + 1;
        $incrementKode = $detailcost;

        if (strlen($detailcost) == 1) {
            $addNol = "00";
        } elseif (strlen($detailcost) == 2) {
            $addNol = "00";
        } elseif (strlen($detailcost == 3)) {
            $addNol = "0";
        }

        $kodeBaru = "CS-" . $addNol . $incrementKode;
        return $kodeBaru;
    }
}
