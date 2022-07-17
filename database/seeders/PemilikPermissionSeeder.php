<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PemilikPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menambahkan akses kepada role Pemilik
        $pemilikRole = Role::create(['name' => 'pemilik']);
        $pemilikRole->givePermissionTo('view dashboard');
        $pemilikRole->givePermissionTo('view pengguna');
        $pemilikRole->givePermissionTo('view jenis-produk');
        $pemilikRole->givePermissionTo('view produk');
        $pemilikRole->givePermissionTo('view bahan-baku');
        $pemilikRole->givePermissionTo('view cgs');
        $pemilikRole->givePermissionTo('view bahan-baku-masuk');
        $pemilikRole->givePermissionTo('view bahan-baku-keluar');
        $pemilikRole->givePermissionTo('view penjualan');
        $pemilikRole->givePermissionTo('view laporan-bahan-baku-masuk');
        $pemilikRole->givePermissionTo('view laporan-bahan-baku-keluar');
        $pemilikRole->givePermissionTo('view laporan-penjualan');

        // buat/berikan user akses dengan role Pemilik
        $user = User::factory()->create([
            'name' => 'Asih',
            'username' => 'asih',
            // 'email' => 'pemilik@paradiso.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($pemilikRole);
    }
}
