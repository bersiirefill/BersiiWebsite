<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('refill_stations')->insert([
            'nomor_seri' => '00000000c0ed5881',
            'latitude' => '-7.9666204',
            'longitude' => '112.6326321',
            'status_mesin' => '0',
            'alamat' => 'Singosari',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
