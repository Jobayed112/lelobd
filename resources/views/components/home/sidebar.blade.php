<aside id="mobile-nav"
    class="fixed inset-0 top-0 left-0 w-52 h-full bg-gray-800 text-white transition-transform duration-300 transform md:-translate-x-full sm:translate-x-0 hidden"
    aria-label="Sidebar">

    <!-- Header -->
    <div class="flex justify-between items-center py-3 px-4">
        <a href="{{ url('/') }}">
            <h1 class="text-lg font-bold hover:text-green-500">Menu</h1>
        </a>
        <button onclick="mobile_nav_close()" class="text-white text-3xl hover:bg-red-700 hover:text-red-500 rounded">
            <!-- Close Icon -->
            <i class="fa fa-times"></i>
        </button>
    </div>

    <!-- Sidebar Content -->
    <div class="h-full px-4 py-2 overflow-y-auto bg-gray-100 dark:bg-gray-800">
        <ul class="space-y-3 font-medium">
            <!-- Product Dropdown -->

            <li>
                <button aria-controls="product-dropdown" data-collapse-toggle="product-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 p-2 border rounded-lg">
                    <span>Categories</span>
                </button>
                <ul id="product-dropdown" class="hidden space-y-2 pl-6">
                    @foreach ($categories as $category )


                    <li>
                        <a href="{{ url('female-product '.$category->id) }}"
                            class="flex items-center text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 p-2 rounded-lg">
                            {{$category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <!-- Offer -->
            <li>
                <button aria-controls="Female-dropdown" data-collapse-toggle="Female-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 p-2 border rounded-lg">
                    Female
                </button>
                <ul id="Female-dropdown" class="hidden space-y-2 pl-6">
                    <li>
                        <a href="{{ url('Female-show') }}"
                            class="flex items-center text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 p-2 rounded-lg">
                            Ornaments
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 p-2 rounded-lg">
                            Jewelry
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
