<?php

namespace Database\Seeders;

use App\Models\CorporationJoboffer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
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
                'name' => '田中 太郎',
                'email' => 'user1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'first_name' => '太郎',
                'last_name' => '田中',
                'first_name_kana' => 'タロウ',
                'last_name_kana' => 'タナカ',
                'birth' => '1990-01-01',
                'phone' => '09012345678',
                'gender' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '山田 太郎',
                'email' => 'user2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'first_name' => '太郎',
                'last_name' => '田中',
                'first_name_kana' => 'タロウ',
                'last_name_kana' => 'タナカ',
                'birth' => '1990-01-01',
                'phone' => '09012345678',
                'gender' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '長田 太郎',
                'email' => 'user3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'first_name' => '太郎',
                'last_name' => '長田',
                'first_name_kana' => 'タロウ',
                'last_name_kana' => 'オサダ',
                'birth' => '1990-01-01',
                'phone' => '09012345678',
                'gender' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // User::factory(3)
        //     ->has(CorporationJoboffer::factory()->count(3), 'favoriteJobs')
        //     ->create();

        // for ($i = 0; $i < 4; $i++) {
        //     User::factory()
        //         ->hasAttached(
        //             CorporationJoboffer::factory()->count(3),
        //             [
        //                 'is_offer' => (bool)random_int(0, 1),
        //             ],
        //             'applieJobs'
        //         )
        //         ->create();
        // }
    }
}
