<?php

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
        DB::table('users')->insert([
            'name' => 'Serg',
            'email' => 'sepavlen@gmail.com',
            'password' => Hash::make('123123'),
            'role' => \App\User::ROLE_ADMIN,
            'status' => \App\User::STATUS_ACTIVE,
        ]);
    }
}
