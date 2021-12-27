<?php

namespace Database\Seeders;

use App\Models\FrikuJoboffer;
use Illuminate\Database\Seeder;

class FrikuJoboffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrikuJoboffer::factory(3)->create();
        FrikuJoboffer::factory(3)->create([
            'company_id' => 2,
        ]);
        FrikuJoboffer::factory(3)->create([
            'company_id' => 3,
        ]);
        FrikuJoboffer::factory(4)->create([
            'company_id' => 4,
        ]);
    }
}
