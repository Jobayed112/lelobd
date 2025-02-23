<section class="mx-auto m-1 border-b">
    <div class="product-wrapper bg-slate-50 rounded-xl m-3 shadow-lg">
        <h1 class="text-3xl text-center font-bold text-gray-800 mb-6">
            Products under {{ $category->name }}
        </h1>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
            @foreach ($categoryByProduct as $product)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 ring-1 hover:ring-4">
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

                    <div class="text-center p-2">
                        <a href="{{ url('product/view/' . $product->id) }}"
                            class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
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
    </div>
</section>
