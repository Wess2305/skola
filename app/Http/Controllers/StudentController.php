<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmissionRequest;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function __construct(private readonly DashboardDataService $dashboardDataService)
    {
    }

    public function dashboard()
    {
        $student = Auth::user();
        $metrics = $this->dashboardDataService->getStudentMetrics($student->id);

        return view('student.dashboard', [
            'student' => $student,
            'courses' => $metrics['courses'],
            'assignments' => $metrics['assignments'],
            'averageGrade' => $metrics['averageGrade'],
            'submissions' => $metrics['submissions'],
            'upcomingAssignments' => $metrics['upcomingAssignments'],
        ]);
    }

    public function courses()
    {
        $student = Auth::user();
        $courses = $student->enrolledCourses()->withCount('modules')->get();

        return view('student.courses', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }

    public function enroll(Course $course)
    {
        $student = Auth::user();
        $student->enrolledCourses()->syncWithoutDetaching([$course->id]);

        return redirect()->route('student.courses')->with('success', 'Successfully enrolled in the course.');
    }

    public function assignments()
    {
        $student = Auth::user();
        $assignments = Assignment::query()
            ->with(['course', 'teacher', 'submissions' => function ($query) use ($student) {
                $query->where(function ($subQuery) use ($student) {
                    $subQuery->where('student_id', $student->id)->orWhere('user_id', $student->id);
                });
            }])
            ->get();

        return view('student.assignments', [
            'student' => $student,
            'assignments' => $assignments,
        ]);
    }

    public function grades()
    {
        $student = Auth::user();
        $submissions = Submission::query()
            ->where(function ($query) use ($student) {
                $query->where('student_id', $student->id)->orWhere('user_id', $student->id);
            })
            ->with('assignment.course', 'grade')
            ->get();

        return view('student.grades', [
            'student' => $student,
            'submissions' => $submissions,
        ]);
    }

    public function submitAssignment(Assignment $assignment, StoreSubmissionRequest $request)
    {
        $student = Auth::user();

        if ($assignment->due_date && now()->isAfter($assignment->due_date)) {
            abort(403, 'The deadline for this assignment has passed.');
        }

        $submittedFile = $request->file('file');
        $path = $submittedFile->storePubliclyAs('submissions', Str::uuid().'.'.$submittedFile->getClientOriginalExtension(), 'public');

        $existingSubmission = Submission::query()
            ->where('assignment_id', $assignment->id)
            ->where(function ($query) use ($student) {
                $query->where('student_id', $student->id)->orWhere('user_id', $student->id);
            })
            ->first();

        if ($existingSubmission) {
            if ($existingSubmission->file && Storage::disk('public')->exists($existingSubmission->file)) {
                Storage::disk('public')->delete($existingSubmission->file);
            }

            $existingSubmission->forceFill([
                'student_id' => $student->id,
                'user_id' => $student->id,
                'file' => $path,
                'submitted_at' => now(),
                'status' => 'submitted',
            ])->save();

            $message = 'Submission replaced successfully.';
        } else {
            Submission::create([
                'assignment_id' => $assignment->id,
                'student_id' => $student->id,
                'user_id' => $student->id,
                'file' => $path,
                'submitted_at' => now(),
                'status' => 'submitted',
            ]);

            $message = 'Submission uploaded successfully.';
        }

        return redirect()->route('student.assignments')->with('success', $message);
    }

    public function downloadSubmission(Submission $submission)
    {
        $student = Auth::user();

        if ($submission->student_id !== $student->id && $submission->user_id !== $student->id) {
            abort(403, 'You cannot access this submission.');
        }

        if (! Storage::disk('public')->exists($submission->file)) {
            abort(404);
        }

        $fileName = basename($submission->file);

        return Storage::disk('public')->download($submission->file, $fileName);
    }
}
