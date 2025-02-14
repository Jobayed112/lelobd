<!-- Top Header -->
<div class="bg-gray-800 text-white overflow-hidden">
    <div class="container mx-auto px-2">
        <div class="flex justify-between items-center py-1 px-4">
            <button id="mobile-menu-btn"
                class="md:hidden text-gray-800 hover:text-green-500 focus:outline-none bg-gray-400 p-1 rounded-md sm:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="text-lg font-bold">Lelobd</div>
            <div class="text-sm">
                <a href="mailto:info@company.com" class="hover:text-green-400">info@lelobd.com</a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4 px-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('images/lelo.jpg') }}" class="h-12" alt="Lelobd Logo">
        </a>
        {{-- desktop nav --}}
        <nav class="hidden md:flex space-x-6 text-gray-700">
            <a href="{{ url('/') }}" class="hover:text-green-500">Home</a>
            <ul class="relative group">
                <li class="relative">
                    <button class="hover:text-green-500 flex items-center">Categories <i
                            class="fa fa-chevron-down ml-1"></i></button>
                    <ul class="hidden group-hover:block bg-white shadow-md rounded mt-2 w-48 absolute">
                        @foreach ($categories as $category)
                            <li class="relative group">
                                <a href="#"
                                    class="flex items-center px-4 py-2 hover:bg-gray-200">{{ $category->name }} <i
                                        class="fa fa-chevron-right ml-auto"></i></a>
                                <ul
                                    class="hidden group-hover:block bg-white shadow-md rounded absolute left-full top-0 w-48">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li><a href="{{ url('subcategory/' . $subcategory->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-200">{{ $subcategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Search Bar for Desktop -->
        <div class="search-box">
            <button class="btn-search"><i class="fa fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Search...">
        </div>

        <!-- Icons & Mobile Menu Button -->
        <div class="flex items-center space-x-4">
            <div>
                <!-- Cart Icon -->
                <button id="cart-btn" class="relative text-gray-600 hover:text-green-500 focus:outline-none">
                    {{-- use fa icon --}}
                    <i class="fa fa-shopping-cart h-6 w-6"></i>
                    <span class="absolute -top-1 -right-2 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                </button>

                @include('components.home.cart-items') </div>
            </div>
            <!-- Profile Icon -->
            <div>
                <button id="profile-btn" class="text-gray-600 hover:text-green-500">
                    <span class="sr-only">user menu</span>
                    <img src="{{ asset('images/user.webp') }}" class="w-6 h-6" alt="">
                </button>
                <div id="profile-menu" class="absolute right-0 mt-4 w-48 bg-gray-100 shadow-lg m-2 rounded-md hidden">
                    <a href="{{ url('user-profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My
                        Profile</a>

                    <a href="{{ url('login-page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                    <a href="{{ url('logout') }} " class="block px-4 py-2 text-gray-700 hover:bg-gray-100">LogOut</a>
                </div>

            </div>
        </div>
    </div>
</header>
