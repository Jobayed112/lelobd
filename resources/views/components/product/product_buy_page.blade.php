<div class="container mx-auto px-6 py-10">
    <h1 class="text-4xl font-bold text-gray-900 mb-6 text-center">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Product Overview -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-300">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Product Overview</h3>
            <div class="space-y-6">

                <div class="flex items-center justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center space-x-4 w-full">
                        @if ($productbuy->images->isNotEmpty())
                            <img src="{{ asset($productbuy->images->last()->img_url) }}" alt="{{ $productbuy->name }}"
                                class="w-3/5 h-auto object-cover rounded-md">
                        @else
                            <img src="{{ asset('path/to/default-image.jpg') }}" alt="No Image Available"
                                class="w-3/5 h-auto object-cover rounded-md">
                        @endif
                        <div class="w-full">
                            <p class="text-2xl font-semibold text-gray-700">{{ $productbuy->name }}</p>
                            <p class="text-gray-600 text-xl">Price: <span
                                    class="font-medium">${{ number_format($productbuy->price, 2) }}</span></p>
                            <p class="text-gray-600 text-xl">Quantity: <span
                                    class="font-medium">{{ $productbuy->qty }}</span></p>
                            <p class="text-green-600 font-bold mt-2 text-xl">Total:
                                ${{ number_format($productbuy->price * $productbuy->qty, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Info -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-300 lg:col-span-2">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Billing & Payment</h3>
            <form action="{{ route('checkout.submit') }}" method="POST">
                @csrf

                <!-- Payment Method -->
                <div class="mb-6">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Payment
                        Method</label>
                    <select id="payment_method" name="payment_method"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="cash_on_delivery">Cash On Delivery</option>
                        <option value="bkash" disabled>Bkash</option>
                        <option value="nogod" disabled>Nogod</option>
                        <option value="credit-card" disabled>Credit Card</option>
                    </select>
                </div>

                <!-- Full Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Shipping Address -->
                <div class="mb-6">
                    <label for="shipping_address" class="block text-sm font-medium text-gray-700">Shipping
                        Address</label>
                    <input type="text" id="shipping_address" name="shipping_address"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your shipping address" required>
                </div>

                <!-- Total Amount -->
                <div class="flex justify-between mb-6">
                    <p class="text-lg font-medium text-gray-700">Total Payable:</p>
                    <p class="text-xl font-bold text-gray-900">${{ number_format($productbuy->price, 2) }}</p>
                </div>

                <!-- Confirm Order Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                        Confirm Order
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
