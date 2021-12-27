<?php

namespace Tests\Feature;

use App\Models\CorporationApplicant;
use App\Models\CorporationApplicantschedule;
use App\Models\CorporationJoboffer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplyOmJobofferTest extends TestCase
{
    public function setUp():void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->user = User::factory()->create();
        $this->anotherUser = User::factory()->create();
        $this->joboffer = CorporationJoboffer::factory()->create();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_applyOmJoboffer()
    {
        $anotherResponse = $this->actingAs($this->anotherUser, 'users')->postJson(route('joboffer.omOriginal.apply', ['corporationJoboffer' =>  $this->joboffer->id ]));
        $response = $this->actingAs($this->user, 'users')->postJson(route('joboffer.omOriginal.apply', ['corporationJoboffer' =>  $this->joboffer->id ]));


        $applicant = CorporationApplicant::orderBy('id', 'desc')->first();
        $schedule = CorporationApplicantschedule::orderBy('id', 'desc')->first();
        $response->assertStatus(201)
            ->assertJson(['message' => 'success']);
        $this->assertSame($this->user->id, $applicant->user_id);
        $this->assertSame($this->joboffer->id, $schedule->job_offer_id);
    }
    public function test_cant_applyOmJoboffer_if_already_applied()
    {
        $response = $this->actingAs($this->user, 'users')->postJson(route('joboffer.omOriginal.apply', ['corporationJoboffer' =>  $this->joboffer->id ]));
        $response = $this->actingAs($this->user, 'users')->postJson(route('joboffer.omOriginal.apply', ['corporationJoboffer' =>  $this->joboffer->id ]));
        $response->assertStatus(400)
            ->assertJson(['message' => 'すでに応募済みです。']);
        ;

    }

}
