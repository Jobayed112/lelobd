<div class="bg-gray-50 min-h-screen p-4">
    <div class="container mx-auto bg-white rounded-lg shadow-lg">
        <div class="flex flex-wrap justify-between items-center p-4 border-b border-gray-200">
            <h1 class="text-3xl font-bold text-gray-800 w-full sm:w-auto">Cart</h1>
            <a href="{{ url('/') }}"
               class="mt-2 sm:mt-0 bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition">
                Continue Shopping
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Product</th>
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Name</th>
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Price</th>
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Quantity</th>
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Total</th>
                        <th class="px-4 py-3 border-b border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @foreach ($cart as $item)
                        <tr class="hover:bg-gray-200 transition">
                            <td class="px-4 py-3 border-b border-gray-200">
                                <img src="{{ asset($item['img_url']) }}"
                                     class="w-16 h-16 object-cover rounded-lg shadow" alt="Product Image">
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded text-gray-800">{{ $item['name'] }}</span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded text-gray-800">${{ number_format($item['price'], 2) }}</span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded text-gray-800">{{ $item['quantity'] }}</span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <span class="px-2 py-1 rounded text-gray-800">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <a href="{{ route('cart-remove', $loop->index) }}"
                                   class="text-red-500 hover:text-red-700 transition"
                                   onclick="return confirm('Are you sure you want to remove this item?')">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="flex flex-wrap justify-between items-center p-4 border-t border-gray-200">
            <div class="text-lg  font-semibold">
                Total: ${{ number_format($totalPrice, 2) }}
            </div>
            <div>
                <a href="{{ url('checkout') }}"
                   class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</div>
