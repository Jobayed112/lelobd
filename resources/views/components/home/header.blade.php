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

            <a href="{{ url('/') }}"
                class="flex items-center hover:text-green-500 px-2 py-2  hover:bg-blue-100 rounded-lg ">home
            </a>
            @foreach ($categories as $category)
                <ul class="relative group">
                    <li class="flex items-center hover:bg-blue-100 rounded-lg hover:text-green-500">
                        <a href="{{ route('category.products', ['id' => $category->id]) }}" class="px-2 py-2">
                            {{ $category->name }}
                        </a>
                    </li>
                    <!-- Subcategories Dropdown -->
                    <ul
                        class="absolute left-0 hidden group-hover:block bg-gray-100 shadow-md rounded mt-1 w-44 p-3 z-20">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="px-2 py-1 hover:bg-blue-100 hover:text-green-500 border-b">
                                <a href="{{ url('subcategory/' . $subcategory->id) }}"
                                    class="block">{{ $subcategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </ul>
            @endforeach
        </nav>
        <!-- Search Bar for Desktop -->
        <div class="search-box">
            <button class="btn-search"><i class="fa fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Search...">
        </div>

        <!-- Icons & Mobile Menu Button -->
        <div class="flex items-center space-x-4">
           <a href="{{ route('cart.show') }}">
                <!-- Cart Icon -->
                <div id="cart-btn" class="relative text-gray-600 hover:text-green-500 focus:outline-none">
                    {{-- Use fa icon --}}
                    <i class="fa fa-shopping-cart font-bold h-8 w-6"></i>
                    @if(count($cartItems) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1 font-bold">
                            {{ count($cartItems) }}
                        </span>
                    @endif
                    </div>
            </a>
        </div>
        <!-- Profile Icon -->
        <div>
            <button id="profile-btn" class="text-gray-600  hover:text-green-500">
                <span class="sr-only">user menu</span>
                <img src="{{ asset('images/user.webp') }}" class="w-6 h-6" alt="">
            </button>

            <div id="profile-menu" class="absolute right-3 mt-6 z-20 w-48 bg-gray-100 shadow-lg m-2 rounded-md hidden">
                <a href="{{ route('profile') }}"
                    class="block px-2 py-1 text-gray-700 hover:bg-blue-100 hover:text-green-500 border-b rounded-md">My
                    Profile</a>

                <a href="{{ route('login.form') }}"
                    class="block px-2 py-1 text-gray-700 hover:bg-blue-100 hover:text-green-500 border-b">Login</a>
                <a href="{{ url('logout') }} "
                    class="block px-2 py-1 text-gray-700 hover:bg-blue-100 hover:text-green-500 rounded-md ">LogOut</a>
            </div>

        </div>
    </div>
    </div>
</header>
{{-- sidebar --}}
<aside id="mobile-nav"
    class="fixed inset-0 z-50 top-0 left-0 w-64 h-full transition-transform duration-300 transform md:-translate-x-full sm:translate-x-0 hidden bg-gray-800 text-black border-r-2 border-gray-700"
    aria-label="Sidebar">

    <!-- Header -->
    <div class="flex justify-between items-center py-1 px-3 bg-gray-800 border-b-2 border-gray-700">
        <a href="{{ url('/') }}">
            <h1 class="text-xl font-bold text-white hover:text-green-400">Menu</h1>
        </a>
        <button onclick="mobile_nav_close()"
            class="text-white text-2xl rounded-lg hover:bg-red-700 hover:text-white p-2">
            <i class="fa fa-times justify-end"></i>
        </button>
    </div>

    <!-- Sidebar Content -->
    <div class="h-full px-2 py-2  overflow-y-auto bg-gray-100">
        <ul class="space-y-4 font-medium text-base">
            @foreach ($categories as $category)
                <li class="border-b border-gray-400 ">
                    <button aria-controls="category-{{ $category->id }}-subcategories"
                        data-collapse-toggle="category-{{ $category->id }}-subcategories"
                        class="flex justify-between items-center w-full py-2  px-3 rounded-lg text-black hover:bg-blue-100 hover:text-green-500  transition duration-200">
                        <span>{{ $category->name }}</span>
                        <i class="fa fa-chevron-down ml-2"></i>
                    </button>
                    <ul id="category-{{ $category->id }}-subcategories"
                        class="hidden space-y-2 px-4 bg-gray-200 ml-8  mt-1 ">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="border-b border-gray-300 pb-1 mb-2">
                                <a href="{{ url('subcategory/' . $subcategory->id) }}"
                                    class="flex items-center pl-2 px-1 rounded-lg text-black hover:bg-blue-100 hover:text-green-500 transition duration-200">
                                    <span>{{ $subcategory->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach

            <!-- Offer Section -->
            <li class="border-b border-gray-400 pb-2">
                <button aria-controls="Female-dropdown" data-collapse-toggle="Female-dropdown" type="button"
                    class="flex items-center w-full py-2 px-3 rounded-lg text-black hover:bg-green-600 hover:text-white transition duration-200">
                    <span>Female</span>
                </button>
                <ul id="Female-dropdown" class="hidden space-y-2 px-4 bg-gray-100">
                    <li class="border-b border-gray-300 pb-1">
                        <a href="{{ url('Female-show') }}"
                            class="flex items-center py-2 px-3 rounded-lg text-black hover:bg-green-600 hover:text-white transition duration-200">
                            <span>Ornaments</span>
                        </a>
                    </li>
                    <li class="border-b border-gray-300 pb-1">
                        <a href="#"
                            class="flex items-center py-2 px-3 rounded-lg text-black hover:bg-green-600 hover:text-white transition duration-200">
                            <span>Jewelry</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
