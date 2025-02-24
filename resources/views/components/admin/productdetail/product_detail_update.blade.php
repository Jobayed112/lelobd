<div class="max-w-5xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl font-extrabold text-blue-800">Update Product Details</h2>
            <a href="{{ route('product.detail.list') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-700 transition">
                ↩️ Back to Details List
            </a>
        </div>

        <form action="{{ route('product.detail.update', $productdetails->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-3 gap-4">
            @csrf


            <!-- Product Selection -->
            <div class="flex flex-col">
                <label for="product_id" class="mb-1 text-sm font-medium text-gray-700">Product</label>
                <select id="product_id" name="product_id" class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800" required>
                    <option value="{{ $productdetails->product_id }}" selected>{{ $productdetails->product_id . ' - ' . $productdetails->product->name }}</option>
                    @foreach ($productdetails->product->all() as $product)
                        <option value="{{ $product->id }}">{{ $product->id . ' - ' . $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Brand -->
            <div class="flex flex-col">
                <label for="brand" class="mb-1 text-sm font-medium text-gray-700">Brand</label>
                <input type="text" id="brand" name="brand" value="{{ old('brand', $productdetails->brand) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Size -->
            <div class="flex flex-col">
                <label for="size" class="mb-1 text-sm font-medium text-gray-700">Size</label>
                <input type="text" id="size" name="size" value="{{ old('size', $productdetails->size) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Color -->
            <div class="flex flex-col">
                <label for="color" class="mb-1 text-sm font-medium text-gray-700">Color</label>
                <input type="text" id="color" name="color" value="{{ old('color', $productdetails->color) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-red-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Material -->
            <div class="flex flex-col">
                <label for="material" class="mb-1 text-sm font-medium text-gray-700">Material</label>
                <input type="text" id="material" name="material" value="{{ old('material', $productdetails->material) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-800" required>
            </div>

            <!-- Submit Button -->
            <div class="col-span-3 flex justify-center mt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Update Details
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Ensure form validation before submission
    document.querySelector("form").addEventListener("submit", function(event) {
        let brand = document.getElementById("brand").value.trim();
        let size = document.getElementById("size").value.trim();
        let color = document.getElementById("color").value.trim();
        let material = document.getElementById("material").value.trim();

        if (!brand || !size || !color || !material) {
            event.preventDefault();
            alert("All fields are required!");
        }
    });
</script>
