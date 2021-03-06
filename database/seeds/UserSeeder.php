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
                'id' => User::ID_ADMIN,
                'name' => 'Глеб',
                'email' => env('ADMIN_EMAIL'),
                'password' => Hash::make(env('ADMIN_PASS')),
                'role' => User::ROLE_ADMIN,
                'status' => User::STATUS_ACTIVE,
            ],
//            [
//                'id' => 2,
//                'name' => 'Admin',
//                'email' => 'admin@gmail.com',
//                'password' => Hash::make('123qwe'),
//                'role' => User::ROLE_ADMIN,
//                'status' => User::STATUS_ACTIVE,
//            ],
//            [
//                'id' => 3,
//                'name' => 'Test',
//                'email' => 'test@gmail.com',
//                'password' => Hash::make('123qwe'),
//                'role' => User::ROLE_MANAGER,
//                'status' => User::STATUS_ACTIVE,
//            ],
        ]);
    }
}
