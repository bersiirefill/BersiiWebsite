<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// Pakai Faker
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        $rand1 = rand(100000,1000000);
        DB::table('admins')->insert([
            'id_admin' => $rand1,
            'email' => 'bersiirefill@gmail.com',
            'password' => Hash::make('sunibngalam'),
            'nama' => $faker->name,
            'jabatan' => $faker->jobTitle,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
