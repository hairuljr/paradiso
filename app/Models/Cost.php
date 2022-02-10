<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wuwx\LaravelAutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cost extends Model
{
    use HasFactory;
    protected $table = 'tb_cost';
    protected $primaryKey = 'id';

    protected $fillable = ['cost_id', 'produk_kode', 'bahan_baku_kode', 'digunakan', 'cost'];


    // public function getKode()
    // {

    //     $sql = "SELECT MAX(MID(id_cost,9,4)) AS id_costs FROM tb_cost
    //     WHERE MID(id_cost,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";

    //     $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $n = ((int)$row->id_costs) + 1;
    //         $no = sprintf("%'.04d", $n);
    //     } else {

    //         $no = "0001";
    //     }
    //     $id_cost = "MP" . date('ymd') . $no;
    //     return $id_cost;
    // }
}
