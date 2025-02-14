<div class="bg-gray-100">
    <div class="container mx-auto bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4 flex-wrap">
            <h1 class="text-3xl font-bold text-gray-800 w-full sm:w-auto">Product List</h1>
            <a href="{{ route('product-create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition mt-2 sm:mt-0">
                + Create Product
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-4 py-3 text-left border-b border-gray-300">ID</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Category</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Name</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Price</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Stock</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Image</th> <!-- Added Image Column -->
                        <th class="px-4 py-3 text-left border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 divide-y border justifu-start divide-gray-200">
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-300 transition  ">
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded-lg text-white
                                    {{ $product->stock == 'instock' ? 'bg-green-500' : 'bg-red-500' }}">
                                  {{ $product->id  }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded-lg text-black
                               ">
                                   {{ $product->category->name  }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded-lg text-black
                                   ">
                                   {{ $product->name  }}
                                </span>
                            </td>

                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded-lg text-black">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center border-b border-gray-200">
                                <span class="px-2 py-1 rounded-lg text-white
                                    {{ $product->stock == 'instock' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $product->stock == 'instock' ? 'In Stock' : 'Unavailable' }}
                                </span>
                            </td>
                            <!-- 🔥 Display Product Image -->
                            <td class="px-4 py-3 border-b border-gray-200">
                                <img src="{{ asset($product->img_url) }}" alt="{{ $product->name }}"
                                    class="w-16 h-16 object-cover rounded-lg shadow">
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <a href="{{ route('product-edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                <a href="{{ route('product-delete', $product->id) }}" class="text-red-500 hover:text-red-700"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination buttons -->
        <div class="flex justify-center mt-4 flex-wrap">
            {{ $products->links() }}
        </div>
    </div>
</div>
