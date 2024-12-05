<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Exam;

class ExamCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_an_exam(): void
    {
        $admin = User::factory()->create([
            'role_id' => 1,
        ]);
        $examData = [
            'title' => 'Test Exam',
            'date' => now()->addDays(7),
        ];
        $response = $this->actingAs($admin)->post('/admin', $examData);
        $response->assertRedirect('/admin');
        $this->assertDatabaseHas('exams', [
            'title' => 'Test Exam',
        ]);
    }

    public function test_non_admin_cannot_create_an_exam(): void
    {
        $user = User::factory()->create([
            'role_id' => 2,
        ]);
        $examData = [
            'title' => 'Test Exam',
            'date' => now()->addDays(7),
        ];
        $response = $this->actingAs($user)->post('/admin', $examData);
        $response->assertStatus(302); // Il responso è 302 in quanto l'applicazione rimanda all'home in caso di utente non autorizzato.
    }
}
