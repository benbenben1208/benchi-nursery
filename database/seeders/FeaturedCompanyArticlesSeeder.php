<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturedCompanyArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured_company_articles')->insert([
            'id' => 1,
            'friku_company_id' => 2,
            'is_released' => true,
            'title' => 'タイトルテストタイトルテスト',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'thumbnail_url' => 'https://placehold.jp/150x150.png',
            'thumbnail_height' => 150,
            'thumbnail_width' => 150,
        ]);
    }
}
