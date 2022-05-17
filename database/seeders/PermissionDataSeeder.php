<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'view dashboard']);

        // data pengguna/user
        Permission::create(['name' => 'view pengguna']);
        Permission::create(['name' => 'create pengguna']);
        Permission::create(['name' => 'update pengguna']);
        Permission::create(['name' => 'delete pengguna']);

        // jenis produk
        Permission::create(['name' => 'view jenis-produk']);
        Permission::create(['name' => 'create jenis-produk']);
        Permission::create(['name' => 'update jenis-produk']);
        Permission::create(['name' => 'delete jenis-produk']);

        // produk
        Permission::create(['name' => 'view produk']);
        Permission::create(['name' => 'create produk']);
        Permission::create(['name' => 'update produk']);
        Permission::create(['name' => 'delete produk']);

        // bahan baku
        Permission::create(['name' => 'view bahan-baku']);
        Permission::create(['name' => 'create bahan-baku']);
        Permission::create(['name' => 'update bahan-baku']);
        Permission::create(['name' => 'delete bahan-baku']);

        // cost of good sold
        Permission::create(['name' => 'view cgs']);
        Permission::create(['name' => 'create cgs']);
        Permission::create(['name' => 'update cgs']);
        Permission::create(['name' => 'delete cgs']);

        // bahan baku masuk
        Permission::create(['name' => 'view bahan-baku-masuk']);
        Permission::create(['name' => 'create bahan-baku-masuk']);
        Permission::create(['name' => 'update bahan-baku-masuk']);
        Permission::create(['name' => 'delete bahan-baku-masuk']);

        // bahan baku keluar
        Permission::create(['name' => 'view bahan-baku-keluar']);
        Permission::create(['name' => 'create bahan-baku-keluar']);
        Permission::create(['name' => 'update bahan-baku-keluar']);
        Permission::create(['name' => 'delete bahan-baku-keluar']);

        // penjualan
        Permission::create(['name' => 'view penjualan']);
        Permission::create(['name' => 'create penjualan']);
        Permission::create(['name' => 'update penjualan']);
        Permission::create(['name' => 'delete penjualan']);

        // laporan
        Permission::create(['name' => 'view laporan-bahan-baku-masuk']);
        Permission::create(['name' => 'view laporan-bahan-baku-keluar']);
        Permission::create(['name' => 'view laporan-penjualan']);
    }
}
