@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Announcements</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Class updates</h1>
            <p class="mt-2 text-slate-500">Publish announcements to keep students informed.</p>
        </div>
        <a href="#" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create Announcement</a>
    </div>

    <div class="space-y-6">
        @foreach([
            ['title' => 'New syllabus reminder', 'course' => 'Mathematics', 'message' => 'Updated syllabus is uploaded for review.', 'time' => 'Today'],
            ['title' => 'Lab equipment check', 'course' => 'Chemistry', 'message' => 'Make sure all students complete the checklist before lab.', 'time' => 'Yesterday'],
            ['title' => 'Essay submission guidelines', 'course' => 'English', 'message' => 'Submit drafts before the weekend deadline.', 'time' => '2 days ago'],
        ] as $item)
            <x-card>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <p class="text-sm text-indigo-600">{{ $item['course'] }}</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900">{{ $item['title'] }}</h2>
                        <p class="mt-2 text-slate-500">{{ $item['message'] }}</p>
                    </div>
                    <span class="rounded-2xl bg-slate-100 px-3 py-1 text-sm text-slate-700">{{ $item['time'] }}</span>
                </div>
            </x-card>
        @endforeach
    </div>

</div>

@endsection
