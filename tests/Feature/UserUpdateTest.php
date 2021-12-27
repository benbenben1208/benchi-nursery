<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Concerns\RefreshDatabaseLite;

class UserUpdateTest extends TestCase
{

    use RefreshDatabaseLite;
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->user = User::factory()->create([
            'password' =>  Hash::make('password')
        ]);
    }
    public function testExample()
    {
        $a = 2;
        $b = 2;

        $this->assertSame($a, $b);
    }
    //ユーザー情報更新テスト
    // public function test_user_upload()
    // {
    //     Storage::fake('local');
    //     $dummy = UploadedFile::fake()->create('dummy.jpg');
    //     $response = $this->actingAs($this->user, 'users')
    //         ->json('patch', route('user.edit', ['user' => $this->user->id]), [
    //             'image' => $dummy,
    //             'first_name' => 'さる',
    //             'last_name' => 'ごりら',
    //             'email' => 'fefefe@example.com',
    //             'password' => 'password',
    //             'birth' => '2000-01-01',
    //             'gender' => 1
    //         ]);
    //     $response->assertStatus(200)
    //         ->assertJsonFragment([
    //             'img_path' => '/users/dummy.jpg',
    //         ])
    //         ->assertJson([
    //             'first_name' => 'さる'
    //         ]);
    //     Storage::disk('local')->assertExists('/public/users/' . $dummy->hashName());
    // }
    // //データベースエラー時は画像がアップロードされない。
    // public function test_cannot_upload_file_when_database_error()
    // {

    //     $this->artisan('migrate:rollback');

    //     Storage::fake('local');
    //     $response = $this->actingAs($this->user, 'users')
    //         ->putJson(route('user.edit', ['user' => $this->user->id]), [
    //             'image' => UploadedFile::fake()->create('dummy.jpg'),
    //         ]);
    //     $this->artisan('migrate');
    //     $response->assertStatus(500);
    //     $this->assertEquals(0, count(Storage::disk('local')->files()));
    // }

}
