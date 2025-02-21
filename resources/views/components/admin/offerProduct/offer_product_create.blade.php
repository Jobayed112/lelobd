<div class="max-w-2xl mx-auto mt-10">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Create Product Offer</h1>
            <a href="{{ route('offer.list') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-gray-200 px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-transform hover:text-white hover:font-bold ">
                ↩️ Back to Offers
            </a>
        </div>

        <form action="{{ route('offer.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- 3x3 Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-5">

                <!-- Product -->
                <div class="flex flex-col">
                    <label for="product_id" class="mb-2 text-sm font-medium text-gray-700">Product</label>
                    <select id="product_id" name="product_id"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                        required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Offer Name -->
                <div class="flex flex-col">
                    <label for="offer_name" class="mb-2 text-sm font-medium text-gray-700">Offer Name</label>
                    <input type="text" id="offer_name" name="offer_name" value="{{ old('offer_name') }}"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-800"
                        required>
                </div>

                <!-- Discount -->
                <div class="flex flex-col">
                    <label for="discount" class="mb-2 text-sm font-medium text-gray-700">Discount (%)</label>
                    <input type="number" id="discount" name="discount" value="{{ old('discount') }}" step="0.01" min="0"
                        max="100"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800"
                        required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-5">
                <!-- Start Date -->
                <div class="flex flex-col">
                    <label for="start_date" class="mb-2 text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-800"
                        required>
                </div>

                <!-- End Date -->
                <div class="flex flex-col">
                    <label for="end_date" class="mb-2 text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-800"
                        required>
                </div>

                <!-- Status -->
                <div class="flex flex-col">
                    <label for="status" class="mb-2 text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-yellow-500 focus:outline-none text-gray-800"
                        required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-center">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:opacity-90 transition-all duration-300 transform hover:scale-105">
                    Create Offer
                </button>
            </div>
        </form>
    </div>
</div>
