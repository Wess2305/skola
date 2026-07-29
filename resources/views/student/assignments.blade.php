@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Assignments</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Your active work</h1>
            <p class="mt-2 text-slate-500">Review assignments, due dates, and submission status in one place.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('student.courses') }}" class="inline-flex items-center rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm border border-slate-200 hover:bg-slate-50">Browse courses</a>
            <a href="{{ route('student.calendar') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">View calendar</a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">

        <div class="space-y-6">
            @foreach([
                ['title' => 'Algebra Homework', 'course' => 'Mathematics', 'due' => 'Tomorrow', 'status' => 'Pending', 'badge' => 'danger'],
                ['title' => 'Newton Worksheet', 'course' => 'Physics', 'due' => 'Friday', 'status' => 'Pending', 'badge' => 'warning'],
                ['title' => 'Genetics Summary', 'course' => 'Biology', 'due' => 'Next Monday', 'status' => 'Submitted', 'badge' => 'success'],
                ['title' => 'Essay Draft', 'course' => 'English', 'due' => 'Wednesday', 'status' => 'Pending', 'badge' => 'warning'],
                ['title' => 'History Presentation', 'course' => 'History', 'due' => 'Next Thursday', 'status' => 'Submitted', 'badge' => 'success'],
            ] as $assignment)
                <x-card>
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ $assignment['title'] }}</h2>
                            <p class="text-sm text-slate-500 mt-1">{{ $assignment['course'] }}</p>
                        </div>
                        <x-badge variant="{{ $assignment['badge'] }}">{{ $assignment['status'] }}</x-badge>
                    </div>

                    <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="text-sm text-slate-500">
                            Due date: <span class="font-semibold text-slate-700">{{ $assignment['due'] }}</span>
                        </div>
                        @if($assignment['status'] === 'Submitted')
                            <button class="inline-flex items-center rounded-2xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700">Submitted</button>
                        @else
                            <button class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Submit</button>
                        @endif
                    </div>
                </x-card>
            @endforeach
        </div>

        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Overview</h2>
                    <p class="text-sm text-slate-500">Assignment progress at a glance.</p>
                </div>
                <x-badge>Updated</x-badge>
            </div>

            <div class="mt-6 space-y-5">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>Submitted</span>
                        <span>2 / 5</span>
                    </div>
                    <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-2 w-2/5 rounded-full bg-indigo-600"></div>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>Upcoming</span>
                        <span>3 tasks</span>
                    </div>
                    <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-2 w-3/5 rounded-full bg-indigo-600"></div>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Next due</p>
                    <p class="mt-2 text-lg font-semibold text-slate-900">Algebra Homework</p>
                </div>
            </div>
        </x-card>

    </div>

</div>

@endsection
