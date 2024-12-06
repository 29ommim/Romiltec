<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamPublicController;
use App\Http\Controllers\ExamUserController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SupervisorMiddleware;
use App\Models\Exam;
use App\Models\Role;
use App\Models\User;
use App\Http\Middleware\GiaLoggato;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegisterForm')->middleware([GiaLoggato::class]); 
Route::post('/register', [UserController::class, 'register'])->name('registerUser');   

// Route per il login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware([GiaLoggato::class]);
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

// Route per la sezione admin
Route::get('/admin', [AdminDashboardController::class, 'show'])->middleware([AdminMiddleware::class])->name('admin');
Route::post('/admin', [ExamController::class, 'store'])->middleware([AdminMiddleware::class])->name('exams.store');

Route::get('/supervisor', [ExamUserController::class, 'index'])->middleware([SupervisorMiddleware::class])->name('supervisor');
Route::post('/supervisor', [ExamUserController::class, 'store'])->middleware([SupervisorMiddleware::class])->name('examuser.store');

Route::get('/exams', [ExamPublicController::class, 'show'])->name('showall');

// Route per il logout
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');
Route::get('/logout', [UserController::class, 'logout'])->name('logoutUserget');
