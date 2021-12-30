<?php

namespace Tests\Feature;

use App\Models\CorporationJoboffer;
use App\Models\Favorite;
use App\Models\FrikuJoboffer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Concerns\RefreshDatabaseLite;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabaseLite;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->user = User::factory()->create();
    }
    //OM求人お気に入り追加
    public function testAttachFavoritesTest()
    {

        $joboffer = CorporationJoboffer::factory()->create();
        $joboffer2 = CorporationJoboffer::factory()->create();
        $joboffer3 = CorporationJoboffer::factory()->create();
        $data = [
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer->id,
        ];
        $data2 = [
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer2->id,
        ];
        $data3 = [
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer3->id,
        ];

        $this->actingAs($this->user, 'users')->putJson(route('joboffer.favorites.attach'), $data);
        $this->actingAs($this->user, 'users')->putJson(route('joboffer.favorites.attach'), $data2);
        $response = $this->actingAs($this->user, 'users')->putJson(route('joboffer.favorites.attach'), $data3);
        $response->assertStatus(201)
            ->assertJsonCount(3);
    }

    //OM求人お気に入り削除
    public function testDetachFavoritesTest()
    {
        $joboffer = CorporationJoboffer::factory()->create();
        $joboffer2 = CorporationJoboffer::factory()->create();
        $joboffer3 = CorporationJoboffer::factory()->create();
        Favorite::create([
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer->id,
        ]);
        Favorite::create([
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer2->id,
        ]);
        Favorite::create([
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer3->id,
        ]);

        $data = [
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer->id,
        ];
        $response = $this->actingAs($this->user, 'users')->deleteJson(route('joboffer.favorites.detach'), $data);
        $response
            ->assertStatus(200)
            ->assertJsonCount(2);
    }
    //ログインユーザーではないユーザーがOM求人お気に入り追加処理をおこなったときにエラーを返す
    public function testNotAuthorizedAccess()
    {
        $joboffer = CorporationJoboffer::factory()->create();
        $data = [
            'user_id' => $this->user->id,
            'corporation_joboffer_id' => $joboffer->id,
        ];


        $response = $this->putJson(route('joboffer.favorites.attach'), $data);

        $response->assertStatus(401);
    }
    //Fリク求人にお気に入り追加
    public function testAttachFrikuFavoritestest()
    {
        $frikuJoboffer = FrikuJoboffer::factory()->create();
        $frikuJoboffer2 = FrikuJoboffer::factory()->create();
        $frikuJoboffer3 = FrikuJoboffer::factory()->create();
        $this->actingAs($this->user, 'users')
        ->putJson(
            route('friku_joboffer.favorites.attach', ['frikuJoboffer' => $frikuJoboffer->id]),
        );
        $this->actingAs($this->user, 'users')
        ->putJson(
            route('friku_joboffer.favorites.attach', ['frikuJoboffer' => $frikuJoboffer2->id]),
        );
        $response =
            $this->actingAs($this->user, 'users')
            ->putJson(
                route('friku_joboffer.favorites.attach', ['frikuJoboffer' => $frikuJoboffer3->id]),
            );

        $response->assertStatus(201);

        $this->assertEquals(3, $this->user->frikuFavorites()->count());
    }
    //Fリク求人お気に入り削除
    public function testDetachFrikuFavoritestest()
    {

        $frikuJoboffer = FrikuJoboffer::factory()->create();
        $frikuJoboffer2 = FrikuJoboffer::factory()->create();
        $frikuJoboffer3 = FrikuJoboffer::factory()->create();
        $this->user->frikuFavorites()->attach($frikuJoboffer->id);
        $this->user->frikuFavorites()->attach($frikuJoboffer2->id);
        $this->user->frikuFavorites()->attach($frikuJoboffer3->id);

        $response = $this->actingAs($this->user, 'users')
            ->deleteJson(
                route('friku_joboffer.favorites.detach', ['frikuJoboffer' => $frikuJoboffer->id]),
            );
        $response->assertStatus(200);

        $this->assertEquals(2, $this->user->frikuFavorites()->count());
    }
}
