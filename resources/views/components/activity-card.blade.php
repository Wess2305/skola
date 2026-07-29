@props([
    'title',
    'description',
    'time',
])

<li class="relative pl-6 before:absolute before:left-0 before:top-2 before:h-2 before:w-2 before:rounded-full before:bg-indigo-500">
    <div class="rounded-2xl border border-slate-200 bg-white p-4">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="font-semibold text-slate-900">{{ $title }}</p>
                <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
            </div>
            <span class="shrink-0 text-sm text-slate-400">{{ $time }}</span>
        </div>
    </div>
</li>
