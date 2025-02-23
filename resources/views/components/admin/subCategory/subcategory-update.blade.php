<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Edit Sub-Category</h1>
            <a href="{{ route('subcategory-list') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-gray-200 px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform hover:text-white hover:font-bold">
                ↩️ Back to Sub-Category List
            </a>
        </div>

        <form action="{{ route('subcategory-update', $subcategory->id) }}" method="POST" class="space-y-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <!-- Category & Subcategory Selection -->
<div class="grid grid-cols-2 gap-6">
    <!-- Category Dropdown -->
    <div class="flex flex-col">
        <label for="category_id" class="mb-2 text-sm font-semibold text-gray-800">Category</label>
        <select id="category_id" name="category_id"
            class="border border-gray-300 bg-white text-gray-800 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-md"
            required>
            <option disabled selected>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Sub-Category Dropdown -->
    <div class="flex flex-col">
        <label for="subcategory_id" class="mb-2 text-sm font-semibold text-gray-800">Sub-Category</label>
        <select id="subcategory_id" name="subcategory_id"
            class="border border-gray-300 bg-white text-gray-800 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none shadow-md"
            required>
            <option disabled selected>Select Subcategory</option>
            @foreach ($categories as $category)
                @foreach ($category->subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" data-category="{{ $category->id }}">
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            @endforeach
        </select>
    </div>
</div>



            <!-- Sub-Category Image -->
            <div class="flex flex-col">
                <label for="img_url" class="mb-2 text-sm font-medium text-gray-700">Sub-Category Image</label>
                <input type="file" id="img_url" name="img_url" accept="image/*"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                <div class="mt-3">
                    @if ($subcategory->img_url)
                        <img id="img_urlPreview" src="{{ asset($subcategory->img_url) }}" alt="Image Preview"
                            class="w-40 h-40 object-cover border border-gray-300 rounded-xl">
                    @else
                        <span>No image available</span>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Update Sub-Category
                </button>
            </div>
        </form>
    </div>
</div>


<!-- JavaScript for Dynamic Subcategory Selection -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categorySelect = document.getElementById("category_id");
        const subcategorySelect = document.getElementById("subcategory_id");

        function updateSubcategories() {
            const selectedCategory = categorySelect.value;
            Array.from(subcategorySelect.options).forEach(option => {
                if (option.value === "") return; // Keep the first option
                option.style.display = option.getAttribute("data-category") === selectedCategory ?
                    "block" : "none";
            });
            const firstVisibleOption = Array.from(subcategorySelect.options).find(option => option.style
                .display === "block");
            if (firstVisibleOption) {
                subcategorySelect.value = firstVisibleOption.value;
            }
        }
        updateSubcategories();
        categorySelect.addEventListener("change", updateSubcategories);
    });




    // !--Image Preview Script-- >

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
