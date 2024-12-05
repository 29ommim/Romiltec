<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;


class ExamPublicController extends Controller
{
    public function show()
    {
        $exams = Exam::all();
        return view('showexams', compact('exams'), ['pageTitle' => 'Lista degli esami', 'metaTitle' => 'Lista degli esami']);
    }
}
