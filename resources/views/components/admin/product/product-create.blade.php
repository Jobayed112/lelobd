<div class="bg-gray-100">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Create Product</h1>
            <a href="{{ route('product-list') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                Product List
            </a>
        </div>
        <!-- Product Create Form -->
        <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- sub Category --}}


                <!-- Product Name -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="name" class="text-gray-700 font-semibold sm:w-1/4">Product Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Description -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="description" class="text-gray-700 font-semibold sm:w-1/4">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Quantity -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="quantity" class="text-gray-700 font-semibold sm:w-1/4">Quantity</label>
                    <input type="number" id="quantity" name="quantity"
                        class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Price -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="price" class="text-gray-700 font-semibold sm:w-1/4">Price</label>
                    <input type="number" id="price" name="price"
                        class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Stock Status -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="stock" class="text-gray-700 font-semibold sm:w-1/4">Stock Status</label>
                    <select id="stock" name="stock"
                        class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="instock">In Stock</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>

                <!-- Image Upload and Preview with Flexbox -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 mt-6">
                    <!-- Image Upload -->
                    <div class="flex flex-col sm:w-1/2">
                        <label for="img_url" class="text-gray-700 font-semibold">Product Image</label>
                        <input type="file" id="img_url" name="img_url" accept="image/*"
                            class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Image Preview -->
                    <div class="flex flex-col sm:w-1/2">
                        <label class="text-gray-700 font-semibold">Image Preview</label>
                        <div class="mt-2">
                            <img id="img_urlPreview" src="" alt="Image Preview"
                                class="hidden w-[30%] h-[30%] object-cover border border-gray-300 rounded-lg">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Submit Button -->
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
