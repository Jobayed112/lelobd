<div class="exclusive-products-section m-4 p-4 bg-gray-100">
    <h2 class="text-3xl font-bold mb-6 text-center text-orange-700">Exclusive Products</h2>

    <div class="flex justify-center mb-4">
        <button onclick="filterProducts('popular')"
                class="mx-2 px-2 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm sm:text-base">
            Popular
        </button>
        <button onclick="filterProducts('new')"
                class="mx-2 px-2 py-2 bg-green-500 text-white rounded hover:bg-green-600 text-sm sm:text-base">
            New
        </button>
        <button onclick="filterProducts('top')"
                class="mx-2 px-2 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 text-sm sm:text-base">
            Top
        </button>
        <button onclick="filterProducts('special')"
                class="mx-2 px-2 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm sm:text-base">
            Special
        </button>
        <button onclick="filterProducts('all')"
                class="mx-2 px-2 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm sm:text-base">
            All
        </button>
    </div>

<div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($products as $product)
        <div class="product-card bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 product-item"
            data-type="{{ $product->type }}">
            <img src="{{ asset($product->images->first()->img_url ?? 'uploads/default.png') }}"
                 alt="{{ $product->name }}"
                 class="w-full h-60 sm:h-80 object-cover rounded-t-lg">
            <div class="p-4">
                <h3 class=" font-semibold text-gray-800 mb-2 text-sm sm:text-lg">{{ $product->name }}</h3>
                <p class="text-green-600 font-bold mb-4 text-sm sm:text-base">${{ number_format($product->price, 2) }}</p>
                <p class="text-gray-500 text-sm sm:text-base">{{ $product->description }}</p>
            </div>
        </div>
    @endforeach
</div>

      <!-- Pagination buttons -->
      <div class="flex justify-center mt-4 flex-wrap">
        {{ $products->links() }}
    </div>
</div>

<script>
    function filterProducts(type) {
        const items = document.querySelectorAll('.product-item');
        items.forEach(item => {
            item.style.display = (type === 'all' || item.dataset.type === type) ? 'block' : 'none';
        });
    }
</script>
