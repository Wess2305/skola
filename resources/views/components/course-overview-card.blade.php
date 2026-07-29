@props([
    'title',
    'students' => 0,
    'progress' => 0,
    'nextLesson' => '',
])

<article class="rounded-3xl border border-slate-200 bg-slate-50 p-5 transition hover:border-indigo-200 hover:shadow-sm">
    <div class="flex items-start justify-between gap-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-slate-500">{{ $students }} students enrolled</p>
        </div>
        <x-badge variant="primary">Live</x-badge>
    </div>

    <div class="mt-4">
        <div class="mb-2 flex items-center justify-between text-sm text-slate-500">
            <span>Course progress</span>
            <span class="font-semibold text-slate-700">{{ $progress }}%</span>
        </div>
        <div class="h-2 overflow-hidden rounded-full bg-slate-200">
            <div class="h-2 rounded-full bg-indigo-600" style="width: {{ $progress }}%"></div>
        </div>
    </div>

    <div class="mt-4 flex items-center justify-between rounded-2xl bg-white px-4 py-3">
        <div>
            <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Next lesson</p>
            <p class="mt-1 text-sm font-medium text-slate-700">{{ $nextLesson }}</p>
        </div>
        <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Open</a>
    </div>
</article>
