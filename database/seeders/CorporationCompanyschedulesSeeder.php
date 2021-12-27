<?php

namespace Database\Seeders;

use App\Models\CorporationCompanyschedule;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CorporationCompanyschedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('ats')->table('corporation_companyschedule')->insert([
            [
                'id' => 1,
                'company_id' => 1,
                'start_time' => Carbon::tomorrow(),
                'end_time' => Carbon::tomorrow()->addHours(8),
            ],
            [
                'id' => 2,
                'company_id' => 1,
                'start_time' => Carbon::now()->addDays(2),
                'end_time' => Carbon::now()->addDays(2)->addHours(8),
            ],
            [
                'id' => 3,
                'company_id' => 1,
                'start_time' => Carbon::now()->addDays(3),
                'end_time' => Carbon::now()->addDays(3)->addHours(8),
            ]
            ]);
    }
}
