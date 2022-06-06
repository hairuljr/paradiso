<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bahanbaku = [
            [
                'kode_bahan_baku' => "BK-001",
                'nama_bahan_baku' => 'Teh',
                'persediaan' => '0',
                'satuan_produk' => "25",
                'satuan' => "Pcs",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_bahan_baku' => "BK-002",
                'nama_bahan_baku' => 'Sirup Lemon',
                'persediaan' => '0',
                'satuan_produk' => "550",
                'satuan' => "Mili",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_bahan_baku' => "BK-003",
                'nama_bahan_baku' => 'Gula',
                'persediaan' => '0',
                'satuan_produk' => "1000",
                'satuan' => "Gram",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_bahan_baku' => "BK-004",
                'nama_bahan_baku' => 'Lemon',
                'persediaan' => '0',
                'satuan_produk' => "25",
                'satuan' => "Pcs",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_bahan_baku' => "BK-005",
                'nama_bahan_baku' => 'Milo',
                'persediaan' => '0',
                'satuan_produk' => "1000",
                'satuan' => "Gram",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        \DB::table('tb_bahan_baku')->insert($bahanbaku);

        $jenisproduk = [
            [
                'kode_jenis_produk' => "JP-001",
                'jenis_produk' => 'Hot Drink',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_jenis_produk' => "JP-002",
                'jenis_produk' => 'Could Drink',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        \DB::table('tb_jenis_produk')->insert($jenisproduk);

        $produk = [
            [
                'kode_produk' => str_random(20),
                'nama_produk' => 'Lemon Tea',
                'jenis_produk_kode' => 'JP-001',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'kode_produk' => str_random(20),
                'nama_produk' => 'Milo',
                'jenis_produk_kode' => 'JP-001',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];

        \DB::table('tb_produk')->insert($produk);
    }
}
