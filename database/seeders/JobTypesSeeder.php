<?php

namespace Database\Seeders;

use App\Consts\JobConditionConsts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(JobConditionConsts::JOB_TYPES as $index => $jobtype) {
            DB::table('job_types')->insert([
                'id' => $index + 1,
                'job_type_index' => $index,
                'job_type_name' => $jobtype,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
