
========================================================================
FILE: resources/views/welcome.blade.php
========================================================================

{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skola — Learning Made Smarter</title>
    <meta name="description" content="Skola helps teachers manage courses and empowers students to learn smarter through one modern learning platform.">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white font-inter overflow-x-hidden">

    {{-- Navigation --}}
    @include('landing.partials.navbar')

    {{-- Main Content --}}
    <main>
        {{-- Section 1: Hero --}}
        @include('landing.partials.hero')

        {{-- Section 2: Why Skola --}}
        @include('landing.partials.why-skola')

        {{-- Section 3: How It Works --}}
        @include('landing.partials.how-it-works')

        {{-- Section 4: Features --}}
        @include('landing.partials.features')

        {{-- Section 5: Benefits --}}
        @include('landing.partials.benefits')

        {{-- Section 6: Statistics --}}
        @include('landing.partials.statistics')

        {{-- Section 7: Testimonials --}}
        @include('landing.partials.testimonials')

        {{-- Section 8: FAQ --}}
        @include('landing.partials.faq')

        {{-- Section 9: Final CTA --}}
        @include('landing.partials.cta')
    </main>

    {{-- Footer --}}
    @include('landing.partials.footer')

    {{-- Scroll Animation Script --}}
    @include('landing.partials.scripts')

</body>
</html>


========================================================================
FILE: resources/views/landing/partials/navbar.blade.php
========================================================================

{{-- resources/views/landing/partials/navbar.blade.php --}}
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-2 font-bold text-xl text-gray-900">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </div>
                Skola
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">Features</a>
                <a href="#how-it-works" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">How It Works</a>
                <a href="#faq" class="text-sm text-gray-600 hover:text-gray-900 transition-colors">FAQ</a>
            </nav>

            {{-- CTA --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors hidden sm:block">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-sm font-semibold bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                        Get Started
                    </a>
                @endauth

                {{-- Mobile Hamburger --}}
                <button id="nav-toggle" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="md:hidden hidden pb-4 border-t border-gray-100 mt-2 pt-4">
            <nav class="flex flex-col gap-3">
                <a href="#features" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors py-1">Features</a>
                <a href="#how-it-works" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors py-1">How It Works</a>
                <a href="#faq" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors py-1">FAQ</a>
                @guest
                    <hr class="border-gray-100">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 py-1">Login</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-indigo-600 py-1">Register Free</a>
                @endguest
            </nav>
        </div>
    </div>
</header>


========================================================================
FILE: resources/views/landing/partials/hero.blade.php
========================================================================

{{-- resources/views/landing/partials/hero.blade.php --}}
<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">

    {{-- Background gradient blur decorations --}}
    <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-indigo-100 rounded-full blur-3xl opacity-40 pointer-events-none"></div>

    <div class="relative max-w-6xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            {{-- Copy --}}
            <div class="flex flex-col gap-6">

                {{-- Eyebrow --}}
                <p class="text-xs font-bold tracking-widest text-indigo-600 uppercase
                           animate-fade-up" style="animation-delay: 0s;">
                    THE MODERN LEARNING PLATFORM
                </p>

                {{-- Headline --}}
                <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 leading-[1.02] tracking-tight
                            animate-fade-up" style="animation-delay: 0.1s;">
                    Learning<br>Made Smarter.
                </h1>

                {{-- Subheadline --}}
                <p class="text-lg lg:text-xl text-gray-500 leading-relaxed max-w-md
                           animate-fade-up" style="animation-delay: 0.22s;">
                    Skola helps teachers manage courses and empowers students to learn smarter
                    through one modern learning platform.
                </p>

                {{-- Floating status chips --}}
                <div class="flex flex-wrap gap-2 animate-fade-up" style="animation-delay: 0.32s;">
                    @foreach(['📋 Assignments', '📊 Grades', '📚 Courses', '📈 Progress'] as $chip)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full
                                     bg-indigo-50 border border-indigo-100 text-indigo-700
                                     text-xs font-semibold">
                            {{ $chip }}
                        </span>
                    @endforeach
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-wrap gap-3 animate-fade-up" style="animation-delay: 0.36s;">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white
                                  font-semibold rounded-xl hover:bg-indigo-700 transition-all
                                  hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-200 active:scale-95">
                            Go to Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white
                                  font-semibold rounded-xl hover:bg-indigo-700 transition-all
                                  hover:-translate-y-0.5 hover:shadow-lg hover:shadow-indigo-200 active:scale-95">
                            Get Started
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#features"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-50 text-indigo-700
                                  font-semibold rounded-xl hover:bg-indigo-100 transition-all
                                  hover:-translate-y-0.5 active:scale-95">
                            Explore Features
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Hero Image --}}
            <div class="relative animate-fade-up" style="animation-delay: 0.2s;">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-indigo-200/60 aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1758270705290-62b6294dd044?w=900&q=85"
                         alt="Students collaborating around a laptop"
                         class="w-full h-full object-cover">
                </div>

                {{-- Floating progress card --}}
                <div class="absolute -bottom-4 -left-4 lg:bottom-6 lg:-left-8
                            bg-white rounded-2xl shadow-xl border border-gray-100
                            px-4 py-3 flex flex-col gap-1 min-w-[160px]
                            animate-float">
                    <p class="text-[10px] font-bold tracking-widest text-indigo-600 uppercase">Weekly Progress</p>
                    <p class="text-xl font-extrabold text-gray-900">84% complete</p>
                    <div class="w-full h-1.5 bg-indigo-100 rounded-full overflow-hidden">
                        <div class="h-full w-[84%] bg-indigo-600 rounded-full"></div>
                    </div>
                </div>

                {{-- Floating active users card --}}
                <div class="absolute -top-4 -right-4 lg:top-6 lg:-right-8
                            bg-white rounded-2xl shadow-xl border border-gray-100
                            px-4 py-3 flex items-center gap-3
                            animate-float" style="animation-delay: 1s;">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Active now</p>
                        <p class="text-sm font-bold text-gray-900">500+ Students</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/why-skola.blade.php
========================================================================

{{-- resources/views/landing/partials/why-skola.blade.php --}}
<section class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        {{-- Title --}}
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 text-center leading-tight tracking-tight mb-12
                    reveal-on-scroll">
            Everything learning needs.<br>In one calm workspace.
        </h2>

        {{-- Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                [
                    'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                    'title' => 'Easy Learning',
                    'desc' => 'A focused, familiar place for lessons, modules, and the next best step — designed to keep students in flow.',
                    'color' => 'bg-indigo-50 text-indigo-600',
                    'delay' => '0ms',
                ],
                [
                    'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                    'title' => 'Assignment Management',
                    'desc' => 'Create, submit, review, and give feedback without the usual back-and-forth. Everything in one clear workflow.',
                    'color' => 'bg-violet-50 text-violet-600',
                    'delay' => '100ms',
                ],
                [
                    'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                    'title' => 'Real-time Progress',
                    'desc' => 'Clear learning signals help every student stay on track and every teacher stay informed — always up to date.',
                    'color' => 'bg-emerald-50 text-emerald-600',
                    'delay' => '200ms',
                ],
            ] as $card)
                <div class="group bg-gray-50 rounded-2xl p-7 flex flex-col gap-4
                             border border-transparent hover:border-indigo-100 hover:bg-white
                             hover:shadow-lg hover:shadow-indigo-50 hover:-translate-y-1.5
                             transition-all duration-300 reveal-on-scroll"
                     style="transition-delay: {{ $card['delay'] }}">

                    {{-- Icon --}}
                    <div class="w-11 h-11 rounded-xl {{ $card['color'] }} flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900">{{ $card['title'] }}</h3>
                    <p class="text-gray-500 leading-relaxed text-[15px]">{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/how-it-works.blade.php
========================================================================

{{-- resources/views/landing/partials/how-it-works.blade.php --}}
<section id="how-it-works" class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <div class="bg-gray-900 rounded-3xl px-8 py-16 lg:px-16">

            <h2 class="text-4xl lg:text-5xl font-bold text-white text-center leading-tight tracking-tight mb-14 reveal-on-scroll">
                A simple rhythm for better learning.
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['step'=>'01','title'=>'Teachers create courses','desc'=>'Build structured modules, add materials, and set deadlines with ease.','delay'=>'0ms'],
                    ['step'=>'02','title'=>'Students enroll','desc'=>'Join with a single click and instantly access all course materials.','delay'=>'100ms'],
                    ['step'=>'03','title'=>'Complete assignments','desc'=>'Submit work, track deadlines, and stay ahead of the learning schedule.','delay'=>'200ms'],
                    ['step'=>'04','title'=>'Receive grades & feedback','desc'=>'Get clear, timely feedback that helps students improve and grow.','delay'=>'300ms'],
                ] as $item)
                    <div class="flex flex-col gap-4 reveal-on-scroll" style="transition-delay:{{ $item['delay'] }}">
                        <span class="text-5xl font-extrabold text-indigo-400/30 leading-none select-none">
                            {{ $item['step'] }}
                        </span>
                        <div class="w-8 h-0.5 bg-indigo-500 rounded-full"></div>
                        <h3 class="text-lg font-bold text-white leading-snug">{{ $item['title'] }}</h3>
                        <p class="text-sm text-indigo-200/70 leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/features.blade.php
========================================================================

{{-- resources/views/landing/partials/features.blade.php --}}
<section id="features" class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 text-center leading-tight tracking-tight mb-4 reveal-on-scroll">
            One platform. Every learning moment.
        </h2>
        <p class="text-lg text-gray-500 text-center mb-14 reveal-on-scroll">
            Every tool a student or teacher needs — built-in, connected, and ready to use.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach([
                ['icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6','title'=>'Student Dashboard','desc'=>'See upcoming tasks, course progress, and personalized learning priorities at a glance.','delay'=>'0ms','accent'=>'indigo'],
                ['icon'=>'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z','title'=>'Teacher Dashboard','desc'=>'Keep course activity, student signals, and review work in a single clear view.','delay'=>'80ms','accent'=>'violet'],
                ['icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z','title'=>'Assignment Submission','desc'=>'A frictionless workflow for files, deadlines, submissions, and feedback.','delay'=>'160ms','accent'=>'blue'],
                ['icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z','title'=>'Grade Management','desc'=>'Make grading transparent, timely, and easy to understand for everyone.','delay'=>'240ms','accent'=>'amber'],
                ['icon'=>'M4 6h16M4 10h16M4 14h16M4 18h16','title'=>'Course Modules','desc'=>'Organize lessons into a learning path that feels achievable and well-structured.','delay'=>'320ms','accent'=>'emerald'],
                ['icon'=>'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9','title'=>'Announcements','desc'=>'Bring every important update to the people who need it — instantly.','delay'=>'400ms','accent'=>'rose'],
            ] as $feature)
                <div class="group bg-gray-50 hover:bg-white rounded-2xl p-7
                             border border-transparent hover:border-gray-200
                             hover:shadow-lg hover:-translate-y-1.5
                             transition-all duration-300 flex flex-col gap-4 reveal-on-scroll"
                     style="transition-delay:{{ $feature['delay'] }}">

                    <div class="w-10 h-10 rounded-xl bg-{{ $feature['accent'] }}-100 text-{{ $feature['accent'] }}-600
                                flex items-center justify-center flex-shrink-0
                                group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1.5">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/benefits.blade.php
========================================================================

{{-- resources/views/landing/partials/benefits.blade.php --}}
<section class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- For Students --}}
            <div class="bg-indigo-50 rounded-3xl p-10 flex flex-col gap-6
                         hover:shadow-xl hover:shadow-indigo-100 hover:-translate-y-1
                         transition-all duration-300 reveal-from-left">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>

                <div>
                    <h3 class="text-3xl font-extrabold text-indigo-900 mb-2">For Students</h3>
                    <p class="text-indigo-700/70 text-sm">Everything you need to stay on top of your learning.</p>
                </div>

                <ul class="flex flex-col gap-3">
                    @foreach(['Track learning progress','Submit assignments','Check grades instantly','Access course modules','Get teacher feedback','Stay organized daily'] as $item)
                        <li class="flex items-center gap-3 text-indigo-800 font-medium text-[15px]">
                            <div class="w-5 h-5 rounded-full bg-indigo-200 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>

                @guest
                <a href="{{ route('register') }}"
                   class="self-start mt-2 inline-flex items-center gap-2 px-5 py-2.5
                          bg-indigo-600 text-white font-semibold rounded-xl text-sm
                          hover:bg-indigo-700 transition-colors">
                    Join as Student
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                @endguest
            </div>

            {{-- For Teachers --}}
            <div class="bg-gray-900 rounded-3xl p-10 flex flex-col gap-6
                         hover:shadow-xl hover:shadow-gray-900/20 hover:-translate-y-1
                         transition-all duration-300 reveal-from-right">
                <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>

                <div>
                    <h3 class="text-3xl font-extrabold text-white mb-2">For Teachers</h3>
                    <p class="text-indigo-200/60 text-sm">Powerful tools to manage, monitor, and inspire.</p>
                </div>

                <ul class="flex flex-col gap-3">
                    @foreach(['Create & manage courses','Monitor student progress','Grade assignments efficiently','Post announcements','Build course modules','Provide detailed feedback'] as $item)
                        <li class="flex items-center gap-3 text-indigo-100 font-medium text-[15px]">
                            <div class="w-5 h-5 rounded-full bg-indigo-500/30 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>

                @guest
                <a href="{{ route('register') }}"
                   class="self-start mt-2 inline-flex items-center gap-2 px-5 py-2.5
                          bg-indigo-500 text-white font-semibold rounded-xl text-sm
                          hover:bg-indigo-400 transition-colors">
                    Join as Teacher
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                @endguest
            </div>

        </div>
    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/statistics.blade.php
========================================================================

{{-- resources/views/landing/partials/statistics.blade.php --}}
<section class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">
        <div class="bg-indigo-600 rounded-3xl px-8 py-14 lg:px-16">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4">
                @foreach([
                    ['value'=>'500+','label'=>'Students','delay'=>'0ms'],
                    ['value'=>'30+','label'=>'Teachers','delay'=>'120ms'],
                    ['value'=>'100+','label'=>'Courses','delay'=>'240ms'],
                    ['value'=>'5000+','label'=>'Assignments Submitted','delay'=>'360ms'],
                ] as $stat)
                    <div class="text-center reveal-scale" style="transition-delay:{{ $stat['delay'] }}">
                        <p class="text-4xl lg:text-5xl font-extrabold text-white
                                   tabular-nums tracking-tight">
                            {{ $stat['value'] }}
                        </p>
                        <p class="text-indigo-200 text-sm font-medium mt-1">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/testimonials.blade.php
========================================================================

{{-- resources/views/landing/partials/testimonials.blade.php --}}
<section class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 text-center leading-tight tracking-tight mb-14 reveal-on-scroll">
            Loved by the people<br>who learn and teach.
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                [
                    'quote' => 'Skola makes it easy to see what's due and what I've already mastered. I finally feel in control of my learning.',
                    'name'  => 'Maya Chen',
                    'role'  => 'Student, Year 3',
                    'avatar'=> 'MC',
                    'color' => 'bg-indigo-100 text-indigo-700',
                    'delay' => '0ms',
                ],
                [
                    'quote' => 'My course administration is lighter and my feedback reaches students sooner. The grading workflow alone saves me hours every week.',
                    'name'  => 'Daniel Soto',
                    'role'  => 'Teacher, Science',
                    'avatar'=> 'DS',
                    'color' => 'bg-violet-100 text-violet-700',
                    'delay' => '120ms',
                ],
                [
                    'quote' => 'The progress view keeps our entire class moving forward with confidence. It's the clearest learning platform I've ever used.',
                    'name'  => 'Aisha Rahman',
                    'role'  => 'Student, Year 2',
                    'avatar'=> 'AR',
                    'color' => 'bg-emerald-100 text-emerald-700',
                    'delay' => '240ms',
                ],
            ] as $t)
                <div class="bg-gray-50 hover:bg-white rounded-2xl p-7
                             border border-transparent hover:border-gray-200
                             hover:shadow-lg hover:-translate-y-1.5
                             transition-all duration-300 flex flex-col gap-5 reveal-on-scroll"
                     style="transition-delay:{{ $t['delay'] }}">

                    {{-- Stars --}}
                    <div class="flex gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        @endfor
                    </div>

                    <p class="text-gray-600 leading-relaxed text-[15px] flex-1">
                        &ldquo;{{ $t['quote'] }}&rdquo;
                    </p>

                    <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                        <div class="w-9 h-9 rounded-full {{ $t['color'] }}
                                    flex items-center justify-center text-xs font-bold flex-shrink-0">
                            {{ $t['avatar'] }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">{{ $t['name'] }}</p>
                            <p class="text-xs text-gray-400">{{ $t['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/faq.blade.php
========================================================================

{{-- resources/views/landing/partials/faq.blade.php --}}
<section id="faq" class="py-20 lg:py-28">
    <div class="max-w-3xl mx-auto px-6 lg:px-8">

        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 text-center leading-tight tracking-tight mb-14 reveal-on-scroll">
            Questions, answered.
        </h2>

        <div class="flex flex-col gap-3" x-data="{ open: null }">
            @foreach([
                [
                    'q' => 'How do I register?',
                    'a' => 'Click the "Get Started" button on the top of this page. Fill in your name, email, and password, then choose whether you are joining as a student or a teacher. That's it — your account is ready immediately.',
                ],
                [
                    'q' => 'Can teachers upload assignments?',
                    'a' => 'Yes. Teachers can create assignments inside any course module, set a due date, attach files or instructions, and publish them instantly. Students are notified as soon as an assignment goes live.',
                ],
                [
                    'q' => 'Can students submit files?',
                    'a' => 'Absolutely. Students can upload files in common formats (PDF, DOCX, images, ZIP) directly from the assignment page. Each submission is timestamped and stored securely.',
                ],
                [
                    'q' => 'How are grades calculated?',
                    'a' => 'Teachers enter grades manually for each submission and can leave written feedback. Skola then aggregates scores per course so both students and teachers can see overall progress at a glance.',
                ],
                [
                    'q' => 'Is Skola mobile friendly?',
                    'a' => 'Yes — the entire platform is fully responsive and works on phones, tablets, and desktops without needing to install any app.',
                ],
            ] as $index => $item)
                <div class="rounded-2xl border border-gray-200 overflow-hidden reveal-on-scroll"
                     style="transition-delay:{{ $index * 80 }}ms"
                     x-data="{ open: false }">

                    <button @click="open = !open"
                            class="w-full flex items-center justify-between gap-4
                                   px-6 py-5 text-left
                                   hover:bg-gray-50 transition-colors">
                        <span class="text-base font-semibold text-gray-900">{{ $item['q'] }}</span>
                        <span class="flex-shrink-0 w-7 h-7 rounded-full bg-gray-100
                                     flex items-center justify-center transition-transform duration-300"
                              :class="open ? 'rotate-45 bg-indigo-100' : ''">
                            <svg class="w-4 h-4 text-gray-600 transition-colors"
                                 :class="open ? 'text-indigo-600' : ''"
                                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-1"
                         class="px-6 pb-5 text-gray-500 text-[15px] leading-relaxed border-t border-gray-100">
                        <div class="pt-4">{{ $item['a'] }}</div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/cta.blade.php
========================================================================

{{-- resources/views/landing/partials/cta.blade.php --}}
<section class="py-20 lg:py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-8">

        <div class="relative bg-gradient-to-br from-indigo-700 via-indigo-600 to-violet-600
                    rounded-3xl px-8 py-20 lg:px-16 text-center overflow-hidden reveal-scale">

            {{-- Background decoration --}}
            <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-violet-400/10 rounded-full blur-3xl"></div>
            </div>

            <div class="relative">
                <p class="text-indigo-200 text-sm font-bold tracking-widest uppercase mb-4">
                    Get started today
                </p>

                <h2 class="text-4xl lg:text-6xl font-extrabold text-white
                            leading-tight tracking-tight mb-6 reveal-on-scroll">
                    Start Learning<br>Smarter Today
                </h2>

                <p class="text-indigo-200 text-lg max-w-xl mx-auto mb-10 leading-relaxed reveal-on-scroll"
                   style="transition-delay:100ms">
                    Join thousands of students and teachers already using Skola
                    to make learning clearer, faster, and more rewarding.
                </p>

                <div class="flex flex-wrap justify-center gap-4 reveal-on-scroll"
                     style="transition-delay:200ms">
                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 px-8 py-4
                                  bg-white text-indigo-700 font-bold rounded-xl text-base
                                  hover:bg-indigo-50 transition-all hover:-translate-y-0.5
                                  hover:shadow-xl hover:shadow-indigo-900/20 active:scale-95">
                            Register Free
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center gap-2 px-8 py-4
                                  bg-indigo-800/60 text-white font-bold rounded-xl text-base
                                  border border-white/20 hover:bg-indigo-800 transition-all
                                  hover:-translate-y-0.5 active:scale-95">
                            Login
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex items-center gap-2 px-8 py-4
                                  bg-white text-indigo-700 font-bold rounded-xl text-base
                                  hover:bg-indigo-50 transition-all hover:-translate-y-0.5
                                  hover:shadow-xl hover:shadow-indigo-900/20 active:scale-95">
                            Go to Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

    </div>
</section>


========================================================================
FILE: resources/views/landing/partials/footer.blade.php
========================================================================

{{-- resources/views/landing/partials/footer.blade.php --}}
<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 py-16">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">

            {{-- Brand --}}
            <div class="md:col-span-2 flex flex-col gap-4">
                <a href="/" class="flex items-center gap-2 font-bold text-xl text-white w-fit">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    Skola
                </a>
                <p class="text-sm leading-relaxed max-w-xs text-gray-500">
                    A modern learning management system for teachers and students.
                    Built to make education clearer, faster, and more connected.
                </p>
                <div class="flex gap-3 mt-2">
                    {{-- GitHub --}}
                    <a href="https://github.com" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-xl bg-gray-800 hover:bg-gray-700 transition-colors
                              flex items-center justify-center group">
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors"
                             fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Features --}}
            <div class="flex flex-col gap-4">
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Features</h4>
                <ul class="flex flex-col gap-2.5">
                    @foreach(['Student Dashboard','Teacher Dashboard','Assignments','Grades','Course Modules','Announcements'] as $link)
                        <li>
                            <a href="#features"
                               class="text-sm text-gray-500 hover:text-white transition-colors">
                                {{ $link }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Company --}}
            <div class="flex flex-col gap-4">
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider">Company</h4>
                <ul class="flex flex-col gap-2.5">
                    @foreach([
                        ['label'=>'How It Works','href'=>'#how-it-works'],
                        ['label'=>'FAQ','href'=>'#faq'],
                        ['label'=>'Contact','href'=>'mailto:hello@skola.app'],
                        ['label'=>'GitHub','href'=>'https://github.com'],
                    ] as $link)
                        <li>
                            <a href="{{ $link['href'] }}"
                               class="text-sm text-gray-500 hover:text-white transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="pt-8 border-t border-gray-800 flex flex-col sm:flex-row items-center
                    justify-between gap-4">
            <p class="text-sm text-gray-600">
                &copy; {{ date('Y') }} Skola. All rights reserved.
            </p>
            <div class="flex gap-6">
                <a href="#" class="text-xs text-gray-600 hover:text-gray-400 transition-colors">Privacy Policy</a>
                <a href="#" class="text-xs text-gray-600 hover:text-gray-400 transition-colors">Terms of Service</a>
            </div>
        </div>

    </div>
</footer>


========================================================================
FILE: resources/views/landing/partials/scripts.blade.php
========================================================================

{{-- resources/views/landing/partials/scripts.blade.php --}}

{{--
    Alpine.js — untuk FAQ accordion interaktif
    CDN digunakan untuk kemudahan. Untuk production, install via npm:
    npm install alpinejs
    lalu import di resources/js/app.js
--}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    // ─────────────────────────────────────────────
    // 1. Navbar: mobile toggle
    // ─────────────────────────────────────────────
    const navToggle = document.getElementById('nav-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (navToggle && mobileMenu) {
        navToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Close mobile menu when a nav link is clicked
    mobileMenu?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    });

    // ─────────────────────────────────────────────
    // 2. Navbar: shrink on scroll
    // ─────────────────────────────────────────────
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header?.classList.add('shadow-sm');
        } else {
            header?.classList.remove('shadow-sm');
        }
    }, { passive: true });

    // ─────────────────────────────────────────────
    // 3. Smooth scroll for anchor links
    // ─────────────────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ─────────────────────────────────────────────
    // 4. Scroll reveal animations (IntersectionObserver)
    //    Classes used in blade templates:
    //    .reveal-on-scroll  → fade + slide up
    //    .reveal-from-left  → fade + slide from left
    //    .reveal-from-right → fade + slide from right
    //    .reveal-scale      → fade + scale up
    // ─────────────────────────────────────────────
    function initScrollReveal() {
        const CLASSES = [
            '.reveal-on-scroll',
            '.reveal-from-left',
            '.reveal-from-right',
            '.reveal-scale',
        ];

        const elements = document.querySelectorAll(CLASSES.join(','));

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Unobserve after animating (play-once)
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px',
        });

        elements.forEach(el => observer.observe(el));
    }

    // ─────────────────────────────────────────────
    // 5. Hero: run mount animations immediately
    //    (elements with .animate-fade-up already
    //     animate via CSS on load — no JS needed)
    // ─────────────────────────────────────────────

    // Init on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollReveal);
    } else {
        initScrollReveal();
    }
</script>


========================================================================
FILE: resources/css/landing.css
========================================================================

/* resources/css/landing.css
   Import file ini di resources/css/app.css:
   @import './landing.css';
*/

/* ─────────────────────────────────────────────────────
   BASE FONT
───────────────────────────────────────────────────── */
.font-inter { font-family: 'Inter', sans-serif; }

/* ─────────────────────────────────────────────────────
   HERO — onMount animations (dijalankan langsung saat
   halaman dimuat, tidak butuh scroll)
   Gunakan class: animate-fade-up
   Tambahkan style="animation-delay: Xs;" per elemen
───────────────────────────────────────────────────── */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(28px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-up {
    opacity: 0;
    animation: fadeUp 0.55s cubic-bezier(0.44, 0, 0.56, 1) forwards;
}

/* ─────────────────────────────────────────────────────
   FLOATING CARD — gentle bob loop
───────────────────────────────────────────────────── */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50%       { transform: translateY(-8px); }
}

.animate-float {
    animation: float 3.6s ease-in-out infinite;
}

/* ─────────────────────────────────────────────────────
   SCROLL REVEAL — initial hidden states
   JS menambahkan class .is-visible untuk men-trigger
───────────────────────────────────────────────────── */

/* Fade + slide up */
.reveal-on-scroll {
    opacity: 0;
    transform: translateY(32px);
    transition:
        opacity  0.55s cubic-bezier(0.44, 0, 0.56, 1),
        transform 0.55s cubic-bezier(0.44, 0, 0.56, 1);
}
.reveal-on-scroll.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Slide dari kiri */
.reveal-from-left {
    opacity: 0;
    transform: translateX(-40px);
    transition:
        opacity  0.55s cubic-bezier(0.44, 0, 0.56, 1),
        transform 0.55s cubic-bezier(0.44, 0, 0.56, 1);
}
.reveal-from-left.is-visible {
    opacity: 1;
    transform: translateX(0);
}

/* Slide dari kanan */
.reveal-from-right {
    opacity: 0;
    transform: translateX(40px);
    transition:
        opacity  0.55s cubic-bezier(0.44, 0, 0.56, 1),
        transform 0.55s cubic-bezier(0.44, 0, 0.56, 1);
}
.reveal-from-right.is-visible {
    opacity: 1;
    transform: translateX(0);
}

/* Fade + scale up (untuk stats & CTA card) */
.reveal-scale {
    opacity: 0;
    transform: scale(0.92);
    transition:
        opacity  0.55s cubic-bezier(0.34, 1.56, 0.64, 1),
        transform 0.55s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.reveal-scale.is-visible {
    opacity: 1;
    transform: scale(1);
}

/* ─────────────────────────────────────────────────────
   RESPECT prefers-reduced-motion
───────────────────────────────────────────────────── */
@media (prefers-reduced-motion: reduce) {
    .animate-fade-up,
    .animate-float,
    .reveal-on-scroll,
    .reveal-from-left,
    .reveal-from-right,
    .reveal-scale {
        animation: none !important;
        transition: none !important;
        opacity: 1 !important;
        transform: none !important;
    }
}


========================================================================
FILE: tailwind.config.js
========================================================================

/** tailwind.config.js */
import defaultTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    safelist: [
        // Dynamic Tailwind classes used in blade foreach loops
        'bg-indigo-100', 'text-indigo-600',
        'bg-violet-100', 'text-violet-600',
        'bg-blue-100',   'text-blue-600',
        'bg-amber-100',  'text-amber-600',
        'bg-emerald-100','text-emerald-600',
        'bg-rose-100',   'text-rose-600',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans:  ['Inter', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                indigo: {
                    50:  '#EEF2FF',
                    100: '#E0E7FF',
                    200: '#C7D2FE',
                    300: '#A5B4FC',
                    400: '#818CF8',
                    500: '#6366F1',
                    600: '#4F46E5',
                    700: '#4338CA',
                    800: '#3730A3',
                    900: '#312E81',
                },
            },
            borderRadius: {
                '2xl': '1rem',
                '3xl': '1.5rem',
            },
            boxShadow: {
                'indigo-sm': '0 2px 8px 0 rgba(79, 70, 229, 0.12)',
                'indigo-lg': '0 20px 40px 0 rgba(79, 70, 229, 0.18)',
            },
            transitionTimingFunction: {
                'bounce-in': 'cubic-bezier(0.34, 1.56, 0.64, 1)',
                'smooth':    'cubic-bezier(0.44, 0, 0.56, 1)',
            },
        },
    },
    plugins: [],
}

