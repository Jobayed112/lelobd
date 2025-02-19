<div class="max-w-6xl mx-auto ">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <div class="flex justify-between items-center gap-2 mb-4 flex-wrap">
            <h1 class="text-3xl font-bold text-gray-800 w-full sm:w-auto">Category List</h1>
            <a href="{{ route('category-create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition mt-2 sm:mt-0">
                + Create Category
            </a>
        </div>

        <!-- Table container with horizontal scroll on small screens -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Sub-Name</th>
                        <th class="py-3 px-6 text-left">Image</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                @foreach($categories as $category)
                <tbody class="text-gray-800">
                    <tr class="border-b">
                        <td class="py-4 px-6">{{ $category->id }}</td>
                        <td class="py-4 px-6">{{ $category->name }}</td>
                        <td class="py-4 px-6">
                            @foreach ($category->subcategories as $subcategory)
                            {{ $subcategory->name }},
                            @endforeach
                        </td>
                        <td class="py-4 px-6">
                            <img src="{{ asset($category->img_url) }}" alt="{{ $category->name }}" class="w-24 h-20 object-cover rounded-lg">
                        </td>

                        <td class="py-4 px-6">
                            <a href="{{ route('category-edit', $category->id) }}"  class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a> |
                            <a href="{{ route('category-delete', $category->id) }}"  class="text-red-600 hover:text-red-800 font-semibold"
                                onclick="return confirm('Are you sure you want to delete this Category?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- Pagination buttons -->
        <div class="flex justify-center mt-4 flex-wrap">
            {{-- {{ $categories->links() }} --}}

        </div>
    </div>
</div>
