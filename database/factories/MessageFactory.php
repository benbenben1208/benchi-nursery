<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MessageRoom;
class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_room_id' => MessageRoom::class,
            'send_by' => $this->faker->numberBetween(1,2),
            'messages' => $this->faker->realText(20)
        ];
    }
}
