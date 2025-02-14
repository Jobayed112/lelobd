<div class="bg-gray-100">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Update Category</h1>
            <a href="{{ route('category-list') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                Back to Categories
            </a>
        </div>
        <form action="{{ route('category-update', $category->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                    <label for="name" class="text-gray-700 font-semibold sm:w-1/4">Category Name</label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}" class="w-full sm:w-3/4 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">Update Category</button>
            </div>
        </form>
    </div>
</div>
