<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    public function create()
    {
        $teacher = Auth::user();
        $courses = Course::query()->where('teacher_id', $teacher->id)->get();

        return view('teacher.assignments-create', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    public function store(StoreAssignmentRequest $request)
    {
        $path = null;

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $path = $attachment->storePubliclyAs('assignments', Str::uuid().'.'.$attachment->getClientOriginalExtension(), 'public');
        }

        Assignment::create([
            'course_id' => $request->input('course_id'),
            'teacher_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'attachment' => $path,
            'due_date' => $request->input('due_date'),
            'max_score' => $request->input('max_score', 100),
        ]);

        return redirect()->route('teacher.assignments')->with('success', 'Assignment created successfully.');
    }
}
