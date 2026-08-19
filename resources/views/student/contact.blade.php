@extends('layouts.app-dashboard')

@section('pageTitle', 'Tanya Dong')

@section('content')
<div class="space-y-8">
    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Tanya Dong</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Tanya Dong</h1>
        <p class="mt-2 text-slate-500">Have a question? Ask your teacher anonymously.</p>
    </div>

    @if (session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <x-card>
        <form action="{{ route('student.contact.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="teacher_id" class="mb-2 block text-sm font-semibold text-slate-700">Teacher</label>
                <select id="teacher_id" name="teacher_id" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" required>
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="mb-2 block text-sm font-semibold text-slate-700">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" placeholder="e.g. How do I understand this topic?" required>
                @error('subject')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="mb-2 block text-sm font-semibold text-slate-700">Question</label>
                <textarea id="message" name="message" rows="6" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200" placeholder="I don't understand how to solve this problem..." required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <p class="text-sm text-slate-500">Your identity will not be shown to the teacher. This question is sent anonymously.</p>

            <div class="flex flex-wrap gap-3">
                <button type="submit" class="inline-flex items-center rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Send Anonymously</button>
            </div>
        </form>
    </x-card>
</div>
@endsection
