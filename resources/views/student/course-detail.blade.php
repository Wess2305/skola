@extends('layouts.app-dashboard')

@section('content')

@php
    $slug = strtolower($course);
    $courses = [
        'mathematics' => [
            'title' => 'Mathematics',
            'teacher' => 'Mr. Anderson',
            'progress' => 80,
            'icon' => '📘',
            'modules' => ['Chapter 1 - Numbers', 'Chapter 2 - Algebra', 'Chapter 3 - Functions'],
            'assignments' => ['Algebra Homework', 'Geometry Quiz'],
            'announcements' => ['New practice set added for Chapter 2'],
            'info' => ['Duration' => '8 weeks', 'Modules' => '3', 'Assignments' => '2'],
        ],
        'physics' => [
            'title' => 'Physics',
            'teacher' => 'Mrs. Olivia',
            'progress' => 60,
            'icon' => '🧪',
            'modules' => ['Motion', 'Force', 'Energy'],
            'assignments' => ['Newton Worksheet', 'Physics Report'],
            'announcements' => ['Lab session scheduled for Friday'],
            'info' => ['Duration' => '7 weeks', 'Modules' => '3', 'Assignments' => '2'],
        ],
        'biology' => [
            'title' => 'Biology',
            'teacher' => 'Mr. James',
            'progress' => 45,
            'icon' => '🧬',
            'modules' => ['Cells', 'Genetics', 'Evolution'],
            'assignments' => ['Cell Structure Review'],
            'announcements' => ['New reading material on genetics'],
            'info' => ['Duration' => '6 weeks', 'Modules' => '3', 'Assignments' => '1'],
        ],
        'chemistry' => [
            'title' => 'Chemistry',
            'teacher' => 'Mrs. Emma',
            'progress' => 30,
            'icon' => '⚗️',
            'modules' => ['Elements', 'Reactions', 'Lab Safety'],
            'assignments' => ['Lab Checklist'],
            'announcements' => ['Safety guidelines updated for lab work'],
            'info' => ['Duration' => '5 weeks', 'Modules' => '3', 'Assignments' => '1'],
        ],
        'english' => [
            'title' => 'English',
            'teacher' => 'Ms. Sarah',
            'progress' => 95,
            'icon' => '📖',
            'modules' => ['Reading', 'Writing', 'Discussion'],
            'assignments' => ['Essay Draft', 'Reading Reflection'],
            'announcements' => ['Essay rubric now available'],
            'info' => ['Duration' => '8 weeks', 'Modules' => '3', 'Assignments' => '2'],
        ],
        'history' => [
            'title' => 'History',
            'teacher' => 'Mr. Michael',
            'progress' => 70,
            'icon' => '🏛️',
            'modules' => ['Ancient', 'Medieval', 'Modern'],
            'assignments' => ['Timeline project', 'Chapter review'],
            'announcements' => ['New timeline charts added'],
            'info' => ['Duration' => '7 weeks', 'Modules' => '3', 'Assignments' => '2'],
        ],
    ];

    $detail = $courses[$slug] ?? [
        'title' => ucwords(str_replace(['-', '_'], ' ', $slug)),
        'teacher' => 'Course Instructor',
        'progress' => 0,
        'icon' => '📚',
        'modules' => [],
        'assignments' => [],
        'announcements' => [],
        'info' => ['Duration' => 'TBD', 'Modules' => '0', 'Assignments' => '0'],
    ];
@endphp

<div class="space-y-8">

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
        <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex items-center gap-5">
                <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-indigo-50 text-4xl">
                    {{ $detail['icon'] }}
                </div>

                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Course Detail</p>
                    <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $detail['title'] }}</h1>
                    <p class="text-slate-500 mt-1">Teacher: {{ $detail['teacher'] }}</p>
                </div>
            </div>

            <div class="rounded-3xl bg-slate-50 p-6 shadow-sm border border-slate-200 w-full xl:w-[360px]">
                <div class="flex items-center justify-between text-sm text-slate-500">
                    <span>Progress</span>
                    <span>{{ $detail['progress'] }}%</span>
                </div>

                <div class="mt-4 h-3 overflow-hidden rounded-full bg-slate-200">
                    <div class="h-3 rounded-full bg-indigo-600 transition-all duration-300" style="width: {{ $detail['progress'] }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Modules</h2>
                    <p class="text-sm text-slate-500 mt-1">Course modules and lessons.</p>
                </div>
                <x-badge>{{ count($detail['modules']) }} modules</x-badge>
            </div>

            <div class="mt-6 space-y-3">
                @if(count($detail['modules']))
                    @foreach($detail['modules'] as $module)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-700">{{ $module }}</div>
                    @endforeach
                @else
                    <p class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">No module content available for this course yet.</p>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Assignments</h2>
                        <p class="text-sm text-slate-500 mt-1">Latest tasks for this course.</p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    @if(count($detail['assignments']))
                        @foreach($detail['assignments'] as $assignment)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-700">{{ $assignment }}</div>
                        @endforeach
                    @else
                        <p class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">No assignments have been published yet.</p>
                    @endif
                </div>
            </x-card>

            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Announcements</h2>
                        <p class="text-sm text-slate-500 mt-1">Course updates and news.</p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    @if(count($detail['announcements']))
                        @foreach($detail['announcements'] as $announcement)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-700">{{ $announcement }}</div>
                        @endforeach
                    @else
                        <p class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">No announcements at the moment.</p>
                    @endif
                </div>
            </x-card>
        </div>

    </div>

    <x-card>
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-slate-900">Course information</h2>
                <p class="text-sm text-slate-500 mt-1">Key details for the selected course.</p>
            </div>
            <x-button variant="secondary">Download syllabus</x-button>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-3">
            @foreach($detail['info'] as $label => $value)
                <div class="rounded-3xl bg-slate-50 p-5 text-center">
                    <p class="text-sm text-slate-500">{{ $label }}</p>
                    <p class="mt-3 text-xl font-semibold text-slate-900">{{ $value }}</p>
                </div>
            @endforeach
        </div>
    </x-card>

</div>

@endsection
