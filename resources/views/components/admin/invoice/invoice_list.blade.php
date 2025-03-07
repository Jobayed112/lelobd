<div class="bg-gradient-to-br from-purple-100 to-blue-100 min-h-screen m-2">
    <div class="container mx-auto bg-white rounded-xl shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 flex-wrap">
            <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Invoice List</h1>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                        <th class="px-5 py-4">Invoice ID</th>
                        <th class="px-5 py-4">User</th>
                        <th class="px-5 py-4">Total Amount</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Created At</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($invoices as $invoice)
                        <tr class="hover:bg-blue-50">
                            <td class="px-5 py-4">{{ $invoice->id }}</td>
                            <td class="px-5 py-4">{{ $invoice->user->name }}</td>
                            <td class="px-5 py-4">${{ number_format($invoice->total_amount, 2) }}</td>
                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-xl text-white
                                    {{ $invoice->status == 'Pending' ? 'bg-yellow-500' : ($invoice->status == 'Processing' ? 'bg-blue-500' : 'bg-green-500') }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                            <td class="px-5 py-4">{{ $invoice->created_at->format('d/m/Y') }}</td>
                            <td class="px-5 py-4 space-x-3">
                                <a href="{{ route('invoice.show', $invoice->id) }}" class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('invoice.delete', $invoice->id) }}" class="text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this invoice?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="flex justify-center mt-6">
            {{ $invoices->links() }} <!-- Pagination links -->
        </div> --}}
    </div>
</div>
