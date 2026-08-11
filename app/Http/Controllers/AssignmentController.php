<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    public function create()
    {
        $teacher = Auth::user();
        $courses = Course::query()->where('teacher_id', $teacher->id)->get();

        if ($courses->isEmpty()) {
            $this->ensureSampleCourseExists($teacher);
            $courses = Course::query()->where('teacher_id', $teacher->id)->get();
        }

        return view('teacher.assignments-create', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    protected function ensureSampleCourseExists(User $teacher): void
    {
        if (Course::query()->where('teacher_id', $teacher->id)->exists()) {
            return;
        }

        Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Mathematics',
            'description' => 'Core algebra and geometry lessons.',
        ]);
    }

    public function store(StoreAssignmentRequest $request)
    {
        $path = null;

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $path = $attachment->storePubliclyAs('assignments', Str::uuid().'.'.$attachment->getClientOriginalExtension(), 'public');
        }

        $data = [
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'max_score' => $request->input('max_score', 100),
        ];

        if (Schema::hasColumn('assignments', 'attachment')) {
            $data['attachment'] = $path;
        }

        if (Schema::hasColumn('assignments', 'teacher_id')) {
            $data['teacher_id'] = Auth::id();
        }

        Assignment::create($data);

        return redirect()->route('teacher.assignments')->with('success', 'Assignment created successfully.');
    }
}
