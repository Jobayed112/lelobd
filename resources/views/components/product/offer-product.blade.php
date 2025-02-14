<section class=" container bg-white mx-auto m-2 pb-3  ">
    <div class="container mx-auto px-2">
      <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Special Offers</h2>

      <!-- Grid: Mobile devices show 2 columns, md: 3 columns, lg: 4 columns -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
        <!-- Product 1 -->
        @foreach ($products as $product )

        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
          <div class="w-full bg-gray-100 rounded-t-lg overflow-hidden">
            <a href="#">
              <img class="w-full h-60 object-cover transition-transform duration-300 hover:scale-105"
              src="{{ asset($product->img_url) }}" alt="{{ $product->name }}">
            </a>
          </div>
          <div class="p-2 text-center">
            <a href="#" class="text-sm font-semibold text-gray-800 hover:text-indigo-600 hover:underline">
              Product Name 1
            </a>
            <p class="mt-1 text-sm text-green-500 font-medium">In Stock</p>
            <div class="mt-1">
              <span class="text-lg font-bold text-green-500">BDT: 1000.00</span>
              <span class="text-gray-500 line-through ml-2">BDT: 1500.00</span>
            </div>
            <a href="#" class="mt-2 inline-block px-2 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-all duration-300">
              Buy Now
            </a>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Static Pagination (for demonstration) -->
      <div class="mt-4 flex justify-center">
        <div class="pagination">
          <a href="#" class="px-3 py-1 border border-gray-300 rounded-l hover:bg-gray-200">Previous</a>
          <a href="#" class="px-3 py-1 border-t border-b border-gray-300 hover:bg-gray-200">1</a>
          <a href="#" class="px-3 py-1 border border-gray-300 hover:bg-gray-200">2</a>
          <a href="#" class="px-3 py-1 border-t border-b border-gray-300 hover:bg-gray-200">3</a>
          <a href="#" class="px-3 py-1 border border-gray-300 rounded-r hover:bg-gray-200">Next</a>
        </div>
      </div>
    </div>
  </section>
