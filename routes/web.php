<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ContactMessageController;
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

    Route::get('/student/courses', [StudentController::class, 'courses'])
        ->name('student.courses');

    Route::post('/student/courses/{course}/enroll', [StudentController::class, 'enroll'])
        ->name('student.courses.enroll');

    Route::get('/student/assignments', [StudentController::class, 'assignments'])
        ->name('student.assignments');

    Route::get('/student/grades', [StudentController::class, 'grades'])
        ->name('student.grades');

    Route::post('/student/assignments/{assignment}/submit', [StudentController::class, 'submitAssignment'])
        ->name('student.assignments.submit');

    Route::get('/student/submissions/{submission}/download', [StudentController::class, 'downloadSubmission'])
        ->name('student.submissions.download');

    Route::view('/student/calendar', 'student.calendar')
        ->name('student.calendar');

    Route::view('/student/notifications', 'student.notifications')
        ->name('student.notifications');

    Route::view('/student/profile', 'student.profile')
        ->name('student.profile');

    Route::get('/student/course/{slug}', function ($slug) {
        return view('student.course-detail', ['course' => $slug]);
    })->name('student.course.detail');

    Route::get('/student/contact', [ContactMessageController::class, 'create'])
        ->name('student.contact');

    Route::post('/student/contact', [ContactMessageController::class, 'store'])
        ->name('student.contact.store');

});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:teacher'])->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])
        ->name('teacher.dashboard');

    Route::get('/teacher/courses', [TeacherController::class, 'courses'])
        ->name('teacher.courses');

    Route::get('/teacher/modules', [TeacherController::class, 'modules'])
        ->name('teacher.modules');

    Route::get('/teacher/assignments', [TeacherController::class, 'assignments'])
        ->name('teacher.assignments');

    Route::get('/teacher/assignments/create', [AssignmentController::class, 'create'])
        ->name('teacher.assignments.create');

    Route::post('/teacher/assignments', [AssignmentController::class, 'store'])
        ->name('teacher.assignments.store');

    Route::get('/teacher/submissions', [TeacherController::class, 'submissions'])
        ->name('teacher.submissions');

    Route::post('/teacher/submissions/{submission}/grade', [TeacherController::class, 'gradeSubmission'])
        ->name('teacher.submissions.grade');

    Route::get('/teacher/submissions/{submission}/download', [TeacherController::class, 'downloadSubmission'])
        ->name('teacher.submissions.download');

    Route::get('/teacher/students', [TeacherController::class, 'students'])
        ->name('teacher.students');

    Route::get('/teacher/grades', [TeacherController::class, 'grades'])
        ->name('teacher.grades');

    Route::get('/teacher/announcements', [TeacherController::class, 'announcements'])
        ->name('teacher.announcements');

    Route::view('/teacher/profile', 'teacher.profile')
        ->name('teacher.profile');

    Route::get('/teacher/messages', [ContactMessageController::class, 'inbox'])
        ->name('teacher.messages');

});

require __DIR__.'/auth.php';
