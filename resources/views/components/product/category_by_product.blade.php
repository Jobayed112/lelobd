<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        {{ $category->name }}
    </h1>
    <section class="container mx-auto p-4 m-2 border-b">
        <div class="product-wrapper bg-slate-200 rounded-xl  shadow-lg">
            <div class="product-grid grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
                {{-- Product Item --}}
                @foreach ($products as $product)
                    <div class="sm:w-56 bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ">
                        <!-- Product Image -->
                        <div class="sm:w-56 bg-gray-100 rounded-t-lg overflow-hidden border-b">
                            <a href="{{ url('product/view/' . $product->id) }}">
                                @if ($product->images->isNotEmpty())
                                    <img class="sm:w-56   h-56 object-cover transition-transform duration-300 hover:scale-105"
                                        src="{{ asset($product->images->first()->img_url) }}" alt="{{ $product->name }}">
                                @else
                                    <img class="sm:w-56 h-auto object-cover transition-transform duration-300 hover:scale-105"
                                        src="{{ asset('images/no-image.png') }}" alt="No Image Available">
                                @endif
                            </a>
                        </div>

                        <!-- Product Details -->
                        <div class="p-1 text-center">
                            <a href="{{ url('product/view/' . $product->id) }}"
                                class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm {{ $product->stock ? 'text-green-500' : 'text-red-500' }} font-medium">
                                {{ $product->stock ? 'In stock' : 'Out of stock' }}
                            </p>
                            <span class="block text-1xl font-bold text-gray-900">BDT:
                                {{ number_format($product->price, 2) }}</span>

                            {{-- Add to Cart Button --}}
                            @if ($product->stock)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="qty" value="1" min="1"
                                        class="w-16 text-center border border-gray-300 rounded-lg">
                                    <button type="submit"
                                        class="m-1 text- inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <p class="mt-1 text-sm text-red-500">Out of Stock</p>
                            @endif

                        </div>
                    </div>
                @endforeach

                {{-- End Product Item --}}
            </div>
        </div>

    </section>


    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>

