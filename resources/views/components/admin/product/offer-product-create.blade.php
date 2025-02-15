<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Create Offer</h2>

    <form action="{{ route('offer.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Offer Title</label>
            <input type="text" id="title" name="title" placeholder="Enter offer title"
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" placeholder="Enter offer description"
                      class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="discount" class="block text-gray-700">Discount (%)</label>
            <input type="number" id="discount" name="discount" placeholder="Enter discount percentage"
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" id="start_date" name="start_date"
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" id="end_date" name="end_date"
                   class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>

        <div class="mb-4 text-center">
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition duration-300">
                Create Offer
            </button>
        </div>
    </form>
</div>
