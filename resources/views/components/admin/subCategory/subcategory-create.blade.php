<div class="max-w-2xl mx-auto mt-2">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Sub Category Create</h1>
            <a href="{{ route('subcategory-list') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-gray-200 px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform hover:text-white hover:font-bold ">
                ↩️ back sub category list
            </a>
        </div>
        <form action="{{ route('subcategory-store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf


            <!-- Category (Select) -->
            <div class="flex flex-col">
                <label for="category_id" class="mb-2 text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                    required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Sub-Category Name -->
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-sm font-medium text-gray-700">Sub-Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                    required>
            </div>

            <!-- Sub-Category Image -->
            <div class="flex flex-col">
                <label for="img_url" class="mb-2 text-sm font-medium text-gray-700">Sub-Category Image</label>
                <input type="file" id="img_url" name="img_url" accept="image/*"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                <div class="mt-3">
                    <img id="img_urlPreview" src="" alt="Image Preview"
                        class="hidden w-40 h-40 object-cover border border-gray-300 rounded-xl">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Create Sub-Category
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
