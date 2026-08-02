<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Support\Collection;

class DashboardDataService
{
    public function getTeacherMetrics(int $teacherId): array
    {
        $courses = Course::query()->where('teacher_id', $teacherId)->withCount('students')->withCount('assignments')->get();
        $assignments = Assignment::query()->whereHas('course', fn ($query) => $query->where('teacher_id', $teacherId))->get();
        $pendingGrades = Submission::query()->whereHas('assignment.course', fn ($query) => $query->where('teacher_id', $teacherId))->whereDoesntHave('grade')->count();

        return [
            'courses' => $courses,
            'assignments' => $assignments,
            'pendingGrades' => $pendingGrades,
            'studentCount' => $courses->sum('students_count'),
        ];
    }

    public function getStudentMetrics(int $studentId): array
    {
        $courses = Course::query()->whereHas('students', fn ($query) => $query->where('users.id', $studentId))->get();
        $assignments = Assignment::query()->with('course')->get();
        $submissions = Submission::query()->where('user_id', $studentId)->get();

        $averageGrade = round($submissions->filter(fn ($submission) => $submission->grade)->avg(fn ($submission) => $submission->grade->score) ?? 0, 1);
        $upcomingAssignments = $assignments->sortBy('due_date')->take(3);

        return [
            'courses' => $courses,
            'assignments' => $assignments,
            'averageGrade' => $averageGrade,
            'submissions' => $submissions,
            'upcomingAssignments' => $upcomingAssignments,
        ];
    }
}
