<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => "admin",
                'email' => 'admin@gmail.com',
                'usertype' => 'admin',
                'password' => Hash::make('password'),
            ],
            [
                'name' => "staff",
                'email' => 'staff@gmail.com',
                'usertype' => 'staff',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
