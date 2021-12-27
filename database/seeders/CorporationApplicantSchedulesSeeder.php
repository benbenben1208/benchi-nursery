<?php

namespace Database\Seeders;

use App\Models\CorporationApplicantschedule;
use Illuminate\Database\Seeder;

class CorporationApplicantSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporationApplicantschedule::factory()->count(3)->create();
    }
}
