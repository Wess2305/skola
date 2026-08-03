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
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-slate-500">{{ $submission->assignment->course->title }}</p>
                            <h2 class="text-xl font-semibold text-slate-900">{{ $submission->assignment->title }}</h2>
                            <p class="text-sm text-slate-500 mt-1">Student: {{ $submission->student?->name ?? 'Unknown student' }}</p>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <x-badge variant="{{ $submission->grade ? 'success' : 'warning' }}">{{ $submission->grade ? 'Reviewed' : 'Pending' }}</x-badge>
                            <p class="text-sm text-slate-500">Submitted: {{ $submission->submitted_at ? $submission->submitted_at->format('d M Y, H:i') : '—' }}</p>
                        </div>
                        @if($submission->file)
                            <a href="{{ route('teacher.submissions.download', $submission) }}" class="inline-flex items-center rounded-2xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200">Download file</a>
                        @endif
                    </div>

                    <form action="{{ route('teacher.submissions.grade', $submission) }}" method="POST" class="w-full max-w-xl space-y-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        @csrf
                        <div class="grid gap-3 md:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-semibold text-slate-700" for="score">Score</label>
                                <input type="number" id="score" name="score" min="0" max="100" value="{{ old('score', $submission->grade?->score) }}" class="w-full rounded-2xl border border-slate-200 px-3 py-2 text-sm text-slate-700" required>
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-semibold text-slate-700" for="status">Status</label>
                                <select id="status" name="status" class="w-full rounded-2xl border border-slate-200 px-3 py-2 text-sm text-slate-700">
                                    <option value="submitted" {{ old('status', $submission->status) === 'submitted' ? 'selected' : '' }}>Submitted</option>
                                    <option value="graded" {{ old('status', $submission->status) === 'graded' ? 'selected' : '' }}>Graded</option>
                                    <option value="late" {{ old('status', $submission->status) === 'late' ? 'selected' : '' }}>Late</option>
                                    <option value="returned" {{ old('status', $submission->status) === 'returned' ? 'selected' : '' }}>Returned</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700" for="feedback">Feedback</label>
                            <textarea id="feedback" name="feedback" rows="3" class="w-full rounded-2xl border border-slate-200 px-3 py-2 text-sm text-slate-700">{{ old('feedback', $submission->grade?->feedback) }}</textarea>
                        </div>
                        <button type="submit" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Save grade</button>
                    </form>
                </div>
            </x-card>
        @empty
            <p class="text-sm text-slate-500">No submissions yet.</p>
        @endforelse
    </div>

</div>

@endsection