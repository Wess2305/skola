<?php

namespace Tests\Feature;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LmsDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_teacher_dashboard_shows_teacher_courses(): void
    {
        $teacher = User::factory()->create(['role' => 'teacher']);
        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Mathematics',
            'description' => 'Algebra and geometry',
            'slug' => 'mathematics',
        ]);

        $response = $this->actingAs($teacher)->get(route('teacher.dashboard'));

        $response->assertOk();
        $response->assertSee($course->title);
    }

    public function test_student_dashboard_shows_enrolled_courses(): void
    {
        $student = User::factory()->create(['role' => 'student']);
        $teacher = User::factory()->create(['role' => 'teacher']);
        $course = Course::create([
            'teacher_id' => $teacher->id,
            'title' => 'Physics',
            'description' => 'Motion and energy',
            'slug' => 'physics',
        ]);
        $course->students()->attach($student->id);

        $response = $this->actingAs($student)->get(route('student.dashboard'));

        $response->assertOk();
        $response->assertSee($course->title);
    }
}
