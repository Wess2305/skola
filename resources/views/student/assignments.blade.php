@extends('layouts.app-dashboard')

@section('pageTitle', 'Assignments')


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
            @forelse($assignments as $assignment)
                <x-card>
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">{{ $assignment->title }}</h2>
                            <p class="text-sm text-slate-500 mt-1">{{ $assignment->course->title }}</p>
                            <p class="mt-2 text-sm text-slate-500">{{ $assignment->description }}</p>
                        </div>
                        <x-badge variant="{{ $assignment->submissions->isNotEmpty() ? 'success' : 'warning' }}">{{ $assignment->submissions->isNotEmpty() ? 'Submitted' : 'Pending' }}</x-badge>
                    </div>

                    <div class="mt-5 flex flex-col gap-4">
                        <div class="text-sm text-slate-500">
                            Due date: <span class="font-semibold text-slate-700">{{ $assignment->due_date }}</span>
                            @if($assignment->attachment)
                                <span class="ml-3">• Attachment: <a href="{{ Storage::disk('public')->url($assignment->attachment) }}" class="font-semibold text-indigo-600 hover:text-indigo-700" target="_blank">Open</a></span>
                            @endif
                        </div>

                        @if($assignment->submissions->isNotEmpty())
                            @php $submission = $assignment->submissions->first(); @endphp
                            <div class="flex flex-col gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="text-sm text-emerald-700">
                                    <p class="font-semibold">Submitted and visible to your teacher.</p>
                                    <p class="mt-1">You can replace the file below if you need to upload an updated version.</p>
                                </div>
                                <a href="{{ route('student.submissions.download', $submission) }}" class="inline-flex items-center rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm border border-emerald-200 hover:bg-emerald-100">Download file</a>
                            </div>
                        @endif

                        <form action="{{ route('student.assignments.submit', $assignment) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            @csrf
                            <input type="file" name="file" class="block w-full rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700" required>
                            <button type="submit" class="inline-flex items-center rounded-2xl {{ $assignment->submissions->isNotEmpty() ? 'bg-slate-900' : 'bg-indigo-600' }} px-4 py-2 text-sm font-semibold text-white hover:{{ $assignment->submissions->isNotEmpty() ? 'bg-slate-800' : 'bg-indigo-700' }}">
                                {{ $assignment->submissions->isNotEmpty() ? 'Replace file' : 'Submit' }}
                            </button>
                        </form>
                    </div>
                </x-card>
            @empty
                <p class="text-sm text-slate-500">No assignments yet.</p>
            @endforelse
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
