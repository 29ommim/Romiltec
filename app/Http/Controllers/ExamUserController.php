<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use App\Models\ExamUser;
use Illuminate\Support\Facades\Auth;

class ExamUserController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $users = User::where('role_id', 3)->get();

        return view('supervisor.dashboard', compact('exams', 'users'), ['pageTitle' => 'Supervisor Dashboard', 'metaTitle' => 'Supervisor Dashboard']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'exam_id' => 'required|exists:exams,id',
            'grade' => 'required|integer|between:18,31',
        ], [
            'grade.between' => 'Il voto deve essere tra 18 e 31.',
        ]);
        $exam = Exam::find($request->exam_id);
        $examTitle = $exam->title;

        $examUser  = ExamUser::where('user_id', $request->user_id)
            ->whereHas('exam', function ($query) use ($examTitle) {
                $query->where('title', $examTitle);
            })
            ->first();
        if ($examUser) {

            return redirect()->back()->withErrors(['error' => 'Voto già assegnato per questo esame.']);
        }
        ExamUser::create([
            'user_id' => $request->user_id,
            'exam_id' => $request->exam_id,
            'grade' => $request->grade,
        ]);

        return redirect()->back()->with('success', 'Voto assegnato con successo!');

    }
}
