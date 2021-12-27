<?php

namespace Database\Seeders;

use App\Models\CorporationApplicant;
use Illuminate\Database\Seeder;

class CorporationApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporationApplicant::factory()->count(3)
        ->create();
    }
}
