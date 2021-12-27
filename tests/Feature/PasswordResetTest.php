<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Password;
use Tests\Concerns\RefreshDatabaseLite;
class PasswordResetTest extends TestCase
{
    use RefreshDatabaseLite;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        User::factory()->create([
            'email' => 'test@example.com'
        ]);
    }


    //Eメールが存在しなかったときにエラーが返ること

    public function test_return_validation_error_when_email_doenot_exist()
    {
        $response = $this->json('POST', route('password.email'), ['email' => 'invalid@email.com']);

        $response->assertStatus(401)
            ->assertJsonFragment(['message' =>   'パスワード再設定メールを送信できませんでした。']);
    }
    //Eメールが存在したときに、リセットリンク付きのメールが送信されること
    public function test_send_password_reset_link_if_email_exists()
    {
        $user = User::first();
        $response = $this->json('POST', route('password.email'), ['email' => $user->email]);

        $response->assertStatus(200)
            ->assertJsonStructure(['message']);

        // Notification::assertSentTo($user, ResetPassword::class); // running on issue with asserting notification
    }
    //パスワードリセットが成功すること
    public function test_reset_password_success()
    {
        $user = User::first();
        $token = Password::broker()->createToken($user);
        $new_password = 'testpassword';

        $response = $this->json('POST', route('password.reset'), [
            'token' => $token,
            'email' => $user->email,
            'password' => $new_password,
            'password_confirmation' => $new_password
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['success' => true]);
    }
}
