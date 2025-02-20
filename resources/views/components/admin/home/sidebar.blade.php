<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full md:translate-x-0 bg-gray-100 border-r border-gray-200 dark:bg-gray-700 dark:border-gray-600 shadow-lg">
    <div class="h-full px-2 pb-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- category --}}
            <li>
                <button aria-controls="Category-dropdown" data-collapse-toggle="Category-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Category</span>
                </button>
                <ul id="Category-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('category-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Category list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Category create</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Sub Category --}}
            <li>
                <button aria-controls="SubCategory-dropdown" data-collapse-toggle="SubCategory-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Sub Category</span>
                </button>
                <ul id="SubCategory-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('subcategory-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Sub Category list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('subcategory-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Sub Category create</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- product --}}
            <li>
                <button aria-controls="Product-dropdown" data-collapse-toggle="Product-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Product</span>
                </button>
                <ul id="Product-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('product-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Product list</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('product-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Product create</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('top-product-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Top Product List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('popular-product-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Popular Product List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('special-product-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Special Product List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('new-product-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>New Product List</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Offers --}}
            <li>
                <button aria-controls="Offer-dropdown" data-collapse-toggle="Offer-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Offer</span>
                </button>
                <ul id="Offer-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('offer.list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Offer list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('offer.create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Offer create</span>
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Orders --}}
            <li>
                <button aria-controls="Order-dropdown" data-collapse-toggle="Order-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Order</span>
                </button>
                <ul id="Order-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('order-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Order list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('order-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Order create</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- invoice --}}
            <li>
                <button aria-controls="Invoice-dropdown" data-collapse-toggle="Invoice-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>Invoice</span>
                </button>
                <ul id="Invoice-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('invoice-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Invoice list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('invoice-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>Invoice create</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- user --}}
            <li>
                <button aria-controls="User-dropdown" data-collapse-toggle="User-dropdown" type="button"
                    class="flex items-center w-full text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600 group p-2 border hover:ring mt-1">
                    <span>User</span>
                </button>
                <ul id="User-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ url('user-list') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>User list</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('user-create') }}"
                            class="border m-1 hover:ring flex items-center ml-8 p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-600">
                            <span>User create</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>
