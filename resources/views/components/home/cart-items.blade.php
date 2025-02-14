<div id="cart-menu" class="absolute right-0 mt-4 w-72 bg-gray-100 shadow-lg m-2 rounded-md hidden">
    <h1 class="text-xl font-bold mb-4 text-center">Your Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg max-h-96 overflow-y-auto">
            <table class="min-w-full table-auto text-left">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Qty</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach(session('cart') as $id => $product)
                        @php
                            $total += $product['price'] * $product['quantity'];
                        @endphp
                        <tr>
                            <td class="px-4 py-2 flex items-center space-x-2">
                                <img src="{{ asset('storage/'.$product['image']) }}" alt="{{ $product['name'] }}" class="w-12 h-12 object-cover rounded-md">
                                <span class="ml-2">{{ $product['name'] }}</span>
                            </td>
                            <td class="px-4 py-2 text-center">{{ number_format($product['price'], 2) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" max="99" class="w-12 p-1 border rounded text-center">
                                    <button type="submit" class="ml-2 text-green-500 hover:text-green-700 text-sm">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 text-center">{{ number_format($product['price'] * $product['quantity'], 2) }}</td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center py-4 px-6 bg-gray-100 border-t">
                <span class="font-semibold text-lg">Total: ${{ number_format($total, 2) }}</span>
                <a href="{{ route('checkout') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Checkout</a>
            </div>
        </div>
    @else
        <div class="bg-gray-200 p-4 rounded-lg text-center">
            <p>Your cart is empty.</p>
            <a href="{{ route('home') }}" class="text-green-500 hover:text-green-700">Continue Shopping</a>
        </div>
    @endif
</div>
