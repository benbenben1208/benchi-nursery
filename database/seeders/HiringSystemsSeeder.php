<?php

namespace Database\Seeders;

use App\Consts\JobConditionConsts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HiringSystemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(JobConditionConsts::HIRING_SYSTEMS as $index => $hiringSystem) {
            DB::table('hiring_systems')->insert([
                'id' => $index + 1,
                'hiring_system_index' => $index,
                'hiring_system_name' => $hiringSystem,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
