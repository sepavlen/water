<?php

use App\User;
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
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123qwe'),
                'role' => User::ROLE_ADMIN,
                'status' => User::STATUS_ACTIVE,
            ],
            [
                'name' => 'Глеб',
                'email' => 'gleb2020@gmail.com',
                'password' => Hash::make('gleb2020'),
                'role' => User::ROLE_ADMIN,
                'status' => User::STATUS_ACTIVE,
            ],
            [
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('123qwe'),
                'role' => User::ROLE_MANAGER,
                'status' => User::STATUS_ACTIVE,
            ],
        ]);
    }
}
