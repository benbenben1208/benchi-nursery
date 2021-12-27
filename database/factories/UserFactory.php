<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'first_name_kana' => $this->faker->firstKanaName,
            'last_name_kana' => $this->faker->lastKanaName,
            // 'first_name_kana' => $this->faker->firstKanaName,
            // 'last_name_kana' => $this->faker->lastKanaName,
            'birth' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->numberBetween(1,2),
            'created_at' => now(),
            'updated_at' => now()

        ];
    }
}
