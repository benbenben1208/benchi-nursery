<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([

            [
                'username' => '担当者 浩二',
                'first_name' => '浩二',
                'last_login' => null,
                'last_name' => '担当者',
                'is_superuser' => false,
                'is_staff' => true,
                'is_active' => true,
                'date_joined' => now(),
                'email' => 'staff1@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => '担当者 晋三',
                'first_name' => '晋三',
                'last_login' => null,
                'last_name' => '担当者',
                'is_superuser' => false,
                'is_staff' => true,
                'is_active' => true,
                'date_joined' => now(),
                'email' => 'staff2@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => '担当者 誠司',
                'first_name' => '誠司',
                'last_login' => null,
                'last_name' => '担当者',
                'is_superuser' => false,
                'is_staff' => true,
                'is_active' => true,
                'date_joined' => now(),
                'email' => 'staff3@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
