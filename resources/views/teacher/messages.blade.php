@extends('layouts.app-dashboard')

@section('pageTitle', 'Tanya Dong')

@section('content')
<div class="space-y-8">
    <div>
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-600">Tanya Dong</p>
        <h1 class="mt-3 text-3xl font-semibold text-slate-900">Tanya Dong</h1>
        <p class="mt-2 text-slate-500">Anonymous questions from your students.</p>
    </div>

    @if($messages->isEmpty())
        <x-empty-state title="No messages yet" description="Anonymous questions from students will appear here." />
    @else
        <div class="space-y-4">
            @foreach($messages as $contactMessage)
                <x-card>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-600">Anonymous Student</span>
                        <span class="text-sm text-slate-400">{{ $contactMessage->created_at->format('d F Y') }}</span>
                    </div>

                    <h2 class="mt-4 text-lg font-semibold text-slate-900">{{ $contactMessage->subject }}</h2>
                    <p class="mt-2 text-slate-600 whitespace-pre-line">{{ $contactMessage->message }}</p>
                </x-card>
            @endforeach
        </div>
    @endif
</div>
@endsection
