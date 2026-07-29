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

    Route::view('/student/courses', 'student.courses')
        ->name('student.courses');

    Route::view('/student/assignments', 'student.assignments')
        ->name('student.assignments');

    Route::view('/student/grades', 'student.grades')
        ->name('student.grades');

    Route::view('/student/calendar', 'student.calendar')
        ->name('student.calendar');

    Route::view('/student/notifications', 'student.notifications')
        ->name('student.notifications');

    Route::view('/student/profile', 'student.profile')
        ->name('student.profile');

    Route::get('/student/course/{slug}', function ($slug) {
        return view('student.course-detail', ['course' => $slug]);
    })->name('student.course.detail');

});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
        ->name('teacher.dashboard');

    Route::view('/teacher/courses', 'teacher.courses')
        ->name('teacher.courses');

    Route::view('/teacher/modules', 'teacher.modules')
        ->name('teacher.modules');

    Route::view('/teacher/assignments', 'teacher.assignments')
        ->name('teacher.assignments');

    Route::view('/teacher/submissions', 'teacher.submissions')
        ->name('teacher.submissions');

    Route::view('/teacher/students', 'teacher.students')
        ->name('teacher.students');

    Route::view('/teacher/grades', 'teacher.grades')
        ->name('teacher.grades');

    Route::view('/teacher/announcements', 'teacher.announcements')
        ->name('teacher.announcements');

    Route::view('/teacher/profile', 'teacher.profile')
        ->name('teacher.profile');

});

require __DIR__.'/auth.php';
