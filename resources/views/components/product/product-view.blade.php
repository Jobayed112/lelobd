<div class="container mx-auto px-4 py-8">
    <!-- Product Details Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        <!-- Image Gallery -->
        <div class="w-full h-full">
            <!-- Main Image -->
            <img id="mainImage" src="{{ asset($product->images->first()->img_url) }}" alt="{{ $product->name }}" class="w-full rounded-lg">

            <!-- Thumbnail Images -->
            <div class="grid grid-cols-4 gap-4 mt-4">
                @foreach ($product->images as $image)
                    <img src="{{ asset($image->img_url) }}" alt="{{ $product->name }}" class="w-full h-20 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600" onclick="changeMainImage(this)">
                @endforeach
            </div>
        </div>

        <!-- Product Information -->
        <div class="bg-white p-6 border rounded-lg shadow">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
            <div class="flex items-center mb-4">
                <ul class="flex text-yellow-500 text-sm">
                    @for ($i = 1; $i <= 5; $i++)
                        <li><i class="fa {{ $i <= $product->rating ? 'fa-star' : 'fa-star-o' }}"></i></li>
                    @endfor
                </ul>
                <span class="ml-2 text-gray-600">({{ $product->review_count }} reviews)</span>
            </div>
            <div class="text-3xl font-bold text-green-600 mb-4">
                ${{ $product->price }}
                @if($product->discount_price)
                    <span class="text-gray-500 line-through text-lg">${{ $product->original_price }}</span>
                @endif
            </div>
            <p class="text-gray-700 mb-4">{{ $product->description }}</p>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Select Size:</h3>
                <div class="flex space-x-4">
                    @foreach (['S', 'M', 'L', 'XL'] as $size)
                        <button class="border px-4 py-2 rounded-lg hover:border-green-600 transition">{{ $size }}</button>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Quantity:</h3>
                <div class="flex items-center">
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-l-lg" onclick="changeQuantity(-1)">-</button>
                    <input id="quantityInput" type="number" value="1" min="1" class="w-12 text-center border-t border-b border-gray-300">
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-r-lg" onclick="changeQuantity(1)">+</button>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('cart-add', $product->id) }}">
                    <button class="bg-green-500 text-white px-6 py-3 hover:bg-green-600 hover:ring-4 rounded transition">Add to Cart</button>
                </a>
                <a href="{{ url('product-buy', $product->id) }}">
                    <button class="bg-blue-500 text-white px-6 py-3 hover:bg-blue-600 hover:ring-4 rounded transition">Buy Now</button>
                </a>
            </div>
        </div>

        <!-- Product Details -->
        <div class="bg-white border rounded-lg p-2 shadow">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Product Details</h2>
            <ul class="list-disc pl-6 text-gray-700">
                <li>Material: {{ $product->material }}</li>
                <li>Available Sizes: {{ $product->size}}</li>
                <li>Color Options: {{ $product->color }}</li>
                <li>Care Instructions: {{ $product->care_instructions }}</li>
            </ul>
        </div>
    </div>
</div>

<script>
    // Change the main image when clicking on a thumbnail
    function changeMainImage(element) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = element.src;
    }

    // Increase or decrease quantity
    function changeQuantity(amount) {
        const quantityInput = document.getElementById('quantityInput');
        let currentValue = parseInt(quantityInput.value) || 1;
        const newValue = currentValue + amount;
        if (newValue >= 1) {
            quantityInput.value = newValue;
        }
    }
</script>
