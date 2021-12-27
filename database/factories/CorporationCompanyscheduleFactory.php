<?php

namespace Database\Factories;

use App\Models\CorporationCompany;
use App\Models\CorporationCompanyschedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporationCompanyscheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorporationCompanyschedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => CorporationCompany::factory(),
            'start_time' => '2021-12-01 10:00',
            'end_time' =>  '2021-12-01 18:00'
        ];
    }
}
