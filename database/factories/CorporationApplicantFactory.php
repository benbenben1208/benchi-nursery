<?php

namespace Database\Factories;

use App\Models\CorporationApplicant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CorporationApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorporationApplicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'temp_id' => Str::uuid(),
            'is_registered' => $this->faker->boolean(50),
            'first_name' => "名前",
            'last_name' => "苗字",
            'first_name_kana' => "ナマエカナ",
            'last_name_kana' => "ミョウジカナ",
            'birth' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'applicant_gender' => $this->faker->numberBetween(1,2),
            'applied_at' => now(),
            'user_id' => 1,
        ];
    }
}
