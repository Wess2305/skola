<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skola — Learning made smarter</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-slate-900 antialiased">
    <x-landing.navbar />

    <main class="mx-auto w-full max-w-[1200px] space-y-[72px] overflow-hidden px-5 pb-[72px] pt-7 sm:px-10 lg:space-y-28 lg:px-16 lg:pb-28 lg:pt-10">
        <x-landing.hero />

        <section class="space-y-10 py-9 text-center sm:py-[72px]">
            <h2 class="text-3xl font-bold tracking-[-0.04em] text-slate-900 sm:text-4xl lg:text-[42px]">Everything learning needs. In one calm workspace.</h2>
            <div class="grid gap-5 md:grid-cols-3">
                <x-landing.feature-card title="Easy Learning" copy="A focused, familiar place for lessons, modules, and the next best step." />
                <x-landing.feature-card title="Assignment Management" copy="Create, submit, review, and give feedback without the usual back-and-forth." />
                <x-landing.feature-card title="Real-time Progress" copy="Clear learning signals help every student stay on track and every teacher stay informed." />
            </div>
        </section>

        <section class="rounded-[28px] bg-slate-900 px-5 py-10 text-center sm:px-12 sm:py-16">
            <h2 class="text-3xl font-bold tracking-[-0.04em] text-white sm:text-4xl lg:text-[40px]">A simple rhythm for better learning.</h2>
            <ol class="mt-10 grid gap-5 text-[17px] font-semibold leading-snug text-indigo-200 sm:grid-cols-2 lg:grid-cols-4">
                <li>01&nbsp; Teachers create courses</li><li>02&nbsp; Students enroll</li><li>03&nbsp; Complete assignments</li><li>04&nbsp; Receive grades &amp; feedback</li>
            </ol>
        </section>

        <section id="features" class="space-y-10 py-6 sm:py-12">
            <h2 class="text-center text-3xl font-bold tracking-[-0.04em] text-slate-900 sm:text-4xl lg:text-[42px]">One platform. Every learning moment.</h2>
            <div class="grid gap-6 text-lg font-semibold leading-relaxed text-slate-800 md:grid-cols-3">
                <p>Student Dashboard — See upcoming tasks, course progress, and personalized learning priorities at a glance.</p>
                <p>Teacher Dashboard — Keep course activity, student signals, and review work in a single clear view.</p>
                <p>Assignment Submission — A frictionless workflow for files, deadlines, submissions, and feedback.</p>
                <p>Grade Management — Make grading transparent, timely, and easy to understand.</p>
                <p>Course Modules — Organize lessons into a learning path that feels achievable.</p>
                <p>Announcements — Bring every important update to the people who need it.</p>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-2 md:gap-5">
            <x-landing.audience-card title="For Students" copy="Learning progress · Assignments · Grades · Modules" tone="light" />
            <x-landing.audience-card title="For Teachers" copy="Course management · Student monitoring · Grading · Announcements" tone="dark" />
        </section>

        <section class="grid grid-cols-2 gap-3 rounded-3xl bg-indigo-600 p-4 text-center text-2xl font-bold text-white sm:grid-cols-4 sm:gap-4 sm:p-10 sm:text-[28px]">
            <p>500+<span class="mt-1 block text-base sm:inline sm:pl-3 sm:text-[28px]">Students</span></p>
            <p>30+<span class="mt-1 block text-base sm:inline sm:pl-3 sm:text-[28px]">Teachers</span></p>
            <p>100+<span class="mt-1 block text-base sm:inline sm:pl-3 sm:text-[28px]">Courses</span></p>
            <p>5000+<span class="mt-1 block text-base sm:inline sm:pl-3 sm:text-[28px]">Assignments Submitted</span></p>
        </section>

        <section class="space-y-7">
            <h2 class="text-center text-3xl font-bold tracking-[-0.04em] text-slate-900 sm:text-4xl lg:text-[40px]">Loved by the people who learn and teach.</h2>
            <div class="grid gap-5 text-[17px] font-medium leading-relaxed text-slate-700 md:grid-cols-3">
                <blockquote>“Skola makes it easy to see what’s due and what I’ve already mastered.” — Maya Chen, Student</blockquote>
                <blockquote>“My course administration is lighter, and my feedback reaches students sooner.” — Daniel Soto, Teacher</blockquote>
                <blockquote>“The progress view keeps our entire class moving forward with confidence.” — Aisha Rahman, Student</blockquote>
            </div>
        </section>

        <section class="py-14 text-center">
            <h2 class="text-3xl font-bold tracking-[-0.04em] text-slate-900 sm:text-4xl lg:text-[40px]">Questions, answered.</h2>
            <p class="mx-auto mt-[18px] max-w-4xl text-lg font-medium leading-loose text-slate-600">How do I register? &nbsp;·&nbsp; Can teachers upload assignments? &nbsp;·&nbsp; Can students submit files? &nbsp;·&nbsp; How are grades calculated? &nbsp;·&nbsp; Is Skola mobile friendly?</p>
        </section>

        <x-landing.cta />
    </main>

    <x-landing.footer />
</body>
</html>

