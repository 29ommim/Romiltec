<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_user_email_must_be_unique(): void
    {
        User::factory()->create(['email' => 'test@example.com']);
        $this->expectException(\Illuminate\Database\QueryException::class);
        User::factory()->create(['email' => 'test@example.com']);
    }
}
