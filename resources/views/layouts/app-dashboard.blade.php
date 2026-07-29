<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skola</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">

            {{-- Topbar --}}
            @include('components.topbar')

            {{-- Content --}}
            <main class="flex-1 overflow-y-auto px-6 py-8 sm:px-8 lg:px-10">
                <div class="mx-auto w-full max-w-7xl">
                    @yield('content')
                </div>
            </main>

        </div>

    </div>

</body>
</html>