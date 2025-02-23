<div class="py-8 bg-gray-50">
    <div class="container mx-auto bg-white rounded-lg shadow-lg p-4 sm:p-6">
        <h1 class="text-2xl sm:text-3xl font-semibold mb-4 text-center text-indigo-700">Top Categories</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 sm:gap-8 ">
            @foreach ($categories as $category)
                <div class="text-center ring-1 hover:ring-4 bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300">
                    <a href="{{ route('category.products', ['name' => $category->name]) }}" class="block">
                        <img src="{{ asset($category->img_url ?? 'images/no-image.png') }}"
                            class="w-20 h-20 sm:w-28 sm:h-28 object-cover rounded-full mx-auto shadow-lg border  border-indigo-200 bg-blue-100 p-2 transition-all duration-300 hover:scale-105"
                            alt="{{ $category->name }}">
                    </a>
                    <p class="mt-2 text-sm sm:text-lg font-medium text-gray-800">{{ $category->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
