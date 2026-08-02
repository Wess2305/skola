<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Module;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LmsSeeder extends Seeder
{
    public function run(): void
    {
        $teacher = User::factory()->create([
            'name' => 'Emma Martin',
            'email' => 'teacher@example.com',
            'role' => 'teacher',
        ]);

        $student = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'student@example.com',
            'role' => 'student',
        ]);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Mathematics',
            'description' => 'Core algebra and geometry lessons.',
            'slug' => Str::slug('Mathematics'),
        ]);

        $course->students()->attach($student->id);

        $module = Module::create([
            'course_id' => $course->id,
            'title' => 'Introduction to Algebra',
            'content' => 'A foundational module to warm up students.',
            'order' => 1,
        ]);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'title' => 'Algebra Homework',
            'description' => 'Solve the worksheet and submit by the deadline.',
            'due_date' => now()->addDays(3)->toDateString(),
            'max_score' => 100,
        ]);

        Announcement::create([
            'teacher_id' => $teacher->id,
            'course_id' => $course->id,
            'title' => 'New homework published',
            'content' => 'Please review the latest assignment before class.',
        ]);

        $submission = Submission::create([
            'assignment_id' => $assignment->id,
            'user_id' => $student->id,
            'file' => 'submissions/sample.pdf',
            'comment' => 'Submitted ahead of time.',
            'submitted_at' => now(),
        ]);

        Grade::create([
            'submission_id' => $submission->id,
            'score' => 92,
            'feedback' => 'Excellent progress and clear reasoning.',
            'status' => 'graded',
        ]);
    }
}
