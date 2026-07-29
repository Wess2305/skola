@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Notifications</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Announcements</h1>
        <p class="mt-2 text-slate-500">Latest updates from your courses and school.</p>
    </div>

    <div class="space-y-6">
        @foreach([
            ['title' => 'Exam schedule now live', 'message' => 'Check your dashboard for exam times and room assignments.', 'time' => '2 hours ago', 'badge' => 'New'],
            ['title' => 'Library online resources', 'message' => 'New study guides and videos are available for all students.', 'time' => 'Yesterday', 'badge' => 'Info'],
            ['title' => 'New Chemistry lab rules', 'message' => 'Review the updated safety guidelines before your next session.', 'time' => '2 days ago', 'badge' => 'Important'],
        ] as $note)
            <x-card class="border-indigo-100 bg-indigo-50/40">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">{{ $note['title'] }}</h2>
                        <p class="mt-2 text-slate-600">{{ $note['message'] }}</p>
                    </div>
                    <div class="text-sm text-slate-500">
                        <p>{{ $note['time'] }}</p>
                        <x-badge class="mt-2">{{ $note['badge'] }}</x-badge>
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection
