@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Courses</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Your course catalog</h1>
            <p class="mt-2 text-slate-500">Manage course content, students, and assignments from one place.</p>
        </div>
        <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create Course</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach([
            ['title' => 'Mathematics', 'students' => 32, 'modules' => 8, 'assignments' => 5],
            ['title' => 'Physics', 'students' => 28, 'modules' => 7, 'assignments' => 6],
            ['title' => 'Biology', 'students' => 24, 'modules' => 6, 'assignments' => 4],
            ['title' => 'Chemistry', 'students' => 22, 'modules' => 5, 'assignments' => 3],
            ['title' => 'English', 'students' => 34, 'modules' => 9, 'assignments' => 7],
            ['title' => 'History', 'students' => 26, 'modules' => 6, 'assignments' => 4],
        ] as $course)
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $course['title'] }}</h2>
                        <p class="text-sm text-slate-500 mt-1">{{ $course['students'] }} students enrolled</p>
                    </div>
                    <span class="text-3xl">📘</span>
                </div>
                <div class="mt-6 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-3xl bg-slate-50 p-4 text-center">
                        <p class="text-sm text-slate-500">Students</p>
                        <p class="mt-2 font-semibold text-slate-900">{{ $course['students'] }}</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-4 text-center">
                        <p class="text-sm text-slate-500">Modules</p>
                        <p class="mt-2 font-semibold text-slate-900">{{ $course['modules'] }}</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-4 text-center">
                        <p class="text-sm text-slate-500">Assignments</p>
                        <p class="mt-2 font-semibold text-slate-900">{{ $course['assignments'] }}</p>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Manage course</a>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection
