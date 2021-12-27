<?php

namespace Database\Seeders;

use App\Consts\JobConditionConsts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(JobConditionConsts::WORK_TYPES as $index => $workType) {
            DB::table('work_types')->insert([
                'id' => $index + 1,
                'work_type_index' => $index,
                'work_type_name' => $workType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
