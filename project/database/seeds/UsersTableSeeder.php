<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'password' => Hash::make('admin'),
                'rights' => 'admin',
                'is_admin' => 1,
                'is_moder' => 1
            ],
            [
                'name' => 'manager',
                'password' => Hash::make('manager'),
                'rights' => 'manager',
                'is_admin' => 0,
                'is_moder' => 1
            ]
        ]);
    }
}
