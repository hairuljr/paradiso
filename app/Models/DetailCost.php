<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCost extends Model
{
    // use HasFactory, AutoNumberTrait;
    use HasFactory;
    protected $table = 'tb_detailcost';
    protected $primaryKey = 'id_cost';
    protected $keyType = 'string';
    protected $fillable = ['id_cost', 'total_cgs', 'harga_jual', 'profit'];

    public static function kode()
    {

        $detailcost = DB::table('tb_detailcost')->max('id_cost');
        $addNol = '';
        $detailcost = str_replace("CS", "", $detailcost);
        $detailcost = (int) $detailcost + 1;
        $incrementKode = $detailcost;

        if (strlen($detailcost) == 1) {
            $addNol = "00";
        } elseif (strlen($detailcost) == 2) {
            $addNol = "00";
        } elseif (strlen($detailcost == 3)) {
            $addNol = "0";
        }

        $kodeBaru = "CS" . $addNol . $incrementKode;
        return $kodeBaru;
    }
}
