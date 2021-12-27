<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturedArticleContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured_article_contents')->insert([
            'id' => 1,
            'featured_company_article_id' => 1,
            'subTitle' => 'サブタイトル',
            'image1' => 'https://placehold.jp/400x300.png',
            'image1Caption' => 'image1のキャプション',
            'image2' => 'https://placehold.jp/400x300.png',
            'image2Caption' => 'image2のキャプション',
            'body' => '本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |本文やでー |'
        ]);
    }
}
