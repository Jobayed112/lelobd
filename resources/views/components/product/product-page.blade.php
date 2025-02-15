<section class="container mx-auto m-2">
    <div class="product-grid grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
        {{-- Product Item --}}
        @foreach($products as $product)
            <div
                class="w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">

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
                <div class="p-1 text-center">
                    <a href="{{ url('product-view') }}"
                        class="text-lg font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                        {{ $product->name }}
                    </a>

                    <p class="text-sm font-medium {{ $product->stock == 'instock' ? 'text-green-500' : 'text-red-500' }}">
                        {{ $product->stock . " " . $product->quantity }}
                    </p>

                    <span class="block text-xl font-bold text-gray-900">BDT: {{ number_format($product->price, 2) }}</span>
                    <span class="text-gray-500 line-through ml-2">BDT: 1500.00</span>

                    {{-- Buy Now Button --}}
                    <a href="{{ route('product-view', $product->id) }}"
                        class="m-1 inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                        Buy Now
                    </a>

                    {{-- Add to Cart Button --}}
                    <form action="{{ route('cart-add') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="1" min="1"
                            class="w-16 text-center border border-gray-300 rounded-lg">
                        <button type="submit"
                            class="ml-2 px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-2">
        {{ $products->links() }}
    </div>
</section>
