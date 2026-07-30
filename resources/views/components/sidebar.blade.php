<aside class="w-64 min-h-screen bg-white border-r shadow-sm flex flex-col justify-between">

    <div>

        {{-- Logo --}}
        <div class="p-6 border-b">
            <img src="{{ asset('images/logo.png') }}" alt="Skola Logo" class="h-10 w-auto">

            <p class="text-sm text-gray-500 mt-1">
                Learning Management System
            </p>
        </div>

        {{-- Menu --}}
        <nav class="mt-6 px-4 space-y-2">

            @if(auth()->user()->role === 'student')

                <a href="{{ route('student.dashboard') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Dashboard
                </a>

                <a href="{{ route('student.courses') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.courses') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Courses
                </a>

                <a href="{{ route('student.assignments') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.assignments') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Assignments
                </a>

                <a href="{{ route('student.grades') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.grades') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Grades
                </a>

                <a href="{{ route('student.calendar') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.calendar') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Calendar
                </a>

                <a href="{{ route('student.notifications') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.notifications') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Notifications
                </a>

                <a href="{{ route('student.profile') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('student.profile') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Profile
                </a>

            @else

                <a href="{{ route('teacher.dashboard') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Dashboard
                </a>

                <a href="{{ route('teacher.courses') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.courses') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Courses
                </a>

                <a href="{{ route('teacher.modules') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.modules') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Modules
                </a>

                <a href="{{ route('teacher.assignments') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.assignments') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Assignments
                </a>

                <a href="{{ route('teacher.students') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.students') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Students
                </a>

                <a href="{{ route('teacher.grades') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.grades') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Grades
                </a>

                <a href="{{ route('teacher.announcements') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.announcements') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Announcements
                </a>

                <a href="{{ route('teacher.profile') }}"
                   class="block px-4 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('teacher.profile') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-700 hover:bg-indigo-50 hover:text-indigo-600' }}">
                    Profile
                </a>

            @endif

        </nav>

    </div>

</aside>
