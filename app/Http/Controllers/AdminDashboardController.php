<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exam;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function show()
    {
        $userCount = User::count();
        $examCount = Exam::count();
        return view('admin.dashboard', compact('userCount', 'examCount'),['pageTitle' => 'Admin Dashboard','metaTitle' => 'Admin Dashboard']);
    }
}
