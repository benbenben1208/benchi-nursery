<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrikuFavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        for ($i = 1; $i <= 3; $i++) {
            DB::table('friku_favorites')->insert([

                [
                    'id' => $i,
                    'friku_joboffer_id' => $i,
                    'user_id' => 1,
                    'created_at' => $carbon->subDays(random_int(1,10)),
                    'updated_at' => now(),
                ],

            ]);
        }
    }
}
