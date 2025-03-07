<div class="container mx-auto p-4">
{{-- set in backgound image --}}

    <div class="bg-white  shadow-lg rounded-lg p-6">

     <!-- Company Name and Logo -->
<div class="flex flex-col items-center justify-center text-center">
    <img src="{{ asset('images/logo.png') }}" alt="Lelobd Logo" class="w-20 h-20  mb-2">
    <h1 class="text-2xl font-bold text-indigo-700">Lelobd.com</h1>
</div>

        <!-- Grid layout for sections -->
        <div class="flex flex-col md:flex-row gap-6">

            <!-- Left Section (User info and status) -->
            <div class="space-y-4 w-full md:w-1/2">
                <!-- User Information -->
                <p class="text-gray-700"><strong>Name:</strong> {{ $invoice->user->name }}</p>
                <p class="text-gray-700"><strong>Phone:</strong> {{ $invoice->user->phone }}</p>

                <!-- Invoice Status -->
                <p class="text-gray-700"><strong>Status:</strong> <span class="text-green-600">{{ ucfirst($invoice->status) }}</span></p>
            </div>

            <!-- Right Section (Order ID, Date, Shipping Address) -->
            <div class="space-y-4 text-right w-full md:w-1/2">
                <!-- Invoice Number -->
                <p class="text-gray-700"><strong>Invoice: INV-</strong> {{ $invoice->invoice_number }}</p>

                <!-- Order ID -->
                <p class="text-gray-700">
                    <strong>Order ID:</strong>
                    @if ($invoice->order->id)
                        {{ $invoice->order->id }}
                    @else
                        <span class="text-red-500">No order associated</span>
                    @endif
                </p>

                <!-- Order Date -->
                <p class="text-gray-700"><strong>Order Date:</strong> {{ $invoice->created_at->format('d M, Y') }}</p>

                <!-- Shipping Address -->
                <p class="text-gray-700"><strong>Shipping Address:</strong> {{ $invoice->order->shipping_address }}</p>
            </div>

        </div>

        <!-- Products Section -->
        <h3 class="text-xl font-bold mt-8 mb-4">Products</h3>

        <!-- Products Table -->
        <table class="w-full border-collapse border border-gray-300 mt-3">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Product</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->invoiceProducts as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->qty }}</td>
                        <td class="border border-gray-300 px-4 py-2">BDT {{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Amount -->
        <h2 class="text-gray-700 mt-4 text-right pr-48"><strong>Total Amount: BDT {{ number_format($invoice->total_amount, 2) }}</strong></h2>

        <!-- Back to Home Button -->
        <div class="text-center mt-6">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">Back to Home</a>
        </div>

    </div>


</div>
<div class="text-center mt-6">
    <a href="{{ route('invoice.download', $invoice->id) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
        Download Invoice (PDF)
    </a>
</div>
