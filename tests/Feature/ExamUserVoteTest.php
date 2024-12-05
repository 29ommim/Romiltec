<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Exam;
use App\Models\ExamUser;

class ExamUserVoteTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_supervisor_can_assign_grade_to_student_exam(): void
    {
        $supervisor = User::factory()->create([
            'role_id' => 2,
        ]);
        $exam = Exam::factory()->create();
        $student = User::factory()->create();
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 24,
        ];
        $response = $this->actingAs($supervisor)->post('/supervisor', $scoreData);
        $response->assertSessionHas('success', 'Voto assegnato con successo!');
        $this->assertDatabaseHas('exam_user', [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 24,
        ]);
    }

    // testiamo se un utente supervisor (role id 2) puà assegnare un altro voto allo stesso esame dello stesso studente 
    public function test_supervisor_cannot_assign_different_grade_to_same_student_exam(): void
    {
        $supervisor = User::factory()->create([
            'role_id' => 2,
        ]);
        $exam = Exam::factory()->create();
        $student = User::factory()->create();
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 24,
        ];
        $response = $this->actingAs($supervisor)->post('/supervisor', $scoreData);
        $response->assertSessionHas('success', 'Voto assegnato con successo!');
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 31,
        ];
        $response = $this->actingAs($supervisor)->post('/supervisor', $scoreData);
        $response->assertSessionHasErrors();
        $this->assertDatabaseHas('exam_user', [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 24,
        ]);
    }

    // testiamo se un utente supervisor (role id 2) può assegnare un voto ad un esame che ha lo stesso nome ma data differente allo stesso utente
    public function test_supervisor_cannot_assign_a_grade_to_an_exam_with_same_title_to_same_student(): void
    {
        $supervisor = User::factory()->create([
            'role_id' => 2,
        ]);
        $exam1 = Exam::factory()->create([
            'title' => "Matematica",
            'date' => "2024-12-09",
        ]);
        $exam2 = Exam::factory()->create([
            'title' => "Matematica",
            'date' => "2024-12-12",
        ]);
        $student = User::factory()->create();
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam1->id,
            'grade' => 24,
        ];
        $response = $this->actingAs($supervisor)->post('/supervisor', $scoreData);
        $response->assertSessionHas('success', 'Voto assegnato con successo!');
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam2->id,
            'grade' => 31,
        ];
        $response = $this->actingAs($supervisor)->post('/supervisor', $scoreData);
        $response->assertSessionHasErrors();
    }

    // testiamo se un utente NON supervisor (role id 3) puà assegnare un voto all'esame di uno studente
    public function test_non_supervisor_cannot_assign_grade_to_student_exam()
    {
        $user = User::factory()->create([
            'role_id' => 3,
        ]);
        $exam = Exam::factory()->create();
        $student = User::factory()->create();
        $scoreData = [
            'user_id' => $student->id,
            'exam_id' => $exam->id,
            'grade' => 24,
        ];
        $response = $this->actingAs($user)->post('/supervisor', $scoreData);
        $response->assertStatus(302); // Il responso è 302 in quanto l'applicazione rimanda all'home in caso di utente non autorizzato.
    }
}
