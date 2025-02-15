
<div class="container mx-auto p-6 bg-gray-50">
    <h2 class="text-3xl font-bold mb-6 text-center text-indigo-700">Offer List</h2>

    <!-- Responsive Table Wrapper -->
    <div class="overflow-x-auto">
        <!-- Offer Table -->
        <table class="min-w-full table-auto bg-white shadow-lg rounded-lg border border-gray-300">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Offer Title</th>
                    <th class="py-2 px-4 border-b border-gray-300">Description</th>
                    <th class="py-2 px-4 border-b border-gray-300">Discount</th>
                    <th class="py-2 px-4 border-b border-gray-300">Start Date</th>
                    <th class="py-2 px-4 border-b border-gray-300">End Date</th>
                    <th class="py-2 px-4 border-b border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr class="border-t border-b hover:bg-gray-100">
                        <td class="py-2 px-4 border-r border-gray-300">{{ $offer->title }}</td>
                        <td class="py-2 px-4 border-r border-gray-300">{{ $offer->description }}</td>
                        <td class="py-2 px-4 border-r border-gray-300">{{ $offer->discount }}%</td>
                        <td class="py-2 px-4 border-r border-gray-300">{{ $offer->start_date->format('M d, Y') }}</td>
                        <td class="py-2 px-4 border-r border-gray-300">{{ $offer->end_date->format('M d, Y') }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('offer.edit', $offer->id) }}"
                               class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('offer.delete', $offer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
