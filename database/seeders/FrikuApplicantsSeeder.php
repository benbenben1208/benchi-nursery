<?php

namespace Database\Seeders;

use App\Models\FrikuApplicant;
use Illuminate\Database\Seeder;

class FrikuApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrikuApplicant::factory(3)->create();
    }
}
