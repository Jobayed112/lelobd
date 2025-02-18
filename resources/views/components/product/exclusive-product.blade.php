<section class="container mx-auto m-2">

    <div class="flex justify-center mb-4 space-x-2 flex-wrap">
        <!-- Filter Buttons -->
        <button onclick="filterProducts('popular')" class="px-2 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm sm:text-base">
            Popular
        </button>
        <button onclick="filterProducts('new')" class="px-2 py-2 bg-green-500 text-white rounded hover:bg-green-600 text-sm sm:text-base">
            New
        </button>
        <button onclick="filterProducts('top')" class="px-2 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 text-sm sm:text-base">
            Top
        </button>
        <button onclick="filterProducts('special')" class="px-2 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm sm:text-base">
            Special
        </button>
        <button onclick="filterProducts('all')" class="px-2 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm sm:text-base">
            All
        </button>
    </div>

    {{-- Product Item Grid --}}
    <div class="product-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
            <div class="w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 product-item" data-type="{{ $product->type }}">

                {{-- Display First Image or Placeholder --}}
                <div class="w-full bg-gray-100 rounded-t-lg overflow-hidden">
                    <a href="{{ url('product-view') }}">
                        @if ($product->images->isNotEmpty())
                            <img class="w-full h-32 sm:h-60 lg:h-70 object-cover transition-transform duration-300 hover:scale-105"
                                src="{{ asset($product->images->first()->img_url) }}" alt="{{ $product->name }}">
                        @else
                            <img class="w-full h-32 sm:h-60 lg:h-70 object-cover transition-transform duration-300 hover:scale-105"
                                src="{{ asset('images/no-image.png') }}" alt="No Image Available">
                        @endif
                    </a>
                </div>

                {{-- Product Details --}}
                <div class="p-2 text-center">
                    <a href="{{ url('product-view') }}" class="text-lg font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                        {{ $product->name }}
                    </a>

                    <p class="text-sm font-medium {{ $product->stock == 'instock' ? 'text-green-500' : 'text-red-500' }}">
                        {{ $product->stock . ' ' . $product->quantity }}
                    </p>

                    <span class="block text-xl font-bold text-gray-900">BDT: {{ number_format($product->price, 2) }}</span>
                    <span class="text-gray-500 line-through ml-2">BDT: 1500.00</span>

                    {{-- Add to Cart Button --}}
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-lg">
                        <button type="submit" class="ml-2 px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-4 flex justify-center">
        {{ $products->links() }}
    </div>
</section>

<script>
    function filterProducts(type) {
        const items = document.querySelectorAll('.product-item');
        items.forEach(item => {
            item.style.display = (type === 'all' || item.dataset.type === type) ? 'block' : 'none';
        });
    }
</script>
