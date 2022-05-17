<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PegawaiPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menambahkan akses kepada role Pegawai
        $pegawaiRole = Role::create(['name' => 'pegawai']);
        $pegawaiRole->givePermissionTo('view dashboard');
        $pegawaiRole->givePermissionTo('view jenis-produk');
        $pegawaiRole->givePermissionTo('create jenis-produk');
        $pegawaiRole->givePermissionTo('update jenis-produk');
        $pegawaiRole->givePermissionTo('delete jenis-produk');
        $pegawaiRole->givePermissionTo('view produk');
        $pegawaiRole->givePermissionTo('create produk');
        $pegawaiRole->givePermissionTo('update produk');
        $pegawaiRole->givePermissionTo('delete produk');
        $pegawaiRole->givePermissionTo('view cgs');
        $pegawaiRole->givePermissionTo('create cgs');
        $pegawaiRole->givePermissionTo('update cgs');
        $pegawaiRole->givePermissionTo('delete cgs');
        $pegawaiRole->givePermissionTo('view bahan-baku-masuk');
        $pegawaiRole->givePermissionTo('create bahan-baku-masuk');
        $pegawaiRole->givePermissionTo('update bahan-baku-masuk');
        $pegawaiRole->givePermissionTo('delete bahan-baku-masuk');
        $pegawaiRole->givePermissionTo('view bahan-baku-keluar');
        $pegawaiRole->givePermissionTo('create bahan-baku-keluar');
        $pegawaiRole->givePermissionTo('update bahan-baku-keluar');
        $pegawaiRole->givePermissionTo('delete bahan-baku-keluar');
        $pegawaiRole->givePermissionTo('view laporan-bahan-baku-masuk');
        $pegawaiRole->givePermissionTo('view laporan-bahan-baku-keluar');
        $pegawaiRole->givePermissionTo('view laporan-penjualan');

        // buat/berikan user akses dengan role Pegawai
        $user = User::factory()->create([
            'name' => 'Pegawaiku',
            'username' => 'pegawai',
            'email' => 'pegawai@paradiso.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($pegawaiRole);
    }
}
