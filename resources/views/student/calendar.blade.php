@extends('layouts.app-dashboard')

@section('content')

@php
    $days = range(1, 30);
    $events = [
        ['day' => 3, 'title' => 'Math Quiz', 'time' => '10:00 AM'],
        ['day' => 7, 'title' => 'Chemistry Lab', 'time' => '1:00 PM'],
        ['day' => 12, 'title' => 'English Essay', 'time' => '11:00 AM'],
        ['day' => 18, 'title' => 'Physics Review', 'time' => '3:00 PM'],
        ['day' => 24, 'title' => 'History Presentation', 'time' => '9:00 AM'],
    ];
@endphp

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Calendar</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">This month</h1>
            <p class="mt-2 text-slate-500">Preview upcoming events and deadlines in a clean calendar layout.</p>
        </div>
        <div class="inline-flex items-center gap-3 rounded-3xl bg-white px-4 py-3 shadow-sm border border-slate-200">
            <span class="text-sm text-slate-500">Month</span>
            <strong class="text-slate-900">July 2026</strong>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.4fr_0.9fr]">
        <x-card>
            <div class="grid grid-cols-7 gap-3 text-center text-xs uppercase text-slate-500">
                <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
            </div>
            <div class="mt-4 grid grid-cols-7 gap-3 text-sm">
                @for($blank = 0; $blank < 2; $blank++)
                    <div class="h-24 rounded-3xl bg-slate-100"></div>
                @endfor
                @foreach($days as $day)
                    @php $hasEvent = collect($events)->contains('day', $day); @endphp
                    <div class="relative flex h-24 flex-col rounded-3xl border p-3 text-left transition {{ $hasEvent ? 'border-indigo-200 bg-indigo-50' : 'border-slate-200 bg-white' }}">
                        <span class="text-sm font-semibold {{ $hasEvent ? 'text-indigo-700' : 'text-slate-700' }}">{{ $day }}</span>
                        @if($hasEvent)
                            <span class="mt-2 block rounded-2xl bg-indigo-600 px-2 py-1 text-[11px] font-semibold text-white">Event</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Upcoming events</h2>
                    <p class="text-sm text-slate-500">Your next important moments.</p>
                </div>
            </div>
            <div class="mt-6 space-y-4">
                @foreach($events as $event)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="font-semibold text-slate-900">{{ $event['title'] }}</p>
                                <p class="text-sm text-slate-500">Day {{ $event['day'] }}</p>
                            </div>
                            <span class="rounded-2xl bg-white px-3 py-1 text-sm text-slate-700 shadow-sm">{{ $event['time'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

</div>

@endsection
