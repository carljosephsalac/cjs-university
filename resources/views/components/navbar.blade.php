<nav class="bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between max-w-screen-2xl p-4 mx-auto">
        <div class="flex gap-6">
            <button
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-400 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white  dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <a href="{{ route('students.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img class="rounded-full size-8" src="{{ asset('student-management-logo.png') }}" alt="logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    {{-- <h1 class="sm:hidden">SGMS</h1> --}}
                    <h1 class="hidden sm:block">Student Grade Management System</h1>
                </span>
            </a>
        </div>

        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">

                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">

                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                @csrf
                                <button class="w-full" type="submit">Sign out</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
