<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\FeaturedCompanyArticle;
use App\Models\FrikuApplicant;
use App\Models\FrikuJoboffer;
use App\Models\HiringSystem;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UsersTableSeeder::class,

        ]);
    }
}
