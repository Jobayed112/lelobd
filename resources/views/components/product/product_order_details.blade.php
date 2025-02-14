<!-- Order Details Page Container -->
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">Order Details</h1>

    <!-- Order Details Card -->
    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order #ORD12345</h2>

        <div class="flex flex-col md:flex-row justify-between mb-4">
            <span class="text-lg text-gray-700">Order Date:</span>
            <span class="text-lg font-bold text-gray-700">January 1, 2025</span>
        </div>
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <span class="text-lg text-gray-700">Order Status:</span>
            <span class="text-lg font-bold text-green-600">Shipped</span>
        </div>
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <span class="text-lg text-gray-700">Total Amount:</span>
            <span class="text-lg font-bold text-gray-700">$92.97</span>
        </div>
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <span class="text-lg text-gray-700">Shipping Address:</span>
            <span class="text-lg font-bold text-gray-700">1234 Main St, City, State, 12345</span>
        </div>
    </div>

    <!-- Products List -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Products</h3>
        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4 text-gray-700">Product</th>
                        <th class="py-2 px-4 text-gray-700">Quantity</th>
                        <th class="py-2 px-4 text-gray-700">Price</th>
                        <th class="py-2 px-4 text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Product 1 -->
                    <tr class="border-b">
                        <td class="py-4 px-4 flex items-center">
                            <img src="{{ asset('images/pro3.webp') }}" alt="Product Image" class="w-16 h-16 object-cover rounded-lg mr-4">
                            <span class="text-gray-800">Women's Stylish Top</span>
                        </td>
                        <td class="py-4 px-4 text-gray-700">1</td>
                        <td class="py-4 px-4 text-gray-700">$32.99</td>
                        <td class="py-4 px-4 text-gray-700">$32.99</td>
                    </tr>

                    <!-- Product 2 -->
                    <tr class="border-b">
                        <td class="py-4 px-4 flex items-center">
                            <img src="{{ asset('images/pro1.webp') }}" alt="Product Image" class="w-16 h-16 object-cover rounded-lg mr-4">
                            <span class="text-gray-800">Men's T-Shirt</span>
                        </td>
                        <td class="py-4 px-4 text-gray-700">2</td>
                        <td class="py-4 px-4 text-gray-700">$29.99</td>
                        <td class="py-4 px-4 text-gray-700">$59.98</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Payment Method -->
    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Payment Method</h3>
        <p class="text-lg text-gray-700">Credit Card (**** **** **** 1234)</p>
    </div>
</div>
