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
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('teacher.assignments') }}" class="inline-flex items-center rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm border border-slate-200 hover:bg-slate-50">Manage Assignments</a>
            <a href="{{ route('teacher.modules') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Add Module</a>
        </div>
    </div>

    <div class="space-y-4">
        @forelse($courses as $course)
            @foreach($course->modules as $module)
                <x-card>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm text-slate-500">{{ $course->title }}</p>
                            <h2 class="mt-2 text-xl font-semibold text-slate-900">{{ $module->title }}</h2>
                        </div>
                        <span class="rounded-2xl bg-indigo-50 px-3 py-1 text-sm text-indigo-700">{{ $module->lessons->count() }} lessons</span>
                    </div>
                </x-card>
            @endforeach
        @empty
            <p class="text-sm text-slate-500">No modules yet.</p>
        @endforelse
    </div>

</div>

@endsection
n 