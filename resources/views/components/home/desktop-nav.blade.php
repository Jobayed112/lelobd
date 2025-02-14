<nav class="hidden md:flex space-x-6 text-gray-700">
    <a href="{{ url('/') }}" class="hover:text-green-500">Home</a>
    <ul class="relative group">
        <li class="relative">
            <button class="hover:text-green-500 flex items-center">Categories <i class="fa fa-chevron-down ml-1"></i></button>
            <ul class="hidden group-hover:block bg-white shadow-md rounded mt-2 w-48 absolute">
                @foreach ($categories as $category)
                    <li class="relative group">
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-200">{{ $category->name }} <i class="fa fa-chevron-right ml-auto"></i></a>
                        <ul class="hidden group-hover:block bg-white shadow-md rounded absolute left-full top-0 w-48">
                            @foreach ($category->subcategories as $subcategory)
                                <li><a href="{{ url('subcategory/'.$subcategory->id) }}" class="block px-4 py-2 hover:bg-gray-200">{{ $subcategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav>
