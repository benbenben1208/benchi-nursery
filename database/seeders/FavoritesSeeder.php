<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon;
        for($i = 1; $i <= 3; $i++) {
            DB::table('favorites')->insert([
                'id' => $i,
                'user_id' => 1,
                'corporation_joboffer_id' => $i,
                'created_at' => $carbon->subDays(rand(1, 10)),
                'updated_at' => now()
            ]);
        }

    }
}
