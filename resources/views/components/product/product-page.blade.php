
<section class=" container mx-auto m-2  ">
        <div class="product-grid grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            {{-- Product Item --}}
                @foreach($products as $product)
                <div
                    class="w-full bg-white border border-gray-200  rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div class="w-full bg-gray-100 rounded-t-lg overflow-hidden">
                            <a href="{{ url('product-view') }}">
                                <img class="w-full  h-32 sm:h-60 lg:h-70  object-cover transition-transform duration-300 hover:scale-105"
                                    src="{{ asset($product->img_url) }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="p-1 text-center">
                            <a href="{{ url('product-view') }}"
                                class="text-lg font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm font-medium  {{ $product->stock == 'instock' ? 'text-green-500' : 'text-red-500' }}"> {{ $product->stock. " ".$product->quantity}}</p>
                            <span class="block  text-1xl font-bold text-gray-900 ">BDT: {{ $product->price }}</span>
                            <span class="text-gray-500 line-through ml-2">BDT: 1500.00</span>
                            <a href="{{ url('product-view') }}"
                                class="m-1 inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
                                Buy Now
                            </a>
                        </div>
                    </div>
                @endforeach
            {{-- End Product Item --}}
        </div>
        {{-- paginate link and same css--}}
        <div class="mt-2">
            {{ $products->links() }}
        </div>
</section>
