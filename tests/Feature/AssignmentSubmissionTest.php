<?php

namespace Tests\Feature;

use App\Models\Assignment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AssignmentSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_can_upload_a_submission_for_an_assignment_in_their_course(): void
    {
        Storage::fake('public');

        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Algebra',
            'description' => 'Course description',
        ]);
        $course->students()->attach($student->id);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'title' => 'Homework 1',
            'description' => 'Solve the worksheet',
            'due_date' => '2026-09-01',
            'max_score' => 100,
        ]);

        $response = $this->actingAs($student)->post(route('student.assignments.submit', $assignment), [
            'file' => UploadedFile::fake()->create('homework.pdf', 100, 'application/pdf'),
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('submissions', [
            'assignment_id' => $assignment->id,
            'user_id' => $student->id,
            'status' => 'submitted',
        ]);
    }

    public function test_teacher_sees_a_course_option_when_creating_an_assignment(): void
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Physics',
            'description' => 'Course description',
        ]);

        $response = $this->actingAs($teacher)->get(route('teacher.assignments.create'));

        $response->assertOk();
        $response->assertSee($course->title);
    }

    public function test_student_assignments_page_shows_upload_form_for_submissions(): void
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Physics',
            'description' => 'Course description',
        ]);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'teacher_id' => $teacher->id,
            'title' => 'Lab report',
            'description' => 'Write your findings',
            'due_date' => '2026-09-01',
            'max_score' => 100,
        ]);

        $response = $this->actingAs($student)->get(route('student.assignments'));

        $response->assertOk();
        $response->assertSee('name="file"', false);
        $response->assertSee(route('student.assignments.submit', $assignment));
    }

    public function test_student_can_view_assignments_from_enrolled_courses(): void
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Physics',
            'description' => 'Course description',
        ]);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'teacher_id' => $teacher->id,
            'title' => 'Lab report',
            'description' => 'Write your findings',
            'due_date' => '2026-09-01',
            'max_score' => 100,
        ]);

        $response = $this->actingAs($student)->get(route('student.assignments'));

        $response->assertOk();
        $response->assertSee($assignment->title);
        $response->assertSee('Write your findings');
    }

    public function test_teacher_submissions_page_shows_grading_form_for_student_uploads(): void
    {
        Storage::fake('public');

        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Biology',
            'description' => 'Course description',
        ]);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'teacher_id' => $teacher->id,
            'title' => 'Lab report',
            'description' => 'Submit your report',
            'due_date' => '2026-09-01',
            'max_score' => 100,
        ]);

        $submission = Submission::create([
            'assignment_id' => $assignment->id,
            'student_id' => $student->id,
            'user_id' => $student->id,
            'file' => 'submissions/initial.pdf',
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        $response = $this->actingAs($teacher)->get(route('teacher.submissions'));

        $response->assertOk();
        $response->assertSee('name="score"', false);
        $response->assertSee(route('teacher.submissions.grade', $submission));
        $response->assertSee('Download file');
    }

    public function test_teacher_can_grade_a_submission_from_their_course(): void
    {
        Storage::fake('public');

        $teacher = User::factory()->create(['role' => 'teacher']);
        $student = User::factory()->create(['role' => 'student']);

        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Biology',
            'description' => 'Course description',
        ]);
        $course->students()->attach($student->id);

        $assignment = Assignment::create([
            'course_id' => $course->id,
            'title' => 'Lab report',
            'description' => 'Submit your report',
            'due_date' => '2026-09-01',
            'max_score' => 100,
        ]);

        $submission = Submission::create([
            'assignment_id' => $assignment->id,
            'user_id' => $student->id,
            'file' => 'submissions/initial.pdf',
            'status' => 'submitted',
            'submitted_at' => now(),
        ]);

        $response = $this->actingAs($teacher)->post(route('teacher.submissions.grade', $submission), [
            'score' => 92,
            'feedback' => 'Great work',
            'status' => 'graded',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('grades', [
            'submission_id' => $submission->id,
            'teacher_id' => $teacher->id,
            'score' => 92,
            'feedback' => 'Great work',
        ]);
        $this->assertDatabaseHas('submissions', [
            'id' => $submission->id,
            'status' => 'graded',
        ]);
    }
}
