<div class="max-w-5xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl font-extrabold text-blue-800">Update Product</h2>
            <a href="{{ route('product-list') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-700 transition">
                ↩️ Back to Products
            </a>
        </div>

        <form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-3 gap-4">
            @csrf

            <!-- Category -->
            <div class="flex flex-col">
                <label for="category_id" class="mb-1 text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sub Category -->
            <div class="flex flex-col">
                <label for="sub_category_id" class="mb-1 text-sm font-medium text-gray-700">Sub Category</label>
                <select id="sub_category_id" name="sub_category_id"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    required>
                    @foreach ($categories as $category)
                        @foreach ($category->subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ old('sub_category_id') == $subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <!-- Product Name -->
            <div class="flex flex-col">
                <label for="name" class="mb-1 text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                    required>
            </div>

            <!-- Description (Takes 3 columns) -->
            <div class="flex flex-col col-span-3">
                <label for="description" class="mb-1 text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none text-gray-800"
                    required>{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Quantity, Price, Product Type, and Stock Status (One line) -->
            <div class="col-span-3 grid grid-cols-4 gap-4">
                <!-- Quantity -->
                <div class="flex flex-col">
                    <label for="quantity" class="mb-1 text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity"
                        value="{{ old('quantity', $product->quantity) }}"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                        required>
                </div>

                <!-- Price -->
                <div class="flex flex-col">
                    <label for="price" class="mb-1 text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800"
                        required>
                </div>

                <!-- Product Type -->
                <div class="flex flex-col">
                    <label for="type" class="mb-1 text-sm font-medium text-gray-700">Product Type</label>
                    <select id="type" name="type"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-pink-500 focus:outline-none text-gray-800"
                        required>
                        <option value="popular">Popular</option>
                        <option value="new">New</option>
                        <option value="top">Top</option>
                        <option value="special">Special</option>
                    </select>
                </div>

                <!-- Stock Status -->
                <div class="flex flex-col">
                    <label for="stock" class="mb-1 text-sm font-medium text-gray-700">Stock Status</label>
                    <select id="stock" name="stock"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-800"
                        required>
                        <option value="instock">In Stock</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
            </div>

            <!-- Image Upload and Preview (One line) -->
            <div class="col-span-3 grid grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="img_url" class="mb-1 text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" id="img_url" name="img_url" accept="image/*"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                </div>
                <div class="flex flex-col">
                    <img id="img_urlPreview" src="" alt="Image Preview"
                        class="hidden w-40 h-40 object-cover border border-gray-300 rounded-xl">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-span-3 flex justify-center mt-4">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    const img_urlInput = document.getElementById('img_url');
    const img_urlPreview = document.getElementById('img_urlPreview');

    img_urlInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img_urlPreview.src = e.target.result;
                img_urlPreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
