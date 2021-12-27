<?php

namespace Database\Factories;

use App\Models\AuthUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AuthUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'username' => $this->faker->name(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'is_superuser' => $this->faker->boolean(50),
            'is_staff' => $this->faker->boolean(50),
            'is_active' => $this->faker->boolean(50),
            'date_joined' => $this->faker->dateTimeBetween('-1 years', '-1 days'),
        ];
    }
}
