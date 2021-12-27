<?php

namespace Database\Seeders;

use App\Models\AuthUser;
use App\Models\CorporationCompany;
use Illuminate\Database\Seeder;

class CompanyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AuthUser::factory(3)
            ->has(CorporationCompany::factory()->count(2), 'authUserCompanies')
            // ->has(CorporationJoboffer::factory()->count(3))
            ->create();
    }
}
