@extends('layouts.app-dashboard')

@section('pageTitle', 'Courses')


@section('content')

<div class="space-y-8">

    <div>
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Courses</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900">My Courses</h1>
                <p class="mt-2 text-slate-500">Browse your enrolled classes and continue learning.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('student.calendar') }}" class="inline-flex items-center rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm border border-slate-200 hover:bg-slate-50">Calendar</a>
            </div>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1.5fr_0.9fr]">
        <x-card class="p-6">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-indigo-50 text-2xl">🔎</div>
                <input type="text" placeholder="Search courses..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 focus:border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-100" />
            </div>
        </x-card>
        <x-card class="p-6">
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Course progress</h2>
                <p class="mt-2 text-sm text-slate-500">Your current completion overview.</p>
                <div class="mt-6 space-y-4">
                    <div class="rounded-3xl bg-slate-50 p-4">
                        <div class="flex items-center justify-between text-sm text-slate-500">
                            <span>Overall progress</span>
                            <span>65%</span>
                        </div>
                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-slate-200">
                            <div class="h-2 w-2/3 rounded-full bg-indigo-600"></div>
                        </div>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <div class="rounded-3xl bg-white p-4 border border-slate-200">
                            <p class="text-sm text-slate-500">Active courses</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">6</p>
                        </div>
                        <div class="rounded-3xl bg-white p-4 border border-slate-200">
                            <p class="text-sm text-slate-500">Assignments due</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900">5</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <x-course-card course="mathematics" title="Mathematics" teacher="Mr. Anderson" progress="80" icon="📘" />
        <x-course-card course="physics" title="Physics" teacher="Mrs. Olivia" progress="60" icon="🧪" />
        <x-course-card course="biology" title="Biology" teacher="Mr. James" progress="45" icon="🧬" />
        <x-course-card course="chemistry" title="Chemistry" teacher="Mrs. Emma" progress="30" icon="⚗️" />
        <x-course-card course="english" title="English" teacher="Ms. Sarah" progress="95" icon="📖" />
        <x-course-card course="history" title="History" teacher="Mr. Michael" progress="70" icon="🏛️" />
    </div>

</div>

@endsection
