@props([
    'title',
    'description',
])

<div class="text-center py-16">

    <div class="text-5xl mb-4">
        📂
    </div>

    <h3 class="text-xl font-semibold text-slate-800">
        {{ $title }}
    </h3>

    <p class="text-slate-500 mt-2">
        {{ $description }}
    </p>

    {{ $slot }}

</div>