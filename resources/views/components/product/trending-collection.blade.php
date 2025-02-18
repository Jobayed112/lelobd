<section class=" container mx-auto m-2  ">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl text-center font-bold text-gray-800 mb-4 rounded ring-1 hover:ring-2 p-2">Trending Collection</h2>
        <!-- For mobile: grid-cols-2; for md: grid-cols-3; for lg: grid-cols-4 -->
        <div class="product-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            @foreach ($products as $product)

                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset($product->img_url) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $product->name }}</h3>
                        <p class="text-gray-500 mt-1">Best quality running shoes</p>
                        <div class="flex items-center justify-between mt-3">
                            <span class="text-lg font-bold text-green-500">$49.99</span>
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
