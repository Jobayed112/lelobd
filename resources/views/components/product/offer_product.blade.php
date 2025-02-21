<section class="container mx-auto p-4 m-2 border-b">
    <h1 class="text-3xl font-bold text-center text-indigo-700 mb-6">Exclusive Product Offers</h1>

    <div class="product-wrapper bg-slate-50 rounded-xl m-3 shadow-lg p-4">
        <div class="product-flex flex flex-wrap gap-4 justify-center">
            @foreach ($products as $product)

                @if ($product->offer)
                    <div class="sm:w-56 bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">fdgsgsg
                        <div class="sm:w-56 bg-gray-100 rounded-t-lg overflow-hidden border-b relative">
                            <a href="{{ url('product/view/' . $product->id) }}">
                                @if ($product->images->isNotEmpty())
                                    <img class="sm:w-56 h-56 object-cover transition-transform duration-300 hover:scale-105"
                                         src="{{ asset($product->images->last()->img_url) }}" alt="{{ $product->name }}">
                                @else
                                    <img class="sm:w-56 h-auto object-cover transition-transform duration-300 hover:scale-105"
                                         src="{{ asset('images/no-image.png') }}" alt="No Image Available">
                                @endif
                            </a>
                            <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                Offer
                            </div>
                        </div>

                        <div class="p-1 text-center">
                            <a href="{{ url('product/view/' . $product->id) }}"
                               class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm {{ $product->stock ? 'text-green-500' : 'text-red-500' }} font-medium">
                                {{ $product->stock ? 'In stock' : 'Out of stock' }}
                            </p>

                            <div class="flex justify-center items-center">
                                <span class="block text-xl font-bold text-gray-900 line-through hover:text-red-500">
                                    BDT: {{ number_format($product->price, 2) }}
                                </span>
                                <span class="ml-2 text-lg font-bold text-green-600">
                                    BDT: {{ number_format($product->price - $product->offer->discount, 2) }}
                                </span>
                            </div>

                            @if ($product->stock)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="qty" value="1" min="1"
                                           class="w-16 text-center border border-gray-300 rounded-lg">
                                    <button type="submit"
                                            class="m-1 text-inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <p class="mt-1 text-sm text-red-500">Out of Stock</p>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
