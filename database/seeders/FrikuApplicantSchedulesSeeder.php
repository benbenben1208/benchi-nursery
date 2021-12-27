<?php

namespace Database\Seeders;


use App\Models\FrikuApplicantschedule;
use Illuminate\Database\Seeder;

class FrikuApplicantSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrikuApplicantschedule::factory(3)->create();
    }
}
