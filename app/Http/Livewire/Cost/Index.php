<?php

namespace App\Http\Livewire\Cost;

use App\Models\Cost;
use Livewire\Component;
use App\Models\DetailCost;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];


    public $cost_id;
    public $total_cgs;
    public $harga_jual;
    public $profit;
    public $id_cost;
    public $detailCosts = [];

    public function DetailData($id_cost)
    {
        $cost = DetailCost::with('bahanbaku')->where('cost_id', $id_cost)->get();
        $this->detailCosts = $cost;
    }

    public function DetailData1($id_cost)
    {

        $cost = DB::table('tb_detailcost')
            ->join(
                'tb_cost',
                'tb_cost.id_cost',
                '=',
                'tb_detailcost.cost_id'

            )->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detailcost.produk_kode'

            )->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_detailcost.bahan_baku_kode'

            )->where('id_Cost', $id_cost)->first();

        $this->id_cost = $cost->id_cost;
        $this->total_cgs = $cost->total_cgs;
        $this->harga_jual = $cost->harga_jual;
        $this->profit = $cost->profit;
    }

    public function delete()
    {

        Cost::where('id_cost', $this->id_cost)->delete();
        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }
    public function render()
    {


        $cost = DetailCost::with(['produk', 'Cost'])
            ->groupBy('cost_id')->join(
                'tb_produk',
                'tb_produk.kode_produk',
                '=',
                'tb_detailcost.produk_kode'
            )->orderBy('cost_id', 'DESC')
            ->latest('tb_detailcost.created_at')
            ->paginate(5);

        if ($this->search !== null) {
            $cost = DetailCost::with(['produk', 'Cost'])
                ->groupBy('cost_id')->join(
                    'tb_produk',
                    'tb_produk.kode_produk',
                    '=',
                    'tb_detailcost.produk_kode'

                )->orderBy('cost_id', 'DESC')
                ->where('nama_produk', 'like', '%' .  $this->search . '%')
                ->latest('tb_detailcost.created_at')
                ->paginate(5);
        }


        return view('livewire.cost.index', [

            'cost' => $cost,

        ])
            ->extends('template.app');
    }
}
