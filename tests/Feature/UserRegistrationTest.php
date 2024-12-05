<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserRegistrationTest extends TestCase
{
    use RefreshDatabase; 
    public function test_user_can_register()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        $response = $this->post('/register', $userData);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'role_id' => 3,
        ]);

    }
}
