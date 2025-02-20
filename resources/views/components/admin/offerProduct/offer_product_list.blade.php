<div class="max-w-6xl mx-auto">
    <div class="bg-gradient-to-br from-blue-50 to-purple-50 shadow-xl rounded-3xl p-6 border border-gray-300">
        <div class="flex justify-between items-center gap-2 mb-4 flex-wrap">
            <h1 class="text-3xl font-bold text-gray-800 w-full sm:w-auto">Offer Products List</h1>
            <a href="{{ route('offer.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition mt-2 sm:mt-0">
                + Create Offer
            </a>
        </div>

        <!-- Table container with horizontal scroll on small screens -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-xl shadow-lg">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Offer Name</th>
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-left">Discount (%)</th>
                        <th class="py-3 px-6 text-left">Start Date</th>
                        <th class="py-3 px-6 text-left">End Date</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                @foreach($offerList as $offer)
                <tbody class="text-gray-800">
                    <tr class="border-b">
                        <td class="py-4 px-6">{{ $offer->offer_name }}</td>
                        <td class="py-4 px-6">{{ $offer->product->name }}</td>
                        <td class="py-4 px-6">{{ $offer->discount }}%</td>
                        <td class="py-4 px-6">{{ $offer->start_date->format('d-m-Y') }}</td>
                        <td class="py-4 px-6">{{ $offer->end_date->format('d-m-Y') }}</td>
                        <td class="py-4 px-6">
                            <span class="inline-block py-1 px-3 text-xs font-medium rounded-full
                                {{ $offer->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($offer->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{ route('offer.edit', $offer->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a> |
                            <a href="{{ route('offer.delete', $offer->id) }}" class="text-red-600 hover:text-red-800 font-semibold"
                                onclick="return confirm('Are you sure you want to delete this offer?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- Pagination buttons -->
        <div class="flex justify-center mt-4 flex-wrap">
            {{-- {{ $offerList->links() }} --}}
        </div>
    </div>
</div>
