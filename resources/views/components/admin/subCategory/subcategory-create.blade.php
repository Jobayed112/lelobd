<div class="bg-gray-100">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Create Subcategory</h1>
            <a href="{{ route('subcategory-list') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                Back to Subcategories
            </a>
        </div>

        <!-- Subcategory Create Form -->
        <form action="{{ route('subcategory-store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <!-- Parent Category -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="category_id" class="text-gray-700 font-semibold sm:w-1/4">Parent Category</label>
                    <select id="category_id" name="category_id" class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Subcategory Name -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="name" class="text-gray-700 font-semibold sm:w-1/4">Subcategory Name</label>
                    <input type="text" id="name" name="name" class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">Create Subcategory</button>
            </div>
        </form>
    </div>
</div>
