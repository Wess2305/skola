@props([
    'title',
    'value',
    'detail' => '',
    'progress' => 0,
])

<div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $title }}</p>
            <p class="mt-3 text-2xl font-semibold text-slate-900">{{ $value }}</p>
        </div>
        <div class="rounded-2xl bg-indigo-50 px-3 py-2 text-sm font-semibold text-indigo-600">+12%</div>
    </div>

    <div class="mt-4">
        <div class="mb-2 flex items-center justify-between text-sm text-slate-500">
            <span>{{ $detail }}</span>
            <span class="font-semibold text-slate-700">{{ $progress }}%</span>
        </div>
        <div class="h-2 overflow-hidden rounded-full bg-slate-200">
            <div class="h-2 rounded-full bg-indigo-600" style="width: {{ $progress }}%"></div>
        </div>
    </div>
</div>
