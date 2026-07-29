@props([
    'course',
    'title',
    'teacher',
    'progress',
    'icon',
])

<div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6 hover:shadow-lg transition">

    <div class="flex items-center justify-between">
        <h3 class="text-xl font-semibold text-slate-800">
            {{ $title }}
        </h3>

        <span class="text-2xl">
            {{ $icon }}
        </span>
    </div>

    <p class="text-slate-500 mt-2">
        {{ $teacher }}
    </p>

    <div class="mt-6">
        <div class="flex justify-between text-sm mb-2">
            <span>Progress</span>
            <span>{{ $progress }}%</span>
        </div>

        <div class="w-full h-2 bg-slate-200 rounded-full">
            <div
                class="h-2 bg-indigo-600 rounded-full"
                style="width: {{ $progress }}%">
            </div>
        </div>
    </div>

    <a
        href="{{ route('student.course.detail', $course) }}"
        class="block text-center mt-6 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-xl transition">

        Continue Learning

    </a>

</div>