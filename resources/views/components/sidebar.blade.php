<aside class="w-64 min-h-screen bg-white border-r shadow-sm flex flex-col justify-between">

    <div>

        {{-- Logo --}}
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-indigo-600">
                Skola
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Learning Management System
            </p>
        </div>

        {{-- Menu --}}
        <nav class="mt-6 px-4 space-y-2">

            @if(auth()->user()->role === 'student')

                <a href="{{ route('student.dashboard') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Dashboard
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Courses
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Assignments
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Grades
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Announcements
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Profile
                </a>

            @else

                <a href="{{ route('teacher.dashboard') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Dashboard
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Courses
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Modules
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Assignments
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Submissions
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Grades
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Students
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Announcements
                </a>

                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600">
                    Profile
</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button
        type="submit"
        class="block w-full text-left px-4 py-2 rounded-lg hover:bg-red-50 text-red-600">
        Logout
    </button>
</form>
@endif
</nav>

    </div>

</aside>