<?php

namespace Database\Factories;

use App\Models\AuthUser;
use App\Models\MessageRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Job;
use App\Models\CompanyUser;
use App\Models\CorporationJoboffer;

class MessageRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'corporation_joboffer_id' => CorporationJoboffer::factory(),
            'auth_user_id' => AuthUser::factory(),
            'reply_status' => $this->faker->numberBetween(1,3)
        ];
    }
}
