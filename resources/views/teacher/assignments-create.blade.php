@extends('layouts.app-dashboard')

@section('pageTitle', 'Create Announcement')

@section('content')

<div class="max-w-3xl space-y-8">

    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">
            Announcements
        </p>

        <h1 class="mt-3 text-3xl font-semibold text-slate-900">
            Create Announcement
        </h1>

        <p class="mt-2 text-slate-500">
            Share an important update with your students.
        </p>
    </div>

    @if ($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('teacher.announcements.store') }}"
        class="space-y-6"
    >

        @csrf

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm space-y-6">

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Course
                </label>

                <select
                    name="course_id"
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                    <option value="">
                        All students
                    </option>

                    @foreach ($courses as $course)
                        <option
                            value="{{ $course->id }}"
                            {{ old('course_id') == $course->id ? 'selected' : '' }}
                        >
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="e.g. Mathematics Midterm Reminder"
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Message
                </label>

                <textarea
                    name="content"
                    rows="6"
                    placeholder="Write your announcement..."
                    class="w-full rounded-2xl border border-slate-300 px-4 py-3 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >{{ old('content') }}</textarea>
            </div>

            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('teacher.announcements') }}"
                    class="rounded-2xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white hover:bg-indigo-700"
                >
                    Publish Announcement
                </button>

            </div>

        </div>

    </form>

</div>

@endsection