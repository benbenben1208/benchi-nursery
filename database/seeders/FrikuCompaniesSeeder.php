<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrikuCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friku_companies')->insert([
        [

            'username_kana' => '立海株式会社',
            'first_name_kana' => 'セイイチ',
            'last_name_kana' => 'ユキムラ',
            'company_phone' => '0120-223-332',
            'site_url'=> 'https://www.google.com/',
            'logo' => 'https://placehold.jp/150x150.png',
            'address' => '福岡市早良区',
            'is_pickup' => true,
            'is_registered' => true,
            'temp_id' => Str::uuid(),
            'user_id' => 1,
            'plan' => 1
        ],
        [
            'username_kana' => '氷帝株式会社',
            'first_name_kana' => 'ケイゴ',
            'last_name_kana' => 'アトベ',
            'company_phone' => '0120-222-333',
            'site_url'=> 'https://www.google.com/',
            'logo' => 'https://placehold.jp/150x150.png',
            'address' => '福岡市早良区',
            'is_pickup' => false,
            'is_registered' => true,
            'temp_id' => Str::uuid(),
            'user_id' => 2,
            'plan' => 1
        ],
        [
            'username_kana' => '青春株式会社',
            'first_name_kana' => 'クニミツ',
            'last_name_kana' => 'テヅカ',
            'company_phone' => '0120-344-221',
            'site_url'=> 'https://www.google.com/',
            'logo' => 'https://placehold.jp/150x150.png',
            'address' => '福岡市早良区',
            'is_pickup' => false,
            'is_registered' => true,
            'temp_id' => Str::uuid(),
            'user_id' => 3,
            'plan' => 1
        ],
        [
            'username_kana' => '不動峰株式会社',
            'first_name_kana' => 'キッペイ',
            'last_name_kana' => 'タチバナ',
            'company_phone' => '0120-344-221',
            'site_url'=> 'https://www.google.com/',
            'logo' => 'https://placehold.jp/150x150.png',
            'address' => '福岡市早良区',
            'is_pickup' => true,
            'is_registered' => true,
            'temp_id' => Str::uuid(),
            'user_id' => 3,
            'plan' => 1
        ],

        ]);
    }
}
