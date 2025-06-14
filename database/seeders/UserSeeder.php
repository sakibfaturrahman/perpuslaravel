<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'Guru',
            'username' => 'guru@gmail.com',
            'phone' => '0977675754',
            'alamat' => 'cibuntung',
            'password' => Hash::make('123'),
            'role_id' => 1, // Role Admin
        ]);
    }
}
