@props([
    'variant' => 'primary',
])

@php
    $classes = match($variant) {
        'secondary' => 'bg-slate-100 text-slate-700 hover:bg-slate-200',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        'ghost' => 'bg-transparent text-slate-700 hover:bg-slate-100',
        default => 'bg-indigo-600 text-white hover:bg-indigo-700',
    };
@endphp

<button {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold transition shadow-sm $classes"]) }}>
    {{ $slot }}
</button>
