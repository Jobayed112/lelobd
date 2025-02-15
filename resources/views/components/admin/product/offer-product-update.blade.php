<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Edit Offer</h2>

    <form action="{{ route('offer.update', $offer->id) }}" method="POST">
        @csrf
        <!-- You can use @method('PUT') or @method('POST') if you prefer -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Offer Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $offer->title) }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea id="description" name="description" class="w-full p-2 border rounded">{{ old('description', $offer->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="discount" class="block text-gray-700">Discount (%)</label>
            <input type="number" id="discount" name="discount" value="{{ old('discount', $offer->discount) }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $offer->start_date->format('Y-m-d')) }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $offer->end_date->format('Y-m-d')) }}"
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update Offer</button>
        </div>
    </form>
</div>

