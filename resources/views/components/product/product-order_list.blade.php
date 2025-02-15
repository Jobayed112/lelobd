<!-- Orders Page Container -->
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">All Your Orders</h1>

    <!-- Orders Table -->
    <div class="bg-white p-6 rounded-lg shadow">
        <table class="w-full text-left table-auto">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4 text-gray-700">Order ID</th>
                    <th class="py-2 px-4 text-gray-700">Order Date</th>
                    <th class="py-2 px-4 text-gray-700">Status</th>
                    <th class="py-2 px-4 text-gray-700">Total Amount</th>
                    <th class="py-2 px-4 text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Order 1 -->
                <tr class="border-b">
                    <td class="py-4 px-4 text-gray-700">#ORD12345</td>
                    <td class="py-4 px-4 text-gray-700">January 1, 2025</td>
                    <td class="py-4 px-4 text-green-600">Shipped</td>
                    <td class="py-4 px-4 text-gray-700">$92.97</td>
                    <td class="py-4 px-4">
                        <a href="{{ url('ProductOrderDetails') }}"class="text-blue-600 hover:text-blue-800">View
                            Details</a>
                    </td>
                </tr>

                <!-- Example Order 2 -->
                <tr class="border-b">
                    <td class="py-4 px-4 text-gray-700">#ORD12346</td>
                    <td class="py-4 px-4 text-gray-700">January 3, 2025</td>
                    <td class="py-4 px-4  text-yellow-600">Processing</td>
                    <td class="py-4 px-4 text-gray-700">$150.50</td>
                    <td class="py-4 px-4">
                        <a href="{{ url('ProductOrderDetails') }}" class="text-blue-600 hover:text-blue-800">View
                            Details</a>
                    </td>
                </tr>

                <!-- Example Order 3 -->
                <tr class="border-b">
                    <td class="py-4 px-4 text-gray-700">#ORD12347</td>
                    <td class="py-4 px-4 text-gray-700">January 5, 2025</td>
                    <td class="py-4 px-4 text-red-600">Cancelled</td>
                    <td class="py-4 px-4 text-gray-700">$75.99</td>
                    <td class="py-4 px-4">
                        <a href="{{ url('ProductOrderDetails') }}" class="text-blue-600 hover:text-blue-800">View
                            Details</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination (if needed) -->
    <div class="flex justify-center mt-6">
        <nav class="inline-flex items-center space-x-2">
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Previous</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">1</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">2</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">3</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Next</button>
        </nav>
    </div>
</div>


<!-- Responsive Styles -->
<style>
    @media (max-width: 768px) {
        table {
            display: block;
            width: 100%;
            overflow-x: auto;
        }

        table thead {
            display: none;
        }

        table tr {
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

        .order-summary {
            display: block;
            width: 100%;
        }
    }
</style>
    