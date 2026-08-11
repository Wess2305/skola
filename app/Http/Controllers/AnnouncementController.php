<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function create()
    {
        $teacher = Auth::user();

        $courses = Course::where('teacher_id', $teacher->id)->get();

        return view('teacher.announcement-create', [
            'courses' => $courses,
        ]);
    }

    public function store(Request $request)
    {
        $teacher = Auth::user();

        $validated = $request->validate([
            'course_id' => ['nullable', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        if (!empty($validated['course_id'])) {
            $course = Course::findOrFail($validated['course_id']);

            if ($course->teacher_id !== $teacher->id) {
                abort(403);
            }
        }

        Announcement::create([
            'teacher_id' => $teacher->id,
            'course_id' => $validated['course_id'] ?? null,
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('teacher.announcements')
            ->with('success', 'Announcement published successfully.');
    }

    public function teacherIndex()
    {
        $teacher = Auth::user();

        $announcements = Announcement::where('teacher_id', $teacher->id)
            ->with('course')
            ->latest()
            ->get();

        return view('teacher.announcements', [
            'teacher' => $teacher,
            'announcements' => $announcements,
        ]);
    }

    public function studentIndex()
    {
        $announcements = Announcement::with(['teacher', 'course'])
            ->latest()
            ->get();

        return view('student.announcements', [
            'announcements' => $announcements,
        ]);
    }
}