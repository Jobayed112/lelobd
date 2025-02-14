<div class="container mx-auto px-4 py-8">
    <!-- Product Details Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3   ">
        <!-- Image Gallery -->
        <div class=" w-full h-full ">
            <div class="">
                <img src="{{ asset('images/pro2.webp') }}" alt="Main Product Image" class="w-full rounded-lg">
                {{-- <span class="absolute top-2 left-2 bg-green-600 text-white text-sm font-medium px-2 py-1 rounded">32% Off</span> --}}
            </div>
            <div class="grid grid-cols-4 gap-4 mt-4">
                <img src="{{ asset('images/pro1.webp') }}" alt="Thumbnail 1"
                    class="w-full h-20 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600">
                <img src="{{ asset('images/pro3.webp') }}" alt="Thumbnail 2"
                    class="w-full h-20 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600">
                <img src="{{ asset('images/pro2.webp') }}" alt="Thumbnail 3"
                    class="w-full h-20 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600">
                <img src="{{ asset('images/pro1.webp') }}" alt="Thumbnail 4"
                    class="w-full h-20 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600">
            </div>
        </div>

        <!-- Product Information -->
        <div class="bg-white p-6 border rounded-lg shadow">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Women's Stylish Top</h1>
            <div class="flex items-center mb-4">
                <ul class="flex text-yellow-500 text-sm">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="far fa-star text-gray-300"></i></li>
                </ul>
                <span class="ml-2 text-gray-600">(120 reviews)</span>
            </div>
            <div class="text-3xl font-bold text-green-600 mb-4">$32.99 <span
                    class="text-gray-500 line-through text-lg">$49.99</span></div>
            <p class="text-gray-700 mb-4">erials, it's perfect for casual outings and special occasions.</p>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Select Size:</h3>
                <div class="flex space-x-4">
                    <button class="border px-4 py-2 rounded-lg hover:border-green-600 transition">S</button>
                    <button class="border px-4 py-2 rounded-lg hover:border-green-600 transition">M</button>
                    <button class="border px-4 py-2 rounded-lg hover:border-green-600 transition">L</button>
                    <button class="border px-4 py-2 rounded-lg hover:border-green-600 transition">XL</button>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Quantity:</h3>
                <div class="flex items-center">
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-l-lg">-</button>
                    <input type="number" value="1" class="w-12 text-center border-t border-b border-gray-300">
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-r-lg">+</button>
                </div>
            </div>

            <div class="flex items-center  space-x-4">
                <a href="{{ url('ProductCartView') }}">
                    <button
                        class="bg-green-500 text-white px-6 py-3  hover:bg-green-600 hover:ring-4 rounded transition">Cart</button>
                </a>
                <a href="{{ url('product-buy') }}">
                    <button
                        class="bg-blue-500 text-gray-800 text-lg  hover:ring-4 rounded px-6 py-3  hover:bg-blue-600 transition">Buy</button>
                </a>

            </div>
        </div>
        {{-- Product Details --}}
        <div class="bg-white border rounded-lg p-2 shadow">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Product Details</h2>
            <p class="text-gray-700 mb-4">This ok and feel great.</p>
            <ul class="list-disc pl-6 text-gray-700">
                <li>Material: 100% Cotton</li>
                <li>Available Sizes: S, M, L, XL</li>
                <li>Color Options: Black, White, Pink, Blue</li>
                <li>Care Instructions: Machine Wash</li>
            </ul>
        </div>
    </div>

    <!-- Product Description -->
</div>
