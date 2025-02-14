<div class="container mx-auto px-4">
    <div class="flex flex-wrap -mx-2">
        <!-- Product Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                <span id="product">{{ count($products) }}</span>
                            </h5>
                            <p class="text-sm text-gray-600">Product</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Category Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('category-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                <span id="category">{{ count($categories) }}</span>
                            </h5>
                            <p class="text-sm text-gray-600">Category</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Customer Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                <span id="customer"></span>
                            </h5>
                            <p class="text-sm text-gray-600">Customer</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Invoice Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                <span id="invoice"></span>
                            </h5>
                            <p class="text-sm text-gray-600">Invoice</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Sale Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                $ <span id="total"></span>
                            </h5>
                            <p class="text-sm text-gray-600">Total Sale</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('product-list') }}" class="block">
        </div>

        <!-- Vat Collection Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                $ <span id="vat"></span>
                            </h5>
                            <p class="text-sm text-gray-600">Vat Collection</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Collection Card -->
        <div class="w-full sm:w-1/2 lg:w-1/4 p-2">
            <a href="{{ route('product-list') }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <h5 class="text-xl font-bold capitalize">
                                $ <span id="payable"></span>
                            </h5>
                            <p class="text-sm text-gray-600">Total Collection</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 p-2 rounded-full shadow">
                                <img class="w-8 h-8" src="{{ asset('images/icon.svg') }}" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
