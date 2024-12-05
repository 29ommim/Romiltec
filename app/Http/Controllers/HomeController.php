<?php

namespace App\Http\Controllers;

use App\Models\ExamUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;



class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $userId = Auth::id();
            $exams = ExamUser::where('user_id', $userId)->with('exam')->get();

            return view('home', ['exams' => $exams, 'user' => $user, 'pageTitle' => 'Homepage', 'metaTitle' => 'Homepage']);
        }
        return view('home', ['pageTitle' => 'Homepage', 'metaTitle' => 'Homepage']);
    }
}
