<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <h2 class="text-4xl font-extrabold mb-6 text-blue-800 text-center">Update Product</h2>

        <form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf

            <!-- Category -->
            <div class="flex flex-col">
                <label for="category_id" class="mb-2 text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sub Category -->
            <div class="flex flex-col">
                <label for="sub_category_id" class="mb-2 text-sm font-medium text-gray-700">Sub Category</label>
                <select id="sub_category_id" name="sub_category_id"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    required>
                    <option value="">Select Sub Category</option>
                    @foreach ($categories as $category)
                        @foreach ($category->subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}"
                                {{ $subcategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <!-- Product Name -->
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                    required>
            </div>

            <!-- Description -->
            <div class="flex flex-col">
                <label for="description" class="mb-2 text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none text-gray-800"
                    required>{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Quantity -->
            <div class="flex flex-col">
                <label for="quantity" class="mb-2 text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    required>
            </div>

            <!-- Price -->
            <div class="flex flex-col">
                <label for="price" class="mb-2 text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800"
                    required>
            </div>

            <!-- Type -->
            <div class="flex flex-col">
                <label for="type" class="mb-2 text-sm font-medium text-gray-700">Product Type</label>
                <select id="type" name="type"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-pink-500 focus:outline-none text-gray-800"
                    required>
                    <option value="popular" {{ $product->type == 'popular' ? 'selected' : '' }}>Popular</option>
                    <option value="new" {{ $product->type == 'new' ? 'selected' : '' }}>New</option>
                    <option value="top" {{ $product->type == 'top' ? 'selected' : '' }}>Top</option>
                    <option value="special" {{ $product->type == 'special' ? 'selected' : '' }}>Special</option>
                </select>
            </div>

            <!-- Stock Status -->
            <div class="flex flex-col">
                <label for="stock" class="mb-2 text-sm font-medium text-gray-700">Stock Status</label>
                <select id="stock" name="stock"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-800"
                    required>
                    <option value="instock" {{ $product->stock == 'instock' ? 'selected' : '' }}>In Stock</option>
                    <option value="unavailable" {{ $product->stock == 'unavailable' ? 'selected' : '' }}>Unavailable
                    </option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="flex flex-col">
                <label for="img_url" class="mb-2 text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" id="img_url" name="img_url" accept="image/*"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                <div class="mt-3">
                    <img id="img_urlPreview" src="{{ $product->images->isNotEmpty() ? asset($product->images->last()->img_url) : '' }}" alt="{{ $product->name }}"
                    class=" w-40 h-40 object-cover border border-gray-300 rounded-xl">

                </div>
            </div>
            <!-- Submit Button -->
            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Update Product
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
