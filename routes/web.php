<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])
        ->name('student.dashboard');

});

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
        ->name('teacher.dashboard');

});
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'teacher') {
        return redirect()->route('teacher.dashboard');
    }

    return redirect()->route('student.dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
