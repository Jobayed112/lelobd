<section class="container mx-auto p-2  border-b">
    <h1 class="text-3xl font-bold text-center text-indigo-700 mb-4">Exclusive Product Offers</h1>

    <div class="product-wrapper bg-slate-50 rounded-xl m-1 shadow-lg p-4">
        <div class="product-flex flex flex-wrap gap-4 justify-center">

            @foreach ($products as $product)
                @foreach ($product->offers as $offer)
                    <div class="sm:w-56 bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">

                        {{-- Product Image --}}
                        <div class="sm:w-56 bg-gray-100 rounded-t-lg overflow-hidden border-b relative">
                            <a href="{{ url('product/view/' . $product->id) }}">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset($product->images->last()->img_url) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                                @else
                                    <img src="{{ asset('default-image.jpg') }}" alt="No Image Available" class="w-full h-40 object-cover">
                                @endif
                            </a>
                            <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                                {{ $offer->offer_name }}
                            </div>
                        </div>

                        {{-- Product Details --}}
                        <div class="p-4 text-center">
                            <a href="{{ url('product/view/' . $product->id) }}"
                               class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm {{ $product->stock == 'instock' ? 'text-green-500' : 'text-red-500' }} font-medium">
                                {{ $product->stock == 'instock' ? 'In stock' : 'Out of stock' }}
                            </p>

                            {{-- Pricing --}}
                            <div class="flex justify-center items-center mt-2">
                                <span class="block text-xl font-bold text-gray-900 line-through hover:text-red-500">
                                    BDT: {{ number_format($product->price, 2) }}
                                </span>
                                <span class="ml-2 text-lg font-bold text-green-600">
                                    BDT: {{ number_format($product->price - $offer->discount, 2) }}
                                </span>
                            </div>

                            {{-- Offer Validity --}}
                            <p class="text-xs text-gray-500 mt-1">
                                Offer valid from {{ $offer->start_date }} to {{ $offer->end_date }}
                            </p>

                            {{-- Add to Cart Form --}}
                            @if ($product->stock == 'instock')
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="qty" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-lg">
                                    <button type="submit"
                                            class="m-1 px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <p class="mt-1 text-sm text-red-500">Out of Stock</p>
                            @endif
                        </div>

                    </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section>
