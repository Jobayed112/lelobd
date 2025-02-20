<div class="container mx-auto ">
    <!-- Checkout Section -->

    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 text-center">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <!-- Order Summary -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-2xl bg-gray-300 font-semibold text-gray-800 mb-6">Your Order</h3>
            <div class="flex items-center space-x-6 mb-6">
                <img src="{{ asset('images/pro3.webp') }}" alt="Product Image"
                    class="w-32 h-32 object-cover rounded-lg shadow-lg">
                <div>
                    <p class="text-sm font-bold text-gray-700">Men's Premium Hoodie</p>
                    <p class="text-gray-600">Price: <span class="font-medium">$59.99</span></p>
                    <p class="text-gray-600">Quantity: <span class="font-medium">1</span></p>
                    <p class="text-green-600 font-bold mt-2 text-sm">Total: $59.99</p>
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Billing & Payment</h3>

            <form action="#" method="POST">
                <!-- Full Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Shipping Address -->
                <div class="mb-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                    <input type="text" id="address" name="address"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your shipping address" required>
                </div>

                <!-- Payment Method -->
                <div class="mb-6">
                    <label for="payment-method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <select id="payment-method" name="payment-method"
                        class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="Cash On Delivary">Cash On Delivary</option>
                        <option value="paypal">Nogod</option>
                        <option value="bkash">Bkash</option>
                        <option value="credit-card">Credit Card</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                        Complete Purchase
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
