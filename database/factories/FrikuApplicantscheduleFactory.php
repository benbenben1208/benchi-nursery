<?php

namespace Database\Factories;

use App\Models\FrikuApplicantschedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FrikuApplicantscheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FrikuApplicantschedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $carbon = new Carbon();
        return [
            'friku_joboffer_id' => 1,
            'friku_applicant_id' => 1,
            'temp_id' => Str::uuid(),
            'status' => $this->faker->numberBetween(1, 2),
            'applied_at' => $carbon->subDays(rand(1, 30))
        ];
    }
}
