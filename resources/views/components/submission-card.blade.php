@props([
    'student',
    'assignment',
    'submittedAt',
    'status' => 'Review',
    'statusVariant' => 'primary',
])

<div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 transition hover:border-indigo-200 hover:bg-white">
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="font-semibold text-slate-900">{{ $student }}</p>
            <p class="mt-1 text-sm text-slate-500">{{ $assignment }}</p>
        </div>
        <x-badge variant="{{ $statusVariant }}">{{ $status }}</x-badge>
    </div>

    <div class="mt-4 flex items-center justify-between">
        <p class="text-sm text-slate-400">Submitted {{ $submittedAt }}</p>
        <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Review</a>
    </div>
</div>
