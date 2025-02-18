{{-- <div class="top-categories-section m-2 p-2">
    <h2 class="text-2xl font-semibold mb-4 text-center text-blue-600">Top Categories</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <div class="category-card bg-white p-4 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold mb-3 text-blue-700">{{ $category->name }}</h3>

                <div class="subcategory-list space-y-4">
                    @foreach ($category->subcategories as $subcategory)

                        <div class="subcategory-card bg-gray-50 p-3 rounded-lg shadow-sm border border-gray-100">
                            <h4 class="text-lg font-semibold text-blue-500">{{ $subcategory->name }}</h4>
                            <div class="product-list space-y-3">
                                @foreach ($products as $product)
                                    <div class="product-item flex items-center space-x-2">
                                        <img src="{{ asset($product->images->first()->img_url) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md border border-gray-200">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                                            <p class="text-gray-500">${{ number_format($product->price, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div> --}}
