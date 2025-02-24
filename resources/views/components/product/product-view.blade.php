<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        <div class="w-full h-full">
            <img id="mainImage" src="{{ asset($productView->images->last()->img_url) }}" alt="{{ $productView->name }}"
                class="w-full h-[350px] object-cover rounded-lg">

            <div class="grid grid-cols-4 gap-4 rounded-md bg-gray-200 mt-4">
                @foreach ($productView->images->reverse()->take(4) as $image)
                    <img src="{{ asset($image->img_url) }}" alt="{{ $productView->name }}"
                        class="w-16 m-2 ring-2 h-16 object-cover rounded-lg cursor-pointer hover:ring-2 hover:ring-green-600"
                        onclick="changeMainImage(this)">
                @endforeach
            </div>
        </div>

        <div class="bg-white p-6 border rounded-lg shadow">
            <h1 class="text-xl font-bold text-gray-800 mb-4">Product <strong> {{ ' ' . $productView->name }}</strong></h1>
            <div class="flex items-center mb-4">
                <ul class="flex text-yellow-500 text-[15px]">
                    @for ($i = 1; $i <= 5; $i++)
                        <li><i class="fa {{ $i <= $productView->rating ? 'fa-star' : 'fa-star-o' }}"></i></li>
                    @endfor
                </ul>
                <span class="ml-2 text-gray-600 text-[15px]">({{ $productView->review_count }} reviews)</span>
            </div>
            <div class="text-xl font-bold text-green-600 mb-4">
                BDT {{ number_format($productView->price, 2) }}
                @if ($productView->discount_price)
                    <span class="text-gray-500 line-through text-[15px]">BDT
                        {{ number_format($productView->original_price, 2) }}</span>
                @endif
            </div>
            <p class="text-[15px] text-gray-700 mb-4">{{ $productView->description }}</p>

            <div class="mb-6">
                <h3 class="text-[15px] font-semibold mb-2">Select Size: Optional </h3>
                <div class="flex space-x-2">
                    @foreach (['S', 'M', 'L', 'XL'] as $size)
                        <button
                            class="border px-2 py-1 text-[15px] rounded-lg hover:border-green-600 transition">{{ $size }}</button>
                    @endforeach
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-[15px] font-semibold mb-2">Quantity:</h3>
                <div class="flex items-center">
                    <button class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-l-lg text-[15px]"
                        onclick="changeQuantity(-1)">-</button>
                    <input id="quantityInput" type="number" value="1" min="1"
                        class="w-8 text-center border-t border-b border-gray-300 text-[15px]">
                    <button class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded-r-lg text-[15px]"
                        onclick="changeQuantity(1)">+</button>
                </div>
            </div>

                <div class="flex items-center space-x-4">
                    <form action="{{ route('cart.add', $productView->id) }}" method="POST" class="inline-block">

                        @csrf
                        <button type="submit"
                            class="bg-green-500 text-white text-[15px] px-4 py-2 hover:bg-green-600 hover:ring-4 rounded transition">
                            Add to Cart
                        </button>
                    </form>
                    <a href="{{ url('product.buy',$productView->id )}}">
                        <button
                            class="bg-blue-500 text-white text-[15px] px-4 py-2 hover:bg-blue-600 hover:ring-4 rounded transition">Buy
                            Now</button>
                    </a>
                </div>

        </div>

        <div class="bg-white border rounded-lg p-2 shadow">

            <ul class="list-disc pl-6 text-[15px] text-gray-700">
                @if (isset($productDetail))

                    <li>Material: {{ $productDetail->material }}</li>
                    <li>Available Sizes: {{ $productDetail->size }}</li>
                    <li>Color Options: {{ $productDetail->color }}</li>
                    <li>Brand: {{ $productDetail->brand }}</li>
                @else
                    <li>product list is not shoig</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<script>
    function changeMainImage(element) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = element.src;
    }

    function changeQuantity(amount) {
        const quantityInput = document.getElementById('quantityInput');
        let currentValue = parseInt(quantityInput.value) || 1;
        const newValue = currentValue + amount;
        if (newValue >= 1) {
            quantityInput.value = newValue;
        }
    }
</script>
