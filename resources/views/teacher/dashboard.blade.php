@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <section class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Teacher dashboard</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900">Welcome back, Instructor</h1>
                <p class="mt-2 text-slate-500">Track your courses, student activity, and grading flow from one place.</p>
            </div>
            <div class="inline-flex items-center gap-3 rounded-3xl bg-indigo-50 px-5 py-3 text-slate-900">
                <span class="text-2xl">👩‍🏫</span>
                <div>
                    <p class="text-sm text-slate-500">Active courses</p>
                    <p class="text-xl font-semibold">5</p>
                </div>
            </div>
        </div>
    </section>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <x-stat-card title="Students" value="180" description="Enrolled" />
        <x-stat-card title="Courses" value="5" description="Managed" />
        <x-stat-card title="Assignments" value="24" description="Pending review" />
        <x-stat-card title="Pending grades" value="14" description="Action needed" />
    </div>

    <div class="grid gap-6 xl:grid-cols-2">
        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent activities</h2>
                    <p class="text-sm text-slate-500">Latest course updates and student actions.</p>
                </div>
                <x-badge>Live</x-badge>
            </div>
            <div class="mt-6 space-y-4">
                @foreach([
                    ['title' => 'Physics assignment created', 'description' => 'New worksheet posted for Motion topics.'],
                    ['title' => 'Grade review requested', 'description' => '3 students requested feedback on Geometry.'],
                    ['title' => 'Chemistry announcement', 'description' => 'Lab safety update sent to class.'],
                ] as $activity)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <h3 class="font-semibold text-slate-900">{{ $activity['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $activity['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent submissions</h2>
                    <p class="text-sm text-slate-500">Review and grade the latest work.</p>
                </div>
            </div>
            <div class="mt-6 space-y-4">
                @foreach([
                    ['student' => 'Liam Harper', 'course' => 'Mathematics', 'assignment' => 'Algebra Homework'],
                    ['student' => 'Ava Lee', 'course' => 'Biology', 'assignment' => 'Genetics Summary'],
                    ['student' => 'Noah Kim', 'course' => 'English', 'assignment' => 'Essay Draft'],
                ] as $submission)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <p class="font-semibold text-slate-900">{{ $submission['student'] }}</p>
                        <p class="text-sm text-slate-500">{{ $submission['course'] }} · {{ $submission['assignment'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

</div>

@endsection
