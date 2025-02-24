<div class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen">
    <div class="container mx-auto bg-white rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Product Detail List</h1>
            <a href="{{ route('product.detail.create') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform">
                + Add Product Detail
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                        <th class="px-5 py-4">ID</th>
                        <th class="px-5 py-4">Product Name</th>
                        <th class="px-5 py-4">Brand</th>
                        <th class="px-5 py-4">Size</th>
                        <th class="px-5 py-4">Color</th>
                        <th class="px-5 py-4">Material</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($productdetails as $detail)
                        <tr class="hover:bg-blue-50">
                            <td class="px-5 py-4">{{ $detail->id }}</td>
                            <td class="px-5 py-4">{{$detail->product_id ."  ". "  ".$detail->product->name }}</td>
                            <td class="px-5 py-4">{{ $detail->brand }}</td>
                            <td class="px-5 py-4">{{ $detail->size }}</td>
                            <td class="px-5 py-4">{{ $detail->color }}</td>
                            <td class="px-5 py-4">{{ $detail->material }}</td>
                            <td class="px-5 py-4 space-x-3">
                                <a href="{{ route('product.detail.edit', $detail->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <a href="{{ route('product.detail.delete', $detail->id) }}"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this detail?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="flex justify-center mt-6">
            {{ $productDetails->links() }}
        </div> --}}
    </div>
</div>
