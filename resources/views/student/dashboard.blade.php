@extends('layouts.app-dashboard')

@section('pageTitle', 'Dashboard')


@section('content')

<div class="space-y-8">

    <section class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-purple-600 rounded-3xl p-8 text-white shadow-lg overflow-hidden">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-indigo-100">Welcome back, Student</p>
                <h1 class="mt-4 text-4xl font-semibold">Your learning dashboard</h1>
                <p class="mt-3 max-w-2xl text-slate-100/90">Continue your most important classes, stay on top of deadlines, and manage your study flow in one place.</p>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-2">
                <div class="rounded-3xl bg-white/10 p-5">
                    <p class="text-sm text-indigo-100">Courses</p>
                    <p class="mt-3 text-3xl font-semibold">6</p>
                </div>
                <div class="rounded-3xl bg-white/10 p-5">
                    <p class="text-sm text-indigo-100">Points</p>
                    <p class="mt-3 text-3xl font-semibold">1,420</p>
                </div>
                <div class="rounded-3xl bg-white/10 p-5">
                    <p class="text-sm text-indigo-100">Streak</p>
                    <p class="mt-3 text-3xl font-semibold">16 days</p>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-4 md:grid-cols-3">
        <x-card class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-slate-500">Continue learning</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">4 active courses</p>
            </div>
            <div class="rounded-3xl bg-indigo-50 p-4 text-2xl">📘</div>
        </x-card>
        <x-card class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-slate-500">Pending tasks</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">5 items</p>
            </div>
            <div class="rounded-3xl bg-indigo-50 p-4 text-2xl">📝</div>
        </x-card>
        <x-card class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-slate-500">Upcoming exams</p>
                <p class="mt-2 text-2xl font-semibold text-slate-900">3 events</p>
            </div>
            <div class="rounded-3xl bg-indigo-50 p-4 text-2xl">⏰</div>
        </x-card>
    </section>

    <section class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
        <x-card>
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Continue Learning</h2>
                        <p class="text-sm text-slate-500">Pick up where you left off.</p>
                    </div>
                    <a href="{{ route('student.courses') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition">Browse courses</a>
                </div>

                <div class="space-y-5">
                    @forelse($courses as $course)
                        <div class="space-y-3 rounded-3xl border border-slate-200 bg-slate-50 p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-slate-500">{{ $course->title }}</p>
                                    <p class="text-xs text-slate-400">{{ $course->teacher?->name ?? 'Instructor' }}</p>
                                </div>
                                <span class="text-sm text-slate-500">{{ $course->modules_count ?? 0 }} modules</span>
                            </div>
                            <div class="h-2 overflow-hidden rounded-full bg-slate-200">
                                <div class="h-2 w-4/5 rounded-full bg-indigo-600"></div>
                            </div>
                        </div>
                    @empty
                        <p class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-5 text-sm text-slate-500">No enrolled courses yet.</p>
                    @endforelse
                </div>
            </div>
        </x-card>

        <div class="space-y-6">
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">Today's Tasks</h2>
                        <p class="text-sm text-slate-500">Finish your top priorities.</p>
                    </div>
                    <x-badge>3 left</x-badge>
                </div>
                <div class="mt-6 space-y-4">
                    @forelse($upcomingAssignments as $assignment)
                        <div class="rounded-3xl border border-slate-200 bg-white px-4 py-3">
                            <p class="font-semibold text-slate-900">{{ $assignment->title }}</p>
                            <p class="mt-1 text-sm text-slate-500">{{ $assignment->course->title }} · Due {{ $assignment->due_date }}</p>
                        </div>
                    @empty
                        <p class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-4 text-sm text-slate-500">No upcoming assignments.</p>
                    @endforelse
                </div>
            </x-card>

            <x-card>
                <h2 class="text-xl font-semibold text-slate-900">Upcoming Deadlines</h2>
                <div class="mt-6 space-y-4">
                    @forelse($upcomingAssignments as $assignment)
                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $assignment->title }}</p>
                                    <p class="text-sm text-slate-500">Due {{ $assignment->due_date }}</p>
                                </div>
                                <x-badge variant="warning">{{ $assignment->course->title }}</x-badge>
                            </div>
                        </div>
                    @empty
                        <p class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-4 text-sm text-slate-500">No deadlines available.</p>
                    @endforelse
                </div>
            </x-card>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent Announcements</h2>
                    <p class="text-sm text-slate-500">Everything you need to know this week.</p>
                </div>
                <a href="{{ route('student.notifications') }}" class="text-indigo-600 text-sm font-semibold hover:underline">See all</a>
            </div>

            <div class="mt-6 space-y-5">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-semibold text-slate-900">Midterm schedule released</h3>
                            <p class="mt-1 text-sm text-slate-500">All exam slots are now available in your calendar.</p>
                        </div>
                        <x-badge>New</x-badge>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-semibold text-slate-900">Holiday notice</h3>
                            <p class="mt-1 text-sm text-slate-500">The campus will be closed next Monday.</p>
                        </div>
                        <x-badge variant="warning">Important</x-badge>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Progress snapshot</h2>
                    <p class="text-sm text-slate-500">Keep an eye on your strongest courses.</p>
                </div>
                <x-badge>Updated</x-badge>
            </div>

            <div class="mt-6 space-y-5">
                <div>
                    <div class="flex justify-between text-sm text-slate-500 mb-2">
                        <span>English</span>
                        <span>95%</span>
                    </div>
                    <div class="h-2 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-2 w-[95%] rounded-full bg-indigo-600"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm text-slate-500 mb-2">
                        <span>History</span>
                        <span>70%</span>
                    </div>
                    <div class="h-2 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-2 w-[70%] rounded-full bg-indigo-600"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm text-slate-500 mb-2">
                        <span>Chemistry</span>
                        <span>30%</span>
                    </div>
                    <div class="h-2 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-2 w-[30%] rounded-full bg-indigo-600"></div>
                    </div>
                </div>
            </div>
        </x-card>
    </section>

</div>

@endsection
