@extends('layouts.app-dashboard')

@section('pageTitle', 'Assignments')


@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Assignments</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Assignment workflow</h1>
            <p class="mt-2 text-slate-500">Create assignments, review submissions, and check due dates.</p>
        </div>
        <a href="{{ route('teacher.assignments.create') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">New assignment</a>
    </div>

    <div class="space-y-4">
        @forelse($assignments as $assignment)
            <x-card>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-slate-500">{{ $assignment->course->title }}</p>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $assignment->title }}</h2>
                    </div>
                    <x-badge variant="{{ $assignment->submissions->count() > 0 ? 'warning' : 'primary' }}">{{ $assignment->submissions->count() > 0 ? 'Review' : 'Open' }}</x-badge>
                </div>
                <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="text-sm text-slate-500">Due date: <span class="font-semibold text-slate-700">{{ $assignment->due_date }}</span></div>
                    <div class="text-sm text-slate-500">Total submissions: <span class="font-semibold text-slate-700">{{ $assignment->submissions->count() }}</span></div>
                </div>
                <div class="mt-3 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
                        Submitted students: <span class="font-semibold text-slate-900">{{ $assignment->submissions->whereNotNull('submitted_at')->count() }}</span>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
                        Pending students: <span class="font-semibold text-slate-900">{{ max($assignment->course->students->count() - $assignment->submissions->count(), 0) }}</span>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-600">
                        Course: <span class="font-semibold text-slate-900">{{ $assignment->course->title }}</span>
                    </div>
                </div>
            </x-card>
        @empty
            <p class="text-sm text-slate-500">No assignments yet.</p>
        @endforelse
    </div>
    </div>

</div>

@endsection
