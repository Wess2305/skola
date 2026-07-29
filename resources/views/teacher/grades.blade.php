@extends('layouts.app-dashboard')

@section('content')

<div class="space-y-8">

    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Grades</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Gradebook</h1>
        <p class="mt-2 text-slate-500">View scores and take action on recent grading items.</p>
    </div>

    <x-card>
        <div class="overflow-hidden rounded-3xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-slate-800">Student</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Assignment</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Score</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @foreach([
                        ['student' => 'Liam Harper', 'assignment' => 'Algebra Homework', 'score' => '94'],
                        ['student' => 'Ava Lee', 'assignment' => 'Physics Lab', 'score' => '88'],
                        ['student' => 'Emma Chen', 'assignment' => 'History Essay', 'score' => '90'],
                    ] as $item)
                        <tr>
                            <td class="px-6 py-4 text-slate-700">{{ $item['student'] }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $item['assignment'] }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $item['score'] }}%</td>
                            <td class="px-6 py-4">
                                <button class="rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Review</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>

</div>

@endsection
