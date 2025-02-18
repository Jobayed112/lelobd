<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button onclick="toggleSidebar()" type="button"
                    class="md:hidden text-gray-800 hover:text-green-500 focus:outline-none bg-gray-200 text-lg p-1 mx-auto rounded-md sm:hidden">
                    <span class="h-3 w-5"><i class="fa fa-bars h-5 w-5"></i></span>
                </button>
                <a href="/admin-dashboard" class="flex ms-2 md:me-24">
                    <img src="{{ asset('images/lelo.jpg') }}" class="h-8 me-3" alt="lelod" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Lelobd</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm w-7 h-7  rounded-full focus:ring-4 focus:ring-blue-300 dark:focus:ring-green-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">user menu</span>
                            <img src="{{ asset('images/user.webp') }}" class=" w-7 h-7" alt="">
                        </button>
                    </div>
                    {{-- profile menu --}}
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700"
                        id="dropdown-user">
                        <div class="px-4 py-3 shadow flex flex-col items-center">
                            <img src="{{ asset('images/user.webp') }}" class="w-7 h-7" alt="profile">
                            @if (Auth::check())
                                <p class="text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            @else
                                <p class="text-sm text-gray-900 dark:text-white">Guest</p>
                            @endif
                        </div>
                        <ul class="py-1 flex flex-col">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Earnings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                    {{-- end profile menu --}}

                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<x-admin.home.sidebar />
