@extends('layouts.app-dashboard')

@section('pageTitle', 'Modules')


@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Modules</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Module management</h1>
            <p class="mt-2 text-slate-500">Organize lessons and learning units for your courses.</p>
        </div>
        <a href="{{ route('teacher.modules') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Add Module</a>
    </div>

    <div class="space-y-4">
        @php
            $modules = [
                ['course' => 'Chemistry', 'title' => 'Introduction to reactions', 'lessons' => 5],
            ];
        @endphp

        @foreach ($modules as $module)
            <x-card>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm text-slate-500">{{ $module['course'] }}</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900">{{ $module['title'] }}</h2>
                    </div>
                    <span class="rounded-2xl bg-indigo-50 px-3 py-1 text-sm text-indigo-700">{{ $module['lessons'] }} lessons</span>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection
