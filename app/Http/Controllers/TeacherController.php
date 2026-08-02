<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeSubmissionRequest;
use App\Models\Announcement;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct(private readonly DashboardDataService $dashboardDataService)
    {
    }

    public function dashboard()
    {
        $teacher = Auth::user();
        $metrics = $this->dashboardDataService->getTeacherMetrics($teacher->id);

        return view('teacher.dashboard', [
            'teacher' => $teacher,
            'courses' => $metrics['courses'],
            'assignments' => $metrics['assignments'],
            'pendingGrades' => $metrics['pendingGrades'],
            'studentCount' => $metrics['studentCount'],
        ]);
    }

    public function courses()
    {
        $teacher = Auth::user();
        $courses = Course::query()->where('teacher_id', $teacher->id)->withCount('students')->withCount('assignments')->withCount('modules')->get();

        return view('teacher.courses', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    public function modules()
    {
        $teacher = Auth::user();
        $courses = Course::query()->where('teacher_id', $teacher->id)->with('modules')->get();

        return view('teacher.modules', [
            'teacher' => $teacher,
            'courses' => $courses,
        ]);
    }

    public function assignments()
    {
        $teacher = Auth::user();
        $assignments = Assignment::query()
            ->whereHas('course', fn ($query) => $query->where('teacher_id', $teacher->id))
            ->with(['course', 'submissions' => fn ($query) => $query->with('student')])
            ->get();
        $courses = Course::query()->where('teacher_id', $teacher->id)->get();

        return view('teacher.assignments', [
            'teacher' => $teacher,
            'assignments' => $assignments,
            'courses' => $courses,
        ]);
    }

    public function submissions()
    {
        $teacher = Auth::user();
        $submissions = Submission::query()->whereHas('assignment.course', fn ($query) => $query->where('teacher_id', $teacher->id))->with('student', 'assignment.course', 'grade')->get();

        return view('teacher.submissions', [
            'teacher' => $teacher,
            'submissions' => $submissions,
        ]);
    }

    public function students()
    {
        $teacher = Auth::user();
        $students = User::query()->whereHas('enrolledCourses', fn ($query) => $query->where('teacher_id', $teacher->id))->get();

        return view('teacher.students', [
            'teacher' => $teacher,
            'students' => $students,
        ]);
    }

    public function grades()
    {
        $teacher = Auth::user();
        $submissions = Submission::query()->whereHas('assignment.course', fn ($query) => $query->where('teacher_id', $teacher->id))->with('student', 'assignment.course', 'grade')->get();

        return view('teacher.grades', [
            'teacher' => $teacher,
            'submissions' => $submissions,
        ]);
    }

    public function announcements()
    {
        $teacher = Auth::user();
        $announcements = Announcement::query()->where('teacher_id', $teacher->id)->with('course')->get();

        return view('teacher.announcements', [
            'teacher' => $teacher,
            'announcements' => $announcements,
        ]);
    }

    public function gradeSubmission(Submission $submission, GradeSubmissionRequest $request)
    {
        $teacher = Auth::user();

        if ($submission->assignment->course->teacher_id !== $teacher->id) {
            abort(403, 'You can only grade submissions for your own courses.');
        }

        $submission->grade()->updateOrCreate([], [
            'submission_id' => $submission->id,
            'teacher_id' => $teacher->id,
            'score' => $request->input('score'),
            'feedback' => $request->input('feedback'),
            'graded_at' => now(),
        ]);

        $submission->forceFill([
            'status' => $request->input('status', 'graded'),
        ])->save();

        return redirect()->route('teacher.submissions')->with('success', 'Submission graded successfully.');
    }

    public function downloadSubmission(Submission $submission)
    {
        $teacher = Auth::user();

        if ($submission->assignment->course->teacher_id !== $teacher->id) {
            abort(403, 'You can only access submissions from your own courses.');
        }

        if (! Storage::disk('public')->exists($submission->file)) {
            abort(404);
        }

        return Storage::disk('public')->download($submission->file, basename($submission->file));
    }
}
