<div class="container mx-auto m-5">
    <!-- Checkout Section -->
    <h1 class="text-4xl font-extrabold text-gray-900 mb-4 text-center">Checkout</h1>

    <div class=" grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Overview -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Cart Overview</h3>

            <div class="space-y-6">
                @foreach ($cartsItem as $item)

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @if($item->product->images->isNotEmpty())
                                <img src="{{ asset($item->product->images->last()->img_url) }}" alt="{{ $item->product->name }}"
                                    class="w-24 h-24 object-cover rounded-lg shadow-lg">
                            @else
                                <img src="{{ asset('path/to/default-image.jpg') }}" alt="No Image Available"
                                    class="w-16 h-16 object-cover rounded-lg shadow-lg">
                            @endif

                            <div>
                                <p class="text-sm font-semibold text-gray-700">{{ $item->product->name }}</p>
                                <p class="text-gray-600">Price: <span
                                        class="font-medium">${{ number_format($item->product->price, 2) }}</span></p>
                                <p class="text-gray-600">Quantity: <span
                                        class="font-medium">{{ $item->qty }}</span></p>
                                <p class="text-green-600 font-bold mt-2 text-sm">Total:
                                    ${{ number_format($item->product->price * $item->qty, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Total Section -->
            <!-- Total Section -->
            <div class="flex justify-between mt-6 pt-4 border-t border-gray-300">
                <p class="text-lg font-semibold text-gray-900">Total Payable:</p>
                <p class="text-xl font-bold text-gray-900">
                    @php
                        $totalAmount = $cartsItem->sum(function ($item) {
                            return $item->price * $item->qty;
                        });
                    @endphp
                    ${{ number_format($totalAmount, 2) }}
                </p>
            </div>

        </div>





        <div class="bg-blue-50 p-8 rounded-lg shadow-md border border-gray-200">
            <!-- Payment Method -->
            <div class="mb-6">
                <label for="payment-method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                <select id="payment-method" name="payment-method"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="cash-on-delivery" class="flex items-center space-x-2">
                        <img src="{{ asset('images/cash-on-delivery.png') }}" alt="Cash On Delivery"
                            class="w-6 h-6 object-contain">
                        <span>Cash On Delivery</span>
                    </option>
                    <option value="bkash" class="flex items-center space-x-2">
                        <img src="{{ asset('images/bkash.png') }}" alt="Bkash" class="w-6 h-6 object-contain">
                        <span>Bkash</span>
                    </option>
                    <option value="nogod" class="flex items-center space-x-2">
                        <img src="{{ asset('images/nogod.png') }}" alt="Nogod" class="w-6 h-6 object-contain">
                        <span>Nogod</span>
                    </option>
                    <option value="credit-card" class="flex items-center space-x-2">
                        <img src="{{ asset('images/credit-card.png') }}" alt="Credit Card"
                            class="w-6 h-6 object-contain">
                        <span>Credit Card</span>
                    </option>
                </select>
            </div>

            <!-- Coupon Code -->
            <div class="mb-6">
                <label for="coupon" class="block text-sm font-medium text-gray-700">Coupon Code (Optional)</label>
                <input type="text" id="coupon" name="coupon"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your coupon code">
            </div>
        </div>




        <!-- Checkout Info -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 flex flex-col gap-8">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Billing & Payment</h3>

            <form action="{{ route('checkout.submit') }}" method="POST">
                @csrf
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

                <!-- Total Payable Amount -->
                <div class="flex justify-between mb-6">
                    <p class="text-sm font-medium text-gray-700">Total Payable:</p>
                    <p class="text-lg font-semibold text-gray-900">$59.99</p>
                </div>

                <!-- Confirm Order Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                        Confirm Order
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
