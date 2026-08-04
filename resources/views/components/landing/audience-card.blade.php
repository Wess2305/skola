@props([])
@php($tone = $attributes->get('tone', 'light'))
@php($isDark = $tone === 'dark')
<article @class(['rounded-3xl p-8', 'bg-slate-900' => $isDark, 'bg-indigo-50' => ! $isDark])>
    <h2 @class(['text-[30px] font-bold', 'text-white' => $isDark, 'text-indigo-900' => ! $isDark])>{{ $attributes->get('title', '') }}</h2>
    <p @class(['mt-3 text-[17px] font-medium leading-relaxed', 'text-indigo-200' => $isDark, 'text-indigo-600' => ! $isDark])>{{ $attributes->get('copy', '') }}</p>
</article>
