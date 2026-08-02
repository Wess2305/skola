<header class="bg-white border-b border-slate-200">
    <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-10">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-indigo-600">Skola</p>
            <h2 class="mt-2 text-xl font-semibold text-slate-900">@yield('pageTitle', 'Dashboard')</h2>
        </div>
        <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
            <span class="hidden sm:inline">Your learning workspace</span>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-slate-600">{{ auth()->user()->role ?? 'Student' }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>