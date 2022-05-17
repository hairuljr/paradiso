<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class KasirPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menambahkan akses kepada role Kasir
        $kasirRole = Role::create(['name' => 'kasir']);
        $kasirRole->givePermissionTo('view dashboard');
        $kasirRole->givePermissionTo('view bahan-baku');
        $kasirRole->givePermissionTo('create bahan-baku');
        $kasirRole->givePermissionTo('update bahan-baku');
        $kasirRole->givePermissionTo('delete bahan-baku');
        $kasirRole->givePermissionTo('view cgs');
        $kasirRole->givePermissionTo('create cgs');
        $kasirRole->givePermissionTo('update cgs');
        $kasirRole->givePermissionTo('delete cgs');
        $kasirRole->givePermissionTo('view penjualan');
        $kasirRole->givePermissionTo('create penjualan');
        $kasirRole->givePermissionTo('update penjualan');
        // $kasirRole->givePermissionTo('delete penjualan');
        $kasirRole->givePermissionTo('view laporan-bahan-baku-masuk');
        $kasirRole->givePermissionTo('view laporan-bahan-baku-keluar');
        $kasirRole->givePermissionTo('view laporan-penjualan');

        // buat/berikan user akses dengan role Kasir
        $user = User::factory()->create([
            'name' => 'Kasirku',
            'username' => 'kasir',
            'email' => 'kasir@paradiso.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($kasirRole);
    }
}
