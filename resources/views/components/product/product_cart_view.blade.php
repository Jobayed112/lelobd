<!-- Cart Page Container -->
<div class="container mx-auto ">

    <h2
        class="text-2xl bg-green-400 rounded-full hover:text-white hover:bg-green-500 p-1 m-1 hover:ring-4 font-semibold flex justify-center text-gray-800">
        Your Shopping Cart</h2>

    <!-- Cart Table -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4 text-gray-700">Product</th>
                        <th class="py-2 px-4 text-gray-700">Price</th>
                        <th class="py-2 px-4 text-gray-700">Quantity</th>
                        <th class="py-2 px-4 text-gray-700">Total</th>
                        <th class="py-2 px-4 text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart Item 1 -->
                    <tr class="border-b">
                        <td class="py-4 px-4 flex items-center">
                            <img src="{{ asset('images/pro3.webp') }}" alt="Product Image"
                                class="w-16 h-16 object-cover rounded-lg mr-4">
                            <span class="text-gray-800">Women's Stylish Top</span>
                        </td>
                        <td class="py-4 px-4 text-gray-700">$32.99</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-l-lg">-</button>
                                <input type="number" value="1"
                                    class="w-12 text-center border-t border-b border-gray-300">
                                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-r-lg">+</button>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-gray-700">$32.99</td>
                        <td class="py-4 px-4">
                            <button class="text-red-600 hover:text-red-800">Remove</button>
                        </td>
                    </tr>

                    <!-- Cart Item 2 -->
                    <tr class="border-b">
                        <td class="py-4 px-4 flex items-center">
                            <img src="{{ asset('images/pro1.webp') }}" alt="Product Image"
                                class="w-16 h-16 object-cover rounded-lg mr-4">
                            <span class="text-gray-800">Men's T-Shirt</span>
                        </td>
                        <td class="py-4 px-4 text-gray-700">$29.99</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-l-lg">-</button>
                                <input type="number" value="2"
                                    class="w-12 text-center border-t border-b border-gray-300">
                                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-r-lg">+</button>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-gray-700">$59.98</td>
                        <td class="py-4 px-4">
                            <button class="text-red-600 hover:text-red-800">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Cart Summary -->
    <div class="bg-white p-6 rounded-lg shadow mt-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Cart Summary</h2>
        <div class="flex justify-between mb-4">
            <span class="text-lg text-gray-700">Subtotal</span>
            <span class="text-lg font-bold text-gray-700">$92.97</span>
        </div>
        <div class="flex justify-between mb-4">
            <span class="text-lg text-gray-700">Shipping</span>
            <span class="text-lg font-bold text-gray-700">Free</span>
        </div>
        <div class="flex justify-between mb-6">
            <span class="text-lg text-gray-700">Total</span>
            <span class="text-2xl font-bold text-green-600">$92.97</span>
        </div>

        <!-- Checkout Button -->
        <a href=""
            class="w-full bg-green-500 flex justify-center text-white py-3 p-2 hover:text-2xl rounded-lg text-center hover:bg-green-600 transition">
            Checkout</a>
    </div>
</div>

<!-- Tailwind CSS for Responsiveness -->
<style>
    @media (max-width: 768px) {

        /* Table styling for small screens */
        .overflow-x-auto {

            overflow-x: auto;
        }

        table {
            display: block;
        }

        table thead {
            display: none;
        }

        table tbody tr {
            display: flex;
            flex-direction: column;
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 0;
        }

        table td {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            border: none;
        }

        table td:nth-child(1),
        table td:nth-child(2),
        table td:nth-child(3),
        table td:nth-child(4) {
            width: 100%;
        }
    }
</style>
