@extends('layouts.app-dashboard')

@section('pageTitle', 'Profile')


@section('content')

<div class="space-y-8">

    <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
        <x-card>
            <div class="flex flex-col items-center gap-5 text-center">
                <div class="flex h-28 w-28 items-center justify-center rounded-full bg-indigo-100 text-4xl">EM</div>
                <div>
                    <h1 class="text-3xl font-semibold text-slate-900">Emma Martin</h1>
                    <p class="text-sm text-slate-500">Math & Science Instructor</p>
                </div>
                <div class="grid w-full grid-cols-2 gap-4">
                    <div class="rounded-3xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Courses</p>
                        <p class="mt-2 text-2xl font-semibold text-slate-900">5</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Assignments</p>
                        <p class="mt-2 text-2xl font-semibold text-slate-900">24</p>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-6">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Profile details</h2>
                    <p class="text-sm text-slate-500">Information for your instructor account.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-sm text-slate-500">Email</p>
                        <p class="mt-2 text-slate-900">emma.martin@example.com</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Phone</p>
                        <p class="mt-2 text-slate-900">+1 (555) 987-6543</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Office</p>
                        <p class="mt-2 text-slate-900">Room 203, Science Hall</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Department</p>
                        <p class="mt-2 text-slate-900">Mathematics & Physics</p>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Recent activity</h2>
            <p class="mt-3 text-sm text-slate-500">Quick summary of your latest course work.</p>
            <div class="mt-6 space-y-4">
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Last login</p>
                    <p class="mt-2 text-slate-900">Today at 8:15 AM</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Pending reviews</p>
                    <p class="mt-2 text-slate-900">14 items</p>
                </div>
            </div>
        </x-card>
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Teaching stats</h2>
            <div class="mt-6 space-y-4">
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Average rating</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">4.8/5</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Assignments graded</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">124</p>
                </div>
            </div>
        </x-card>
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Upcoming</h2>
            <p class="mt-3 text-sm text-slate-500">Next session and deadlines.</p>
            <div class="mt-6 space-y-4">
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="font-semibold text-slate-900">Physics review</p>
                    <p class="text-sm text-slate-500 mt-1">Tomorrow at 11:00 AM</p>
                </div>
                <div class="rounded-3xl bg-slate-50 p-4">
                    <p class="font-semibold text-slate-900">Grade submission</p>
                    <p class="text-sm text-slate-500 mt-1">Due Friday</p>
                </div>
            </div>
        </x-card>
    </div>

</div>

@endsection
