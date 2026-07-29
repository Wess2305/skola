<header class="bg-white border-b border-slate-200">
    <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-10">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-indigo-600">Skola</p>
            <h2 class="mt-2 text-xl font-semibold text-slate-900">@yield('pageTitle', 'Dashboard')</h2>
        </div>
        <div class="flex items-center gap-3 text-sm text-slate-500">
            <span class="hidden sm:inline">Your learning workspace</span>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-slate-600">{{ auth()->user()->role ?? 'Student' }}</span>
        </div>
    </div>
</header>