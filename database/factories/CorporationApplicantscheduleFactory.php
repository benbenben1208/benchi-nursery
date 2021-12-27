<?php

namespace Database\Factories;

use App\Models\CorporationApplicant;
use App\Models\CorporationApplicantSchedule;
use App\Models\CorporationJoboffer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CorporationApplicantScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorporationApplicantSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $carbon = new Carbon();
        return [
            'job_offer_id' => $this->faker->unique()->numberBetween(1, 4),
            'applicant_id' => 1,
            'temp_id' => Str::uuid(),
            'status' => $this->faker->numberBetween(1, 2),
            'applied_at' => $carbon->subDays(rand(1, 10))
        ];
    }
}
