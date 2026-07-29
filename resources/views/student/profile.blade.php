@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
        <x-card>
            <div class="flex flex-col items-center gap-5 text-center">
                <div class="flex h-28 w-28 items-center justify-center rounded-full bg-indigo-100 text-4xl">JD</div>
                <div>
                    <h1 class="text-3xl font-semibold text-slate-900">Jane Doe</h1>
                    <p class="text-sm text-slate-500">Computer Science Student</p>
                </div>
                <div class="grid w-full grid-cols-2 gap-4">
                    <div class="rounded-3xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Attendance</p>
                        <p class="mt-2 text-xl font-semibold text-slate-900">96%</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Completed</p>
                        <p class="mt-2 text-xl font-semibold text-slate-900">18 courses</p>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-6">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Student Information</h2>
                    <p class="text-sm text-slate-500">Profile details for your student account.</p>
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <p class="text-sm text-slate-500">Email</p>
                            <p class="mt-2 text-slate-900">jane.doe@example.com</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">Phone</p>
                            <p class="mt-2 text-slate-900">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <p class="text-sm text-slate-500">Address</p>
                            <p class="mt-2 text-slate-900">123 Elm Street, New York</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">Blood Type</p>
                            <p class="mt-2 text-slate-900">O+</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Achievements</h2>
            <div class="mt-6 space-y-4">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <p class="font-semibold text-slate-900">Honor Roll</p>
                    <p class="text-sm text-slate-500 mt-1">Maintain a grade average above 90%.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <p class="font-semibold text-slate-900">Perfect Attendance</p>
                    <p class="text-sm text-slate-500 mt-1">Joined every class this month.</p>
                </div>
            </div>
        </x-card>
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Attendance</h2>
            <p class="mt-3 text-sm text-slate-500">Your participation across classes.</p>
            <div class="mt-6 space-y-4">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Present</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">96%</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-sm text-slate-500">Late</p>
                    <p class="mt-2 text-2xl font-semibold text-slate-900">2%</p>
                </div>
            </div>
        </x-card>
        <x-card>
            <h2 class="text-xl font-semibold text-slate-900">Completed Courses</h2>
            <div class="mt-6 space-y-3 text-sm text-slate-500">
                <p>Mathematics</p>
                <p>English</p>
                <p>History</p>
            </div>
        </x-card>
    </div>

</div>

@endsection
