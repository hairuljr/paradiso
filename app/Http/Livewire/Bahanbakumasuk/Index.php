<?php

namespace App\Http\Livewire\Bahanbakumasuk;

use Livewire\Component;
use App\Models\BahanBaku;
use Livewire\WithPagination;
use App\Models\BahanBakuMasuk;
use Illuminate\Support\Facades\DB;
use PDF;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    public $DetailData = '';
    public $bahan_baku_kode;
    public $kode_bahan_baku;
    public $nama_bahan_baku;
    public $jumlah;
    public $harga;
    public $satuan;
    public $stok_masuk;
    public $tgl_transaksi;

    protected $rules = [
        'bahan_baku_kode' => 'required',
        'jumlah' => 'required',
        'harga' => 'required',
        'satuan_produk' => 'required',


    ];

    protected $messages = [
        'bahan_baku_kode.required' => 'Barcode tidak boleh kosong.',
        'jumlah.required' => 'Jumlah tidak boleh kosong.',
        'harga.required' => 'Harga tidak boleh kosong.',
    ];

    public function ClearForm()
    {
        $this->bahan_baku_kode = '';
        $this->jumlah = '';
        $this->harga = '';
    }

    public function DetailData($id)
    {

        $this->DetailData = $id;
    }

    public function DetailData1($bahan_baku_kode)
    {
        $bahanbakumasuk = DB::table('tb_bahan_baku_masuk')
            ->join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )
            ->where('bahan_baku_kode', $bahan_baku_kode)->first();

        $this->bahan_baku_kode = $bahanbakumasuk->bahan_baku_kode;
        $this->nama_bahan_baku = $bahanbakumasuk->nama_bahan_baku;
        $this->satuan_produk = $bahanbakumasuk->satuan_produk;
        $this->satuan = $bahanbakumasuk->satuan;
        $this->stok_masuk = $bahanbakumasuk->stok_masuk;
        $this->harga = $bahanbakumasuk->harga;
    }
    public function Update()
    {
        $validasi = $this->validate();
        $bahanbakumasuk = [

            'bahan_baku_kode' => $this->bahan_baku_kode,
            'stok_masuk' => $this->stok_masuk,
            'harga' => $this->harga,

        ];
        $bahanbakumasuk1 = BahanBakuMasuk::where('bahan_baku_kode', $this->bahan_baku_kode)->first();
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $bahanbakumasuk1->bahan_baku_kode)->first();
        if ($bahanbaku) {

            $bahanbaku->update([
                'persediaan' => $bahanbaku->persediaan - $bahanbakumasuk1->stok_masuk
            ]);
            $bahanbaku->update([
                'persediaan' => $bahanbaku->persediaan + $this->stok_masuk
            ]);
        }
        $bahanbakumasuk1->update($bahanbakumasuk);

        session()->flash('pesan1', 'Data berhasil di edit');
        $this->Clearform();
        $this->emit('updateModal');
    }

    public function delete()
    {

        $bahanbakumasuk = BahanBakuMasuk::find($this->DetailData);
        $bahanbaku = BahanBaku::where('kode_bahan_baku', $bahanbakumasuk->bahan_baku_kode)->first();
        if ($bahanbaku) {

            $bahanbaku->update([
                'persediaan' => $bahanbaku->persediaan - $bahanbakumasuk->stok_masuk
            ]);
        }
        $bahanbakumasuk->delete();


        //flash message
        session()->flash('hapus', 'Data Berhasil Dihapus.');
        $this->emit('deleteModal');
    }



    public function render()
    {


        $bahanbakumasuk = BahanBakuMasuk::join(
            'tb_bahan_baku',
            'tb_bahan_baku.kode_bahan_baku',
            '=',
            'tb_bahan_baku_masuk.bahan_baku_kode'
        )->with('user')->orderBy('bahan_baku_kode', 'DESC')
            ->latest('tb_bahan_baku_masuk.created_at')
            ->paginate(5);

        if ($this->search !== null) {
            $bahanbakumasuk = BahanBakuMasuk::join(
                'tb_bahan_baku',
                'tb_bahan_baku.kode_bahan_baku',
                '=',
                'tb_bahan_baku_masuk.bahan_baku_kode'
            )->with('user')
                ->orderBy('bahan_baku_kode', 'DESC')
                ->where('nama_bahan_baku', 'like', '%' .  $this->search . '%')
                ->latest('tb_bahan_baku_masuk.created_at')
                ->paginate(5);
        }
        return view('livewire.bahanbakumasuk.index', ['bahanbakumasuk' => $bahanbakumasuk])->extends('template.app');
    }
}
