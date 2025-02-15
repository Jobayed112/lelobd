<form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-4">
        <!-- Category -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="category_id" class="text-gray-700 font-semibold sm:w-1/4">Category</label>
            <select id="category_id" name="category_id"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sub Category -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="sub_category_id" class="text-gray-700 font-semibold sm:w-1/4">Sub Category</label>
            <select id="sub_category_id" name="sub_category_id"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
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
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="name" class="text-gray-700 font-semibold sm:w-1/4">Product Name</label>
            <input type="text" id="name" name="name"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg" value="{{ old('name', $product->name) }}"
                required>
        </div>

        <!-- Description -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="description" class="text-gray-700 font-semibold sm:w-1/4">Description</label>
            <textarea id="description" name="description" rows="4"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Quantity -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="quantity" class="text-gray-700 font-semibold sm:w-1/4">Quantity</label>
            <input type="number" id="quantity" name="quantity"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg"
                value="{{ old('quantity', $product->quantity) }}" required>
        </div>

        <!-- Price -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="price" class="text-gray-700 font-semibold sm:w-1/4">Price</label>
            <input type="number" id="price" name="price"
                class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg"
                value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Type -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="type" class="text-gray-700 font-semibold sm:w-1/4">Product Type</label>
            <select id="type" name="type" class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg">
                <option value="popular" {{ $product->type == 'popular' ? 'selected' : '' }}>Popular</option>
                <option value="new" {{ $product->type == 'new' ? 'selected' : '' }}>New</option>
                <option value="top" {{ $product->type == 'top' ? 'selected' : '' }}>Top</option>
                <option value="special" {{ $product->type == 'special' ? 'selected' : '' }}>Special</option>
            </select>
        </div>

        <!-- Stock Status -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
            <label for="stock" class="text-gray-700 font-semibold sm:w-1/4">Stock Status</label>
            <select id="stock" name="stock" class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg">
                <option value="instock" {{ $product->stock == 'instock' ? 'selected' : '' }}>In Stock</option>
                <option value="unavailable" {{ $product->stock == 'unavailable' ? 'selected' : '' }}>Unavailable
                </option>
            </select>
        </div>

       <!-- Image Upload and Preview -->
       <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 mt-6">
        <div class="flex flex-col sm:w-1/2">
            <label for="img_url" class="text-gray-700 font-semibold">Product Image</label>
            <input type="file" id="img_url" name="img_url" accept="image/*"
                class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col sm:w-1/2">
            <label class="text-gray-700 font-semibold">Image Preview</label>
            <div class="mt-2">
                <img id="img_urlPreview" src="" alt="Image Preview"
                    class="hidden w-[30%] h-[30%] object-cover border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

        <!-- Submit Button -->
        <div class="mt-6 flex justify-center">
            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">Update
                Product</button>
        </div>
    </div>
</form>

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
