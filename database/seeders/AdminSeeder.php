<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        $rand1 = rand(100000,1000000);
        DB::table('admins')->insert([
            'id_admin' => $rand1,
            'email' => 'bersiirefill@gmail.com',
            'password' => Hash::make('sunibngalam'),
            'nama_admin' => 'Admin Bersii',
            'jabatan' => 'Administrator',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
