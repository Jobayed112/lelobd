<div class="max-w-2xl mx-auto mt-2">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Update Category</h1>
            <a href="{{ route('category-list') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-gray-200 px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform hover:text-white hover:font-bold">
                ↩️ Back to Category List
            </a>
        </div>

        <!-- Category Form -->
        <form action="{{ route('category-update', $category->id) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                    placeholder="Enter category name" required>
            </div>

            <!-- Category Image -->

              <div class="flex flex-col">
                <label for="img_url" class="mb-2 text-sm font-medium text-gray-700">Category Image</label>
                <input type="file" id="img_url" name="img_url" accept="image/*"
                    class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                <div class="mt-3">
                    @if ($category->img_url)
                        <img id="img_urlPreview" src="{{ asset($category->img_url) }}" alt="Image Preview"
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
                    Create Category
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Image Preview Script -->
<script>
    const imgInput = document.getElementById('img_url');
    const imgPreview = document.getElementById('img_urlPreview');

    imgInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
