@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    {{-- HERO --}}
    <div class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-purple-600 rounded-3xl p-8 text-white shadow-lg">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-4xl font-bold">
                    Good Afternoon 👋
                </h1>

                <p class="mt-2 text-indigo-100">
                    Welcome back! Continue your learning journey.
                </p>

            </div>

            <div class="hidden lg:block text-6xl">
                🎓
            </div>

        </div>

    </div>

    {{-- QUICK ACTION --}}
    <div class="flex flex-wrap gap-3">

        <x-button>
            📚 My Courses
        </x-button>

        <x-button variant="secondary">
            📝 Assignments
        </x-button>

        <x-button variant="secondary">
            📅 Calendar
        </x-button>

    </div>

    {{-- STAT CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <x-stat-card
            title="Courses"
            value="6"
            description="Enrolled"
        />

        <x-stat-card
            title="Assignments"
            value="12"
            description="3 Pending"
        />

        <x-stat-card
            title="Average"
            value="92%"
            description="Excellent"
        />

        <x-stat-card
            title="Streak"
            value="16 Days"
            description="Keep Going!"
        />

    </div>

</div>
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

    {{-- LEFT --}}
    <div class="xl:col-span-2">

<x-card>

    <h2 class="text-xl font-bold mb-6">
        Continue Learning
    </h2>

    <div class="space-y-6">

        {{-- Mathematics --}}
        <div>

            <div class="flex justify-between items-center mb-2">

                <span class="font-medium text-slate-700">
                    📘 Mathematics
                </span>

                <span class="text-sm text-slate-500">
                    80%
                </span>

            </div>

            <div class="w-full h-3 bg-slate-200 rounded-full">

                <div class="w-4/5 h-3 bg-indigo-600 rounded-full"></div>

            </div>

        </div>

    </div>
{{-- Physics --}}
<div>

    <div class="flex justify-between items-center mb-2">

        <span class="font-medium text-slate-700">
            🧪 Physics
        </span>

        <span class="text-sm text-slate-500">
            60%
        </span>

    </div>

    <div class="w-full h-3 bg-slate-200 rounded-full">

        <div class="w-3/5 h-3 bg-indigo-600 rounded-full"></div>

    </div>

</div>
</x-card>

    </div>

    {{-- RIGHT --}}
    <div class="space-y-6">

        {{-- Tasks --}}
<x-card>

    <h2 class="text-xl font-bold mb-6">
        Today's Tasks
    </h2>

    <div class="space-y-4">

        <label class="flex items-center gap-3">

            <input type="checkbox">

            <span>Physics Homework</span>

        </label>

        <label class="flex items-center gap-3">

            <input type="checkbox">

            <span>Biology Report</span>

        </label>

        <label class="flex items-center gap-3">

            <input type="checkbox">

            <span>English Essay</span>

        </label>

    </div>

</x-card>
        {{-- Deadline --}}
<x-card>

    <h2 class="text-xl font-bold mb-6">
        Upcoming Deadlines
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between items-center">

            <span>📅 Math Quiz</span>

            <x-badge variant="danger">
                Tomorrow
            </x-badge>

        </div>

        <div class="flex justify-between items-center">

            <span>🧪 Chemistry Project</span>

            <x-badge variant="warning">
                Friday
            </x-badge>

        </div>

    </div>

</x-card>
    </div>

</div>




<x-card>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-bold">
            Recent Announcements
        </h2>

        <a href="#" class="text-indigo-600 text-sm hover:underline">
            View All
        </a>

    </div>

    <div class="space-y-5">

        <div class="flex justify-between items-center border-b pb-4">

            <div>

                <h3 class="font-semibold">
                    📢 Midterm Schedule Released
                </h3>

                <p class="text-sm text-slate-500">
                    Check your exam schedule.
                </p>

            </div>

            <x-badge>
                New
            </x-badge>

        </div>

        <div class="flex justify-between items-center">

            <div>

                <h3 class="font-semibold">
                    📢 Holiday Notice
                </h3>

                <p class="text-sm text-slate-500">
                    School will be closed next Monday.
                </p>

            </div>

            <x-badge variant="warning">
                Important
            </x-badge>

        </div>

    </div>

</x-card>
@endsection