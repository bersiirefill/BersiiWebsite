<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'kode_supplier' => 'BSPL-'.rand(100,1000),
            'nama_pemilik' => 'Ahmad Muzakki',
            'nama_toko'   => 'Maju Jaya Sentosa Abadi Lancar',
            'nomor_telepon' => '08123456',
            'alamat' => 'Sawojajar',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'kode_supplier' => 'BSPL-'.rand(100,1000),
            'nama_pemilik' => 'Fauzan Mustofa',
            'nama_toko'   => 'Sumber Selamat',
            'nomor_telepon' => '08123456',
            'alamat' => 'Singosari',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
