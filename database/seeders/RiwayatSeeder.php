<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('riwayat_topup')->insert([
            'id_user' => '944111',
            'topup_id' => 'BRS-TPX-'.rand(100000,1000000),
            'nominal'   => 25000.00,
            'tanggal' => now(),
            'payment_status' => 1,
            'snap_token' => NULL,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
