@extends('layouts.app-dashboard')

@section('pageTitle', 'Dashboard')

@section('content')
<div class="space-y-8">
    <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
        <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.35em] text-indigo-600">Teacher dashboard</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 sm:text-4xl">Good afternoon, Mr. Anderson 👋</h1>
                <p class="mt-3 text-base text-slate-500">Manage your classes, assignments, and student progress from a single, calm workspace.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-700">Create course</a>
                <a href="{{ route('teacher.assignments.create') }}" class="inline-flex items-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">New assignment</a>
                <a href="#" class="inline-flex items-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Create announcement</a>
            </div>
        </div>
    </section>

    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <x-teacher-stat-card title="Total students" value="{{ $studentCount }}" description="Across your active classes" icon="👥" accent="bg-indigo-50 text-indigo-600" />
        <x-teacher-stat-card title="Courses" value="{{ $courses->count() }}" description="Managed by you" icon="📘" accent="bg-violet-50 text-violet-600" />
        <x-teacher-stat-card title="Assignments" value="{{ $assignments->count() }}" description="Published for your courses" icon="📝" accent="bg-emerald-50 text-emerald-600" />
        <x-teacher-stat-card title="Pending grades" value="{{ $pendingGrades }}" description="Awaiting review" icon="✅" accent="bg-amber-50 text-amber-600" />
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.3fr_0.9fr]">
        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">My courses</h2>
                    <p class="text-sm text-slate-500">Keep each class moving with a clear overview.</p>
                </div>
                <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all</a>
            </div>

            <div class="mt-6 grid gap-4 lg:grid-cols-2">
                @forelse($courses as $course)
                    <x-course-overview-card title="{{ $course->title }}" students="{{ $course->students_count }}" progress="82" next-lesson="{{ $course->modules->first()?->title ?? 'Ready for content' }}" />
                @empty
                    <p class="text-sm text-slate-500">No courses created yet.</p>
                @endforelse
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent submissions</h2>
                    <p class="text-sm text-slate-500">Review work before it piles up.</p>
                </div>
                <x-badge variant="primary">4 new</x-badge>
            </div>

            <div class="mt-6 space-y-3">
                <x-submission-card student="Liam Harper" assignment="Algebra homework" submitted-at="12 mins ago" status="Needs review" status-variant="warning" />
                <x-submission-card student="Ava Lee" assignment="Genetics summary" submitted-at="34 mins ago" status="Reviewed" status-variant="success" />
                <x-submission-card student="Noah Kim" assignment="Essay draft" submitted-at="1 hr ago" status="Pending" status-variant="primary" />
            </div>
        </x-card>
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Analytics</h2>
                    <p class="text-sm text-slate-500">Healthy signals from your teaching week.</p>
                </div>
                <x-badge variant="success">Stable</x-badge>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <x-analytics-card title="Assignment completion" value="87%" detail="Submissions on time" progress="87" />
                <x-analytics-card title="Student attendance" value="92%" detail="Average this week" progress="92" />
                <x-analytics-card title="Weekly activity" value="64" detail="Engagement moments" progress="64" />
                <x-analytics-card title="Course performance" value="4.8/5" detail="Student sentiment" progress="96" />
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Today's schedule</h2>
                    <p class="text-sm text-slate-500">A quick look at the day ahead.</p>
                </div>
                <x-badge>Today</x-badge>
            </div>

            <div class="mt-6 space-y-3">
                <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                    <div>
                        <p class="font-semibold text-slate-900">09:00</p>
                        <p class="text-sm text-slate-500">Mathematics · Grade 10</p>
                    </div>
                    <span class="text-sm font-medium text-slate-500">Lecture</span>
                </div>
                <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                    <div>
                        <p class="font-semibold text-slate-900">11:30</p>
                        <p class="text-sm text-slate-500">Physics · Lab review</p>
                    </div>
                    <span class="text-sm font-medium text-slate-500">Lab</span>
                </div>
                <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                    <div>
                        <p class="font-semibold text-slate-900">14:00</p>
                        <p class="text-sm text-slate-500">Biology · Office hours</p>
                    </div>
                    <span class="text-sm font-medium text-slate-500">Support</span>
                </div>
            </div>
        </x-card>
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Announcements</h2>
                    <p class="text-sm text-slate-500">Keep your classes informed and aligned.</p>
                </div>
                <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">View all</a>
            </div>

            <div class="mt-6 space-y-3">
                <div class="flex items-start justify-between gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <div>
                        <p class="font-semibold text-slate-900">Midterm prep workshop</p>
                        <p class="mt-1 text-sm text-slate-500">Published 2 hours ago · Shared with all classes</p>
                    </div>
                    <x-badge variant="primary">Published</x-badge>
                </div>
                <div class="flex items-start justify-between gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <div>
                        <p class="font-semibold text-slate-900">Lab Safety Reminder</p>
                        <p class="mt-1 text-sm text-slate-500">Published yesterday · Required reading</p>
                    </div>
                    <x-badge variant="warning">Needs attention</x-badge>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent activity</h2>
                    <p class="text-sm text-slate-500">A timeline of what happened recently.</p>
                </div>
                <x-badge variant="success">Live</x-badge>
            </div>

            <ul class="mt-6 space-y-3">
                <x-activity-card title="John submitted Algebra Homework" description="Marked as ready for review" time="8m" />
                <x-activity-card title="Emma created a new assignment" description="Physics quiz published for block B" time="22m" />
                <x-activity-card title="Michael completed a Physics Quiz" description="Achievement unlocked for strong performance" time="1h" />
            </ul>
        </x-card>
    </section>

    <section class="grid gap-4 rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm md:grid-cols-2 xl:grid-cols-4">
        <a href="#" class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">Create course</a>
        <a href="{{ route('teacher.assignments.create') }}" class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">Create assignment</a>
        <a href="#" class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">Manage students</a>
        <a href="#" class="rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm font-semibold text-slate-700 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">View grades</a>
    </section>
</div>
@endsection
