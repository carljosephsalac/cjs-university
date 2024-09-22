<div id="drawer-navigation"
    class="fixed top-0 left-0 z-40 w-64 sm:w-72 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-navigation-label">
    <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
    </h5>
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('students.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    {{ request()->routeIs('students.index') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->routeIs('students.index') ? 'text-gray-900 dark:text-white' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">All Students</span>
                </a>
            </li>

            <li>
                <x-sidebar-dropdown-item toggle="bsit" label="BSIT">
                    <x-icon-bsit />
                </x-sidebar-dropdown-item>
                <ul id="bsit"
                    class="py-2 space-y-2 {{ request()->is(['BSIT/all', 'BSIT/1', 'BSIT/2', 'BSIT/3', 'BSIT/4']) ? '' : 'hidden' }}">
                    <x-sidebar-item course="BSIT" year="all">
                        BSIT (All)
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIT" year="1">
                        BSIT 1
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIT" year="2">
                        BSIT 2
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIT" year="3">
                        BSIT 3
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIT" year="4">
                        BSIT 4
                    </x-sidebar-item>
                </ul>
            </li>

            <li>
                <x-sidebar-dropdown-item toggle="bscs" label="BSCS">
                    <x-icon-bscs />
                </x-sidebar-dropdown-item>
                <ul id="bscs"
                    class="py-2 space-y-2 {{ request()->is(['BSCS/all', 'BSCS/1', 'BSCS/2', 'BSCS/3', 'BSCS/4']) ? '' : 'hidden' }}">
                    <x-sidebar-item course="BSCS" year="all">
                        BSCS (All)
                    </x-sidebar-item>
                    <x-sidebar-item course="BSCS" year="1">
                        BSCS 1
                    </x-sidebar-item>
                    <x-sidebar-item course="BSCS" year="2">
                        BSCS 2
                    </x-sidebar-item>
                    <x-sidebar-item course="BSCS" year="3">
                        BSCS 3
                    </x-sidebar-item>
                    <x-sidebar-item course="BSCS" year="4">
                        BSCS 4
                    </x-sidebar-item>
                </ul>
            </li>

            <li>
                <x-sidebar-dropdown-item toggle="bsis" label="BSIS">
                    <x-icon-bsis />
                </x-sidebar-dropdown-item>
                <ul id="bsis"
                    class="py-2 space-y-2 {{ request()->is(['BSIS/all', 'BSIS/1', 'BSIS/2', 'BSIS/3', 'BSIS/4']) ? '' : 'hidden' }}">
                    <x-sidebar-item course="BSIS" year="all">
                        BSIS (All)
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIS" year="1">
                        BSIS 1
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIS" year="2">
                        BSIS 2
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIS" year="3">
                        BSIS 3
                    </x-sidebar-item>
                    <x-sidebar-item course="BSIS" year="4">
                        BSIS 4
                    </x-sidebar-item>
                </ul>
            </li>

            <li>
                <x-sidebar-dropdown-item toggle="compe" label="CompE">
                    <x-icon-compe />
                </x-sidebar-dropdown-item>
                <ul id="compe"
                    class="py-2 space-y-2 {{ request()->is(['CompE/all', 'CompE/1', 'CompE/2', 'CompE/3', 'CompE/4']) ? '' : 'hidden' }}">
                    <x-sidebar-item course="CompE" year="all">
                        CompE (All)
                    </x-sidebar-item>
                    <x-sidebar-item course="CompE" year="1">
                        CompE 1
                    </x-sidebar-item>
                    <x-sidebar-item course="CompE" year="2">
                        CompE 2
                    </x-sidebar-item>
                    <x-sidebar-item course="CompE" year="3">
                        CompE 3
                    </x-sidebar-item>
                    <x-sidebar-item course="CompE" year="4">
                        CompE 4
                    </x-sidebar-item>
                </ul>
            </li>
        </ul>
    </div>
</div>
