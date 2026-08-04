<header class="mx-auto flex w-full max-w-[1200px] items-center justify-between px-5 py-5 sm:px-10 lg:px-16">
    <a href="{{ url('/') }}" class="flex items-center gap-2 text-xl font-extrabold tracking-[-0.04em] text-slate-900" aria-label="Skola home"><span class="grid size-5 place-items-center rounded-full bg-orange-400 text-xs text-white">✦</span>Skola</a>
    <nav class="hidden rounded-full border border-slate-100 bg-white px-6 py-3 shadow-sm md:block" aria-label="Primary navigation">
        <div class="flex items-center gap-7 text-base font-medium text-slate-800">
            <a href="#features">Features</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </nav>
    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-full bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white">
        <span class="grid size-8 place-items-center rounded-full bg-orange-400 text-lg">→</span>
        <span class="hidden sm:inline">Enroll</span>
    </a>
</header>
