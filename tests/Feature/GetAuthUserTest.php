<?php

namespace Tests\Feature;

use App\Models\CorporationApplicant;
use App\Models\CorporationApplicantschedule;
use App\Models\CorporationJoboffer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAuthUserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->user = User::factory()->create();
        $this->joboffer = CorporationJoboffer::factory()->create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUser()
    {
        $this->actingAs($this->user, 'users')->postJson(route('joboffer.omOriginal.apply', ['corporationJoboffer' =>  $this->joboffer->id]));


        $response = $this->actingAs($this->user, 'users')
            ->getJson('/api/user');

        $response->assertStatus(200);
    }
}
