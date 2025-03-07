<div class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen m-2">
    <div class="container mx-auto bg-white rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Order List</h1>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                        <th class="px-5 py-4">Order ID</th>
                        <th class="px-5 py-4">User</th>
                        <th class="px-5 py-4">Phone</th>
                        <th class="px-5 py-4">Total Price</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Shipping Address</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-blue-50">
                            <td class="px-5 py-4">{{ $order->id }}</td>
                            <td class="px-5 py-4">{{ $order->user->name }}</td>
                            <td class="px-5 py-4">
                                {{ $order->phone ?? $order->user->phone }}
                            </td>
                            <td class="px-5 py-4">${{ number_format($order->total_price, 2) }}</td>
                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-xl text-white
                                    {{ $order->status == 'pending' ? 'bg-yellow-500' : ($order->status == 'confirmed' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-5 py-4">{{ $order->shipping_address }}</td>
                            <td class="px-5 py-4 space-x-3">
                                <a href="{{ route('order.confirmed', $order->id) }}" class="text-blue-600 hover:underline">Confirm</a>
                                <a href="{{ route('order.delete', $order->id) }}" class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="flex justify-center mt-6">
            {{ $orders->links() }}
        </div> --}}
    </div>
</div>
