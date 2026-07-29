@props([
    'title',
    'value',
    'description' => '',
    'icon' => '•',
    'accent' => 'bg-indigo-50 text-indigo-600',
])

<x-card class="group transition duration-200 hover:-translate-y-1 hover:shadow-lg">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $title }}</p>
            <p class="mt-3 text-3xl font-semibold text-slate-900">{{ $value }}</p>
            <p class="mt-2 text-sm text-slate-500">{{ $description }}</p>
        </div>

        <div class="flex h-12 w-12 items-center justify-center rounded-2xl text-2xl {{ $accent }}">
            {{ $icon }}
        </div>
    </div>
</x-card>
