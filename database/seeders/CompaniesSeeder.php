<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyUser;
use App\Models\CorporationCompany;
use App\Models\CorporationJoboffer;
class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporationCompany::factory(3)
            // ->has(CompanyUser::factory()->count(2))
            ->has(CorporationJoboffer::factory()->count(3), 'joboffers')
            ->create();
    }
}
