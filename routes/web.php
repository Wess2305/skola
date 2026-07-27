<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Redirect dashboard berdasarkan role
    Route::get('/dashboard', function () {

        $user = Auth::user();

        if ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        }

        return redirect()->route('student.dashboard');

    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
        ->name('teacher.dashboard');

});

require __DIR__.'/auth.php';