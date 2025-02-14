<div class="bg-gray-100">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4 flex-wrap">
            <h1 class="text-3xl font-bold text-gray-800 w-full sm:w-auto">Category List</h1>
            <a href="{{ route('category-create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition mt-2 sm:mt-0">
                + Create Category
            </a>
        </div>

        <!-- Table container with horizontal scroll on small screens -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-4 py-3 text-left border-b border-gray-300">ID</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Name</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Sub-Name</th>
                        <th class="px-4 py-3 text-left border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                @foreach($categories as $category)
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-4 py-3 border-b border-gray-200">{{ $category->id }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $category->name }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">
                            @foreach ($category->subcategories as $subcategory)
                                {{ $subcategory->name }},
                            @endforeach
                        </td>
                        <td class="px-4 py-3 border-b border-gray-200">
                            <a href="{{ route('category-edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a> |
                            <a href="{{ route('category-delete', $category->id) }}" class="text-red-500 hover:text-red-700"
                                onclick="return confirm('Are you sure you want to delete this Category?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- Pagination buttons -->
        <div class="flex justify-center mt-4 flex-wrap">
            {{ $categories->links() }}

        </div>
    </div>
</div>
