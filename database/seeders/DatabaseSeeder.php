<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisProduk;
use App\Models\Produk;
use App\Models\BahanBaku;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        // JenisProduk::create([

        //     'kode_jenis_produk' => 'JS-001',
        //     'jenis_produk' => 'Hot Drinks'
        // ]);
        // JenisProduk::create([

        //     'kode_jenis_produk' => 'JS-002',
        //     'jenis_produk' => 'Could Drinks'
        // ]);

        // Produk::create([
        //     'kode_produk' => 'PK-001',
        //     'nama_produk' => 'Vanilla',
        //     'jenis_produk_kode' => 'JS-002'
        // ]);

        // BahanBaku::create([

        //     'kode_bahan_baku' => 'BK-001',
        //     'nama_bahan_baku' => 'Sirup Lemon',
        //     'persediaan' => '0',
        //     'satuan_produk' => '500',
        //     'satuan' => 'Mili',
        //     'harga' => '15000'
        // ]);

        // BahanBaku::create([

        //     'kode_bahan_baku' => 'BK-002',
        //     'nama_bahan_baku' => 'Teh',
        //     'persediaan' => '0',
        //     'satuan_produk' => '25',
        //     'satuan' => 'Mili',
        //     'harga' => '15000'
        // ]);
    }
}
