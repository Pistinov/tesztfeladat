<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*
    Kell egy adminisztrátori belépés lehetőség
    • Használj seedert az első rekord létrehozásához a db-ben
    */
    public function run()
    {
        DB::table('users')->insert([

            'is_admin' => 1,
            'first_name' => 'Teszt',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')

        ]);
    }
    //php artisan db:seed --class=UserSeeder
}
