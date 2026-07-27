@props([
    'variant' => 'primary'
])

@php
    $classes = match($variant) {

        'success' => 'bg-green-100 text-green-700',

        'danger' => 'bg-red-100 text-red-700',

        'warning' => 'bg-yellow-100 text-yellow-700',

        'primary' => 'bg-indigo-100 text-indigo-700',

        default => 'bg-slate-100 text-slate-700',
    };
@endphp

<span
    {{ $attributes->merge([
        'class' => "inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold $classes"
    ]) }}
>
    {{ $slot }}
</span>