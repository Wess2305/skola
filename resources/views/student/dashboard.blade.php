@extends('layouts.app-dashboard')

@section('content')

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
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

<div class="flex flex-wrap gap-3 mt-6">

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

</div>

</div>
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

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

<x-card>

<h2 class="text-xl font-bold mb-6">
Continue Learning
</h2>

<div class="space-y-6">

<div>

<div class="flex justify-between items-center">

    <span class="font-medium">
        Mathematics
    </span>

    <a href="#"
       class="text-indigo-600 text-sm hover:underline">
        Continue →
    </a>

<span>80%</span>

</div>

<div class="mt-2 h-3 bg-slate-200 rounded-full">

<div class="h-3 bg-indigo-600 rounded-full w-4/5">

</div>

</div>

</div>

<div>

<div class="flex justify-between">

<span>Physics</span>

<span>60%</span>

</div>

<div class="mt-2 h-3 bg-slate-200 rounded-full">

<div class="h-3 bg-indigo-600 rounded-full w-3/5">

</div>

</div>

</div>

</div>

</x-card>

<div class="space-y-6">

<x-card>

<h2 class="font-bold mb-4">

Today's Tasks

</h2>

<ul class="space-y-4">

<li class="flex items-center gap-3">

<input type="checkbox">

<span>
Physics Homework
</span>

</li>

<li class="flex items-center gap-3">

<input type="checkbox">

<span>
Biology Report
</span>

</li>

<li class="flex items-center gap-3">

<input type="checkbox">

<span>
English Essay
</span>

</li>

</ul>

</x-card>

</div>
<x-card>
<div class="flex justify-between">

<span>
📅 Math Quiz
</span>

<x-badge variant="danger">
Tomorrow
</x-badge>

</div>
<div class="flex justify-between">

<span>
📅 Chemistry Project
</span>

<x-badge variant="warning">
Friday
</x-badge>

</div>

</x-card>
<x-card>

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-xl font-bold">
            Recent Announcements
        </h2>

        <a href="#" class="text-indigo-600 text-sm hover:underline">
            View All
        </a>

    </div>
    

    <div class="space-y-4">

        <div class="flex justify-between items-center border-b pb-4">

            <div>

                <h3 class="font-semibold">
                    📢 Midterm Schedule Released
                </h3>

                <p class="text-slate-500 text-sm">
                    Check your examination timetable.
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

                <p class="text-slate-500 text-sm">
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