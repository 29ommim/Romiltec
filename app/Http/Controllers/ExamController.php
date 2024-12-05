<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;



class ExamController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:exams,title,NULL,id,date,' . $request->date,
            'date' => 'required|date',
        ]);

        Exam::create([
            'title' => $request->title,
            'date' => $request->date,
        ]);

        return redirect()->route('admin')->with('success', 'Esame aggiunto con successo!');
    }


}
