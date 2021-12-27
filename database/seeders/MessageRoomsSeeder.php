<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MessageRoom;
use App\Models\Message;
class MessageRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MessageRoom::factory(4)
            ->has(Message::factory()->count(20), 'messages')
            ->create();
    }
}
