<div class="bg-gray-100 ">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Edit Product</h1>
        <form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('quantity')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('price')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock Status</label>
                <select name="stock" id="stock" class="w-full px-4 py-2 border border-gray-300 rounded-md"
                    required>
                    <option value="instock" {{ $product->stock == 'instock' ? 'selected' : '' }}>In Stock</option>
                    <option value="unavailable" {{ $product->stock == 'unavailable' ? 'selected' : '' }}>Unavailable
                    </option>
                </select>
                @error('stock')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="img_url" class="block text-gray-700">Product Image</label>
                <input type="file" name="img_url" id="img_url"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md">
                @error('img_url')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="current_image" class="block text-gray-700">Current Image</label>
                <img id="current_image" src="{{ asset($product->img_url) }}" alt="{{ $product->name }}"
                    class="w-32 h-32 object-cover rounded-lg shadow mb-4">
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">Create
                    Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    const img_urlInput = document.getElementById('img_url');
    const current_image = document.getElementById('current_image');

    img_urlInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                current_image.src = e.target.result;
                current_image.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
