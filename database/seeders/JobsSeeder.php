<?php

namespace Database\Seeders;

use App\Models\CorporationJoboffer;
use App\Models\Favorite;
use Illuminate\Database\Seeder;
use App\Models\User;
class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorporationJoboffer::factory(50)->create();
        
        // for($i = 0; $i < 4; $i ++) {
        //     CorporationJoboffer::factory()
        //     ->has(Favorite::factory()->count(3), )

        //     ->hasAttached(
        //         User::factory()->count(3),
        //         [
        //             'status' => random_int(1,3),
        //             'type' => random_int(1,2),
        //         ],
        //         'offerUsers',
        //         User::factory()->count(3),
        //         [
        //             'is_offer' => random_int(0,1),

        //         ],
        //         'appliedByUsers',

        //     )
        //     //  ->has(User::factory()->count(3), )
        //      //     ->create();
        //     ->create();
        // }

        // ->has(CorporationJoboffer::factory()->count(3), 'favoritedByUsers')
    }
}
