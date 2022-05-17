<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisProduk;
use App\Models\Produk;
use App\Models\BahanBaku;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionDataSeeder::class);
        $this->call(KasirPermissionSeeder::class);
        $this->call(PegawaiPermissionSeeder::class);

        $adminRole = Role::create(['name' => 'admin']);
        $user = User::factory()->create([
            'name' => 'Adminku',
            'username' => 'admin',
            'email' => 'admin@paradiso.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($adminRole);
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
