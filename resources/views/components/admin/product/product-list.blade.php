<div class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen ">
    <div class="container mx-auto bg-white rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Product List</h1>
            <a href="{{ route('product-create') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform">
                + Create Product
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                        <th class="px-5 py-4">ID</th>
                        <th class="px-5 py-4">Category</th>
                        <th class="px-5 py-4">Name</th>
                        <th class="px-5 py-4">Price</th>
                        <th class="px-5 py-4">Stock</th>
                        <th class="px-5 py-4">Image</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($products as $product)
                        <tr class="hover:bg-blue-50">
                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-xl text-white text-sm
                                    {{ $product->stock == 'instock' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $product->id }}
                                </span>
                            </td>
                            <td class="px-5 py-4">{{ $product->category->name }}</td>
                            <td class="px-5 py-4">{{ $product->name }}</td>
                            <td class="px-5 py-4">${{ number_format($product->price, 2) }}</td>
                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-xl text-white text-sm
                                    {{ $product->stock == 'instock' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $product->stock == 'instock' ? 'In Stock' : 'Unavailable' }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <img src="{{ $product->images->isNotEmpty() ? asset($product->images->first()->img_url) : asset('uploads/default.png') }}"
                                class="w-20 h-20 object-cover rounded-xl border border-gray-300 shadow-sm" alt="{{ $product->name }}">


                            </td>
                            <td class="px-5 py-4 space-x-3">
                                <a href="{{ route('product-edit', $product->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <a href="{{ route('product-delete', $product->id) }}"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
