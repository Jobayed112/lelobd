<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700"
    id="dropdown-user">
    <div class="px-4 py-3 shadow  flex flex-col items-center">
        <img src="{{ asset('images/user.webp') }}" class=" w-7 h-7" alt="profile">
        <p class="text-sm text-gray-900 dark:text-white">{{Auth::user()->name }}</p>
        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
            {{Auth::user()->email }}
        </p>
    </div>
    <ul class="py-1 flex flex-col">
        <li>
            <a href="{{ route('admin-dashboard') }}"
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
