<div class="max-w-5xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl font-extrabold text-blue-800">Update Order #{{ $order->id }}</h2>
            <a href="{{ route('order.list') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-700 transition">
                ↩️ Back to Orders
            </a>
        </div>

        <form action="{{ route('order.update', $order->id) }}" method="POST" class="grid grid-cols-3 gap-4">
            @csrf

            <!-- Order Status -->
            <div class="flex flex-col">
                <label for="status" class="mb-1 text-sm font-medium text-gray-700">Order Status</label>
                <select id="status" name="status" class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800" required>
                    <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ old('status', $order->status) == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ old('status', $order->status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="canceled" {{ old('status', $order->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>

                    <option value="out_for_delivery" {{ old('status', $order->status) == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                    <option value="returned" {{ old('status', $order->status) == 'returned' ? 'selected' : '' }}>Returned</option>

                </select>
            </div>


            <!-- Total Amount -->
            <div class="flex flex-col">
                <label for="total_price" class="mb-1 text-sm font-medium text-gray-700">Total Amount</label>
                <input type="number" id="total_amount" name="total_price" value="{{ old('total_price', $order->total_price, ) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Shipping Address -->
            <div class="flex flex-col">
                <label for="shipping_address" class="mb-1 text-sm font-medium text-gray-700">Shipping Address</label>
                <input type="text" id="shipping_address" name="shipping_address" value="{{ old('shipping_address', $order->shipping_address) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Submit Button -->
            <div class="col-span-3 flex justify-center mt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Update Order
                </button>
            </div>
        </form>
    </div>
</div>
