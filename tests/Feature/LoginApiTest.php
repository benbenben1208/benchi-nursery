<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\Concerns\RefreshDatabaseLite;

class LoginApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use RefreshDatabase;
    use RefreshDatabaseLite;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            // 'email' => 'test100@example.com',
            'password' =>  Hash::make('password')
        ]);
    }

    public function testExample()
    {
        $a = 2;
        $b = 2;

        $this->assertSame($a, $b);
    }
    // public function testLoginSuccess()
    // {
    //     $loginData = [
    //         'email' => $this->user->email,
    //         'password' => 'password'
    //     ];

    //     $response = $this->postJson('api/user/login', $loginData);
    //     $response->assertOk();
    // }
    // public function testLogoutSuccess(): void
    // {

    //     $response = $this->actingAs($this->user, 'users')
    //         ->post('api/user/logout');

    //     $response->assertStatus(200);

    // }
}
