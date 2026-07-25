<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold">
            Student Dashboard
        </h1>

        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
</x-app-layout>