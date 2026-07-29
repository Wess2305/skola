@extends('layouts.app-dashboard')

@section('pageTitle', 'Students')


@section('content')

<div class="space-y-8">

    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Students</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Student performance</h1>
        <p class="mt-2 text-slate-500">Monitor attendance and average grades for the class.</p>
    </div>

    <x-card>
        <div class="overflow-hidden rounded-3xl border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-slate-800">Student</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Course</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Attendance</th>
                        <th class="px-6 py-4 font-semibold text-slate-800">Average Grade</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @foreach([
                        ['name' => 'Liam Harper', 'course' => 'Mathematics', 'attendance' => '98%', 'grade' => 'A'],
                        ['name' => 'Ava Lee', 'course' => 'Physics', 'attendance' => '94%', 'grade' => 'A-'],
                        ['name' => 'Noah Kim', 'course' => 'Biology', 'attendance' => '91%', 'grade' => 'B+'],
                        ['name' => 'Emma Chen', 'course' => 'History', 'attendance' => '96%', 'grade' => 'A'],
                    ] as $student)
                        <tr>
                            <td class="px-6 py-4 text-slate-700">{{ $student['name'] }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $student['course'] }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $student['attendance'] }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $student['grade'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>

</div>

@endsection
