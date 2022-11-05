<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserAndWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $rand1 = rand(100000,1000000);
        $rand2 = rand(100000,1000000);
        $rand3 = rand(100000,1000000);
        $rand4 = rand(100000,1000000);
        $rand5 = rand(100000,1000000);

        // Hanustavira Guru Acarya
        DB::table('users_bersiis')->insert([
            'id' => $rand1,
            'name' => 'Hanustavira Guru Acarya',
            'email' => 'hanustavira.acarya@binus.ac.id',
            'number' => '6285745402100',
            'address' => 'Singosari',
            'password' => Hash::make('sunibngalam'),
            'forgot_token' => NULL,
            'remember_token' => Str::random(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('wallet')->insert([
            'id' => $rand1,
            'saldo' => 50000,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Fauzan Mustofa
        DB::table('users_bersiis')->insert([
            'id' => $rand2,
            'name' => 'Fauzan Mustofa',
            'email' => 'fauzanmusthofa.fm@gmail.com',
            'number' => '6281111116098',
            'address' => 'Sawojajar',
            'password' => Hash::make('sunibngalam'),
            'forgot_token' => NULL,
            'remember_token' => Str::random(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('wallet')->insert([
            'id' => $rand2,
            'saldo' => 150000,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Viana Salsabila Tauda
        DB::table('users_bersiis')->insert([
            'id' => $rand3,
            'name' => 'Viana Salsabila Tauda',
            'email' => 'vianatauda@gmail.com',
            'number' => '6281344847038',
            'address' => 'Sawojajar',
            'password' => Hash::make('sunibngalam'),
            'forgot_token' => NULL,
            'remember_token' => Str::random(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('wallet')->insert([
            'id' => $rand3,
            'saldo' => 75000,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Thomas Harman Bintang
        DB::table('users_bersiis')->insert([
            'id' => $rand4,
            'name' => 'Thomas Harman Bintang',
            'email' => 'thomasharman99@gmail.com',
            'number' => '6285171191215',
            'address' => 'Blimbing',
            'password' => Hash::make('sunibngalam'),
            'forgot_token' => NULL,
            'remember_token' => Str::random(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('wallet')->insert([
            'id' => $rand4,
            'saldo' => 90000,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Achmad Agil Susanto
        DB::table('users_bersiis')->insert([
            'id' => $rand5,
            'name' => 'Achmad Agil Susanto',
            'email' => 'ahmadagilsusanto@gmail.com',
            'number' => '6282237174435',
            'address' => 'Sawojajar',
            'password' => Hash::make('sunibngalam'),
            'forgot_token' => NULL,
            'remember_token' => Str::random(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('wallet')->insert([
            'id' => $rand5,
            'saldo' => 65000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
