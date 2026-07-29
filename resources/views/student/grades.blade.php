@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Grades</p>
            <h1 class="mt-3 text-3xl font-semibold text-slate-900">Learning progress</h1>
            <p class="mt-2 text-slate-500">Track your GPA, scores, and course performance.</p>
        </div>
        <a href="{{ route('student.course.detail', 'mathematics') }}" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Review course</a>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <x-stat-card title="GPA" value="3.9" description="Excellent" />
        <x-stat-card title="Average" value="92%" description="Strong" />
        <x-stat-card title="Completed" value="18" description="Courses" />
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Course grades</h2>
                    <p class="text-sm text-slate-500">Visual performance by course.</p>
                </div>
                <x-badge>Updated</x-badge>
            </div>
            <div class="mt-6 space-y-5">
                @foreach([
                    ['course' => 'Mathematics', 'grade' => 'A', 'score' => 96],
                    ['course' => 'English', 'grade' => 'A', 'score' => 92],
                    ['course' => 'Physics', 'grade' => 'B+', 'score' => 85],
                    ['course' => 'History', 'grade' => 'A-', 'score' => 88],
                ] as $item)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm font-medium text-slate-500">{{ $item['course'] }}</p>
                                <p class="mt-1 text-2xl font-semibold text-slate-900">{{ $item['grade'] }}</p>
                            </div>
                            <span class="text-sm text-slate-500">{{ $item['score'] }}%</span>
                        </div>
                        <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-200">
                            <div class="h-2 rounded-full bg-indigo-600" style="width: {{ $item['score'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>

        <x-card>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Progress summary</h2>
                    <p class="text-sm text-slate-500">Your strongest and weakest courses.</p>
                </div>
            </div>
            <div class="mt-6 space-y-5">
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>Best score</span>
                        <span>96%</span>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>Average score</span>
                        <span>92%</span>
                    </div>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                    <div class="flex items-center justify-between text-sm text-slate-500">
                        <span>Assignments graded</span>
                        <span>14</span>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

</div>

@endsection
