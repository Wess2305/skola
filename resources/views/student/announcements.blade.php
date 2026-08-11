@extends('layouts.app-dashboard')

@section('pageTitle', 'Announcements')

@section('content')

<div class="space-y-8">

    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">
            Announcements
        </p>

        <h1 class="mt-3 text-3xl font-semibold text-slate-900">
            Latest Updates
        </h1>

        <p class="mt-2 text-slate-500">
            Stay updated with announcements from your teachers.
        </p>
    </div>

    <div class="space-y-5">

        @forelse ($announcements as $announcement)

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                    <div>

                        @if ($announcement->course)
                            <p class="text-sm font-semibold text-indigo-600">
                                {{ $announcement->course->title }}
                            </p>
                        @else
                            <p class="text-sm font-semibold text-indigo-600">
                                School Announcement
                            </p>
                        @endif

                        <h2 class="mt-2 text-xl font-semibold text-slate-900">
                            {{ $announcement->title }}
                        </h2>

                        <p class="mt-2 leading-7 text-slate-600">
                            {{ $announcement->content }}
                        </p>

                        <p class="mt-4 text-sm text-slate-400">
                            Posted by {{ $announcement->teacher->name ?? 'Teacher' }}
                            · {{ $announcement->created_at->diffForHumans() }}
                        </p>

                    </div>

                    <span class="inline-flex w-fit rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-600">
                        New
                    </span>

                </div>

            </div>

        @empty

            <div class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-8 text-center">

                <p class="font-semibold text-slate-700">
                    No announcements yet.
                </p>

                <p class="mt-1 text-sm text-slate-500">
                    New announcements from your teachers will appear here.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection