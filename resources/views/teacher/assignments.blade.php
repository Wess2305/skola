@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Assignments</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Assignment workflow</h1>
            <p class="mt-2 text-slate-500">Create assignments, review submissions, and check due dates.</p>
        </div>
        <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">New assignment</a>
    </div>

    <div class="space-y-6">
        @foreach([
            ['title' => 'Algebra Homework', 'course' => 'Mathematics', 'due' => 'Tomorrow', 'submissions' => 28, 'status' => 'Open'],
            ['title' => 'Newton Worksheet', 'course' => 'Physics', 'due' => 'Friday', 'submissions' => 22, 'status' => 'Open'],
            ['title' => 'Genetics Summary', 'course' => 'Biology', 'due' => 'Next Monday', 'submissions' => 18, 'status' => 'Review'],
        ] as $assignment)
            <x-card>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">{{ $assignment['course'] }}</p>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $assignment['title'] }}</h2>
                    </div>
                    <x-badge variant="{{ $assignment['status'] === 'Open' ? 'primary' : 'warning' }}">{{ $assignment['status'] }}</x-badge>
                </div>
                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="text-sm text-slate-500">Due date: <span class="font-semibold text-slate-700">{{ $assignment['due'] }}</span></div>
                    <div class="text-sm text-slate-500">Submissions: <span class="font-semibold text-slate-700">{{ $assignment['submissions'] }}</span></div>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection
