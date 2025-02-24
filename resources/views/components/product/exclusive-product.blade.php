<section class="container mx-auto p-4 m-2 border-b">
    <div class="product-wrapper bg-gray-100 ring-1 text-center rounded-xl py-3 shadow-lg">
        <div class="flex flex-wrap justify-center gap-2 lg:gap-10">
            <button onclick="filterProducts('all')"
            class="px-3 py-2 bg-gray-500  hover:ring-2 text-white rounded-lg hover:bg-gray-600 text-sm sm:text-base">
            All
        </button>
            <button onclick="filterProducts('popular')"
                class="px-3 py-2 bg-blue-500  hover:ring-2 text-white rounded-lg hover:bg-blue-600 text-sm sm:text-base">
                Popular
            </button>
            <button onclick="filterProducts('new')"
                class="px-3 py-2 bg-green-500  hover:ring-2 text-white rounded-lg hover:bg-green-600 text-sm sm:text-base">
                New
            </button>
            <button onclick="filterProducts('top')"
                class="px-3 py-2 bg-purple-500  hover:ring-2 text-white rounded-lg hover:bg-purple-600 text-sm sm:text-base">
                Top
            </button>
            <button onclick="filterProducts('special')"
                class="px-3 py-2 bg-pink-500  hover:ring-2  text-white rounded-lg hover:bg-red-600 text-sm sm:text-base">
                Special
            </button>

        </div>
    </div>


    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 m-2 gap-2">
        @foreach ($products as $product)
            <div class="bg-white border  ring-1 hover:ring-4  border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 product-item"
                data-type="{{ $product->type }}">
                <div class="bg-gray-100 rounded-t-lg overflow-hidden border-b">
                    <a href="{{ url('product/view/' . $product->id) }}">
                        @if ($product->images->isNotEmpty())
                            <img class="w-full object-cover transition-transform duration-300 hover:scale-105"
                                src="{{ asset($product->images->last()->img_url) }}" alt="{{ $product->name }}">
                        @else
                            <img class="w-full object-cover transition-transform duration-300 hover:scale-105"
                                src="{{ asset('images/no-image.png') }}" alt="No Image Available">
                        @endif
                    </a>
                </div>

                <div class="text-center">
                    <a href="{{ url('product/view/' . $product->id) }}"
                        class="text-sm font-semibold p-2 text-gray-800 hover:text-indigo-600 hover:underline">
                        {{ $product->name }}
                    </a>
                    <p class="text-sm {{ $product->stock ? 'text-green-500' : 'text-red-500' }} font-medium">
                        {{ $product->stock ? 'In stock' : 'Out of stock' }}
                    </p>
                    <span class="block text-xl font-bold text-gray-900">BDT:
                        {{ number_format($product->price, 2) }}</span>

                    @if ($product->stock)
                        <div class="mt-1 flex flex-col pb-1 items-center">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-full">
                                @csrf
                                <div class="flex justify-center items-center gap-1">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="qty" value="1" min="1"
                                        class="w-12 text-center border border-gray-300 rounded-lg">
                                    <button type="submit"
                                        class="px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <p class="mt-1 text-sm text-red-500 font-semibold">Out of Stock</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    function filterProducts(type) {
        const items = document.querySelectorAll('.product-item');
        let visibleItems = 0;

        items.forEach(item => {
            if (type === 'all' || item.dataset.type === type) {
                item.style.display = 'block';
                visibleItems++;
            } else {
                item.style.display = 'none';
            }
        });

        // Show message if no items are visible
        const noProductsMessage = document.getElementById('no-products-message');
        if (visibleItems === 0) {
            noProductsMessage.classList.remove('hidden');
        } else {
            noProductsMessage.classList.add('hidden');
        }
    }
</script>
