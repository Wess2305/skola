@extends('layouts.app-dashboard')

@section('pageTitle', 'Submissions')


@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Submissions</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Student work</h1>
            <p class="mt-2 text-slate-500">Review submitted assignments and provide feedback.</p>
        </div>
        <a href="{{ route('teacher.submissions') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">View pending</a>
    </div>

    <div class="space-y-4">
        @forelse($submissions as $submission)
            <x-card>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">{{ $submission->assignment->course->title }}</p>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $submission->assignment->title }}</h2>
                        <p class="text-sm text-slate-500 mt-1">{{ $submission->student->name }}</p>
                    </div>
                    <div class="flex flex-col items-start gap-2 sm:items-end">
                        <x-badge variant="{{ $submission->grade ? 'success' : 'warning' }}">{{ $submission->grade ? 'Reviewed' : 'Pending' }}</x-badge>
                        <p class="text-sm text-slate-500">{{ $submission->submitted_at }}</p>
                    </div>
                </div>
            </x-card>
        @empty
            <p class="text-sm text-slate-500">No submissions yet.</p>
        @endforelse
    </div>
    </div>

</div>

@endsection