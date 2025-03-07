<div class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen">
    <div class="container mx-auto bg-white rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Cart List</h1>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                        <th class="px-5 py-4">Cart ID</th>
                        <th class="px-5 py-4">User</th>
                        <th class="px-5 py-4">Product</th>
                        <th class="px-5 py-4">Color</th>
                        <th class="px-5 py-4">Size</th>
                        <th class="px-5 py-4">Quantity</th>
                        <th class="px-5 py-4">Price</th>
                        <th class="px-5 py-4">Total</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($cartsItem as $item)
                        <tr class="hover:bg-blue-50">
                            <td class="px-5 py-4">{{ $item->id }}</td>
                            <td class="px-5 py-4">{{ $item->user->name }}</td>
                            <td class="px-5 py-4">{{ $item->product->name }}</td>
                            <td class="px-5 py-4">{{ $item->color ?? 'N/A' }}</td>
                            <td class="px-5 py-4">{{ $item->size ?? 'N/A' }}</td>
                            <td class="px-5 py-4">{{ $item->qty }}</td>
                            <td class="px-5 py-4">${{ number_format($item->product->price, 2) }}</td>
                            <td class="px-5 py-4 font-bold text-green-600">${{ number_format($item->qty * $item->product->price, 2) }}</td>
                            <td class="px-5 py-4 space-x-3">
                                <p  class="text-blue-600 hover:underline">Ok</p>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="flex justify-center mt-6">
            {{ $cartItem->links() }}
        </div> --}}
    </div>
</div>
