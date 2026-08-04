@props([])
<article class="rounded-[20px] bg-indigo-50 p-7 text-left transition duration-300 hover:-translate-y-1">
    <h3 class="text-[21px] font-bold text-slate-900">{{ $attributes->get('title', '') }}</h3>
    <p class="mt-3 text-base leading-6 text-slate-500">{{ $attributes->get('copy', '') }}</p>
</article>
