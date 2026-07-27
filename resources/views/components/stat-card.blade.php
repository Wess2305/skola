@props([
    'title',
    'value',
    'description' => '',
])

<x-card>
    <div class="space-y-2">

        <p class="text-sm font-medium text-slate-500">
            {{ $title }}
        </p>

        <h2 class="text-3xl font-bold text-slate-800">
            {{ $value }}
        </h2>

        @if($description)
            <p class="text-sm text-slate-400">
                {{ $description }}
            </p>
        @endif

    </div>
</x-card>