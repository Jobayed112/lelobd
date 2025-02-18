<div class="max-w-xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200">
        <h2 class="text-3xl font-extrabold mb-6 text-blue-700">Edit Product</h2>

        <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-5">
            @csrf

            <!-- Product Name -->
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-medium text-gray-700" for="name">Product Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                    placeholder="Enter product name"
                    required
                >
            </div>

            <!-- Product Price -->
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-medium text-gray-700" for="price">Price (USD)</label>
                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                    placeholder="Enter product price"
                    required
                >
            </div>

            <!-- Product Type -->
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-medium text-gray-700" for="type">Type</label>
                <select
                    id="type"
                    name="type"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-purple-500 focus:outline-none text-gray-800"
                    required
                >
                    <option value="new" {{ $product->type == 'new' ? 'selected' : '' }}>New</option>
                    <option value="old" {{ $product->type == 'old' ? 'selected' : '' }}>Old</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105"
            >
                Update Product
            </button>
        </form>
    </div>
</div>
