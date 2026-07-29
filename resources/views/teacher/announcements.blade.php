@extends('layouts.app-dashboard')

@section('pageTitle', 'Announcements')


@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Announcements</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Class updates</h1>
            <p class="mt-2 text-slate-500">Publish announcements to keep students informed.</p>
        </div>
        <a href="{{ route('teacher.announcements') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Create Announcement</a>
    </div>

    <div class="space-y-4">
        @foreach([
            ['course' => 'Chemistry', 'title' => 'Lab safety reminder', 'message' => 'Please review the updated safety procedures before tomorrow’s lab.', 'time' => '2h ago'],
            ['course' => 'Biology', 'title' => 'Field trip form due Friday', 'message' => 'Submit the permission slip before the end of the week.', 'time' => 'Today'],
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

</div>

@endsection
