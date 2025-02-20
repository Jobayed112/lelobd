<section class="product-section container mx-auto m-2  ">
    <div class="product-wrapper bg-gray-50 rounded-xl p-2   shadow-lg">
        <div class="product-grid grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            {{-- Product Item --}}
            @for ($i = 0; $i < 8; $i++)
                <!-- Example for loop for demo -->
                <div
                    class="w-full bg-white border border-gray-200  rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                    <!-- Product Image -->
                    <div class="w-full bg-gray-100 rounded-t-lg overflow-hidden">
                        <a href="{{ url('ProductView') }}">
                            <img class="w-full  h-auto object-cover transition-transform duration-300 hover:scale-105"
                                src="{{ asset('images/pro1.webp') }}" alt="Product Image">
                        </a>
                    </div>

                    <!-- Product Details -->
                    <div class="p-1 text-center">
                        <a href="{{ url('ProductView') }}"
                            class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                            Stylish Denim Shirt
                        </a>
                        <p class="mt-1 text-sm text-green-500 font-medium">In stock</p>
                        <span class="block mt-1 text-1xl font-bold text-gray-900">BDT: 1,900</span>
                        <a href="{{ url('ProductView') }}"
                            class="m-1 inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                            Buy Now
                        </a>
                    </div>
                </div>
            @endfor
            {{-- End Product Item --}}
        </div>
    </div>
</section>
