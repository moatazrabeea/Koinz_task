<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserControllerTest extends TestCase
{
use RefreshDatabase;

/** @test */
    public function user_can_signup()
    {
        $response = $this->postJson('/api/signup', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '01234567853',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User registered successfully',
        ]);
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }
/** @test */
    public function user_can_login()
    {
        // First, create a user to log in with
        $user = \App\Models\User::factory()->create([
            'email' => 'login@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'login@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'user' => [
                'id', 'name', 'email', 'phone_number',
            ],
            'token',
        ]);
    }

    /** @test */
    public function login_fails_with_invalid_credentials()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'wrong@example.com',
            'password' => 'incorrectpassword',
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Invalid credentials',
        ]);
    }
}
