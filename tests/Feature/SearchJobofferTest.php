<?php

namespace Tests\Feature;

use App\Models\CorporationJoboffer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
class SearchJobofferTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        CorporationJoboffer::factory()->count(2)->create(
            [
                'created_at' => Carbon::now()->subDays(13)
            ]

        );
        CorporationJoboffer::factory()->count(2)->create(
            [
                'created_at' => Carbon::now()->subDays(6)
            ]

        );
        CorporationJoboffer::factory()->count(2)->create(
            [
                'created_at' => Carbon::now()->subDays(2)
            ]

        );
        CorporationJoboffer::factory()->count(2)->create(
            [
                'created_at' => Carbon::now()
            ]

        );
    }
    //24時間以内に追加された求人数を検索するテスト
    public function test_search_period_joboffer_in_24hours()
    {
        $response = $this->getJson(route('joboffer.search', ['period' => 1]));

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
    // //  //３日以内に追加された求人数を検索するテスト
    // public function test_search_period_joboffer_in_3days()
    // {
    //     $response = $this->getJson(route('joboffer.search', ['period' => 3]));

    //     $response->assertStatus(200)
    //         ->assertJsonCount(4);
    // }
    // //7日以内に追加された求人数を検索するテスト
    // public function test_search_period_joboffer_in_7days()
    // {
    //     $response = $this->getJson(route('joboffer.search', ['period' => 7]));

    //     $response->assertStatus(200)
    //         ->assertJsonCount(6);
    // }
    // //14日以内に追加された求人数を検索するテスト
    // public function test_search_period_joboffer_in_14days()
    // {
    //     $response = $this->getJson(route('joboffer.search', ['period' => 14]));

    //     $response->assertStatus(200)
    //         ->assertJsonCount(8);
    // }
}
