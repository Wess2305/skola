@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Submissions</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Student work</h1>
            <p class="mt-2 text-slate-500">Review submitted assignments and provide feedback.</p>
        </div>
        <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">View pending</a>
    </div>

    <div class="space-y-6">
        @foreach([
            ['student' => 'Liam Harper', 'course' => 'Mathematics', 'assignment' => 'Algebra Homework', 'status' => 'Awaiting review', 'submitted' => '1 hour ago'],
            ['student' => 'Ava Lee', 'course' => 'Biology', 'assignment' => 'Genetics Summary', 'status' => 'Reviewed', 'submitted' => 'Yesterday'],
            ['student' => 'Noah Kim', 'course' => 'English', 'assignment' => 'Essay Draft', 'status' => 'Awaiting review', 'submitted' => '2 hours ago'],
        ] as $submission)
            <x-card>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">{{ $submission['course'] }}</p>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $submission['assignment'] }}</h2>
                        <p class="text-sm text-slate-500 mt-1">{{ $submission['student'] }}</p>
                    </div>
                    <div class="flex flex-col items-start gap-2 sm:items-end">
                        <x-badge variant="{{ $submission['status'] === 'Reviewed' ? 'success' : 'warning' }}">{{ $submission['status'] }}</x-badge>
                        <p class="text-sm text-slate-500">{{ $submission['submitted'] }}</p>
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection