<div class="product-list-section  bg-gray-50">
    <h2 class="text-2xl font-bold mb-2 text-center text-indigo-700">Top Products</h2>

    <!-- Responsive Table Wrapper -->
    <div class="overflow-x-auto">
        <!-- Product Table -->
        <table class="min-w-full table-auto bg-white shadow-lg rounded-lg border border-gray-300">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Image</th>
                    <th class="py-2 px-4 border-b border-gray-300">Name</th>
                    <th class="py-2 px-4 border-b border-gray-300">Type</th>
                    <th class="py-2 px-4 border-b border-gray-300">Price</th>
                    <th class="py-2 px-4 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TopProducts as $product)
                    <tr class="border-t border-b hover:bg-gray-100">
                        <td class="py-2 px-4 border-r border-gray-300">
                            <img src="{{ asset($product->images->first()->img_url ?? 'uploads/default.png') }}"
                                 alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded-md">
                        </td>
                        <td class="py-2 px-4 text-gray-800 border-r border-gray-300">{{ $product->name }}</td>
                        <td class="py-2 px-4 text-gray-800 border-r border-gray-300">{{ $product->type }}</td>
                        <td class="py-2 px-4 text-green-600 font-bold border-r border-gray-300">${{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ url('product.edit', $product->id) }}"
                               class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ url('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
