@if (Auth::user())
    <div class="container mx-auto m-4">
        <!-- Navigation Header -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-6">
            <div class="tabs grid grid-cols-3 sm:justify-start sm:space-x-4">
                <!-- Tab Buttons -->
                <button
                    class="tab-button text-lg font-semibold text-gray-700 hover:text-green-600 p-2 w-full sm:w-auto text-center"
                    onclick="showTab('profile')">
                    Profile
                </button>
                <button
                    class="tab-button text-lg font-semibold text-gray-700 hover:text-green-600 p-2 w-full sm:w-auto text-center"
                    onclick="showTab('orders')">
                    Order Details
                </button>
                <button
                    class="tab-button text-lg font-semibold text-gray-700 hover:text-green-600 p-2 w-full sm:w-auto text-center"
                    onclick="showTab('invoice')">
                    Invoice
                </button>

            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content bg-white p-3 rounded-lg shadow-lg border border-gray-300">
            <!-- Order Details Tab -->
            <div id="orders" class="tab-panel hidden">

                <div class="container mx-auto bg-white rounded-xl shadow-xl p-2">
                    <div class="flex justify-between items-center mb-6 flex-wrap">
                        <h1 class="text-4xl font-extrabold text-gray-800 w-full sm:w-auto">Order List</h1>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700 border border-gray-300 rounded-xl shadow">
                            <thead>
                                <tr class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                                    <th class="px-5 py-4">Order ID</th>
                                    <th class="px-5 py-4">User</th>
                                    <th class="px-5 py-4">Phone</th>
                                    <th class="px-5 py-4">Total Price</th>
                                    <th class="px-5 py-4">Status</th>
                                    <th class="px-5 py-4">Shipping Address</th>

                                    <th class="px-5 py-4">Action</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-blue-50">
                                        <td class="px-5 py-4">{{ $order->id }}</td>
                                        <td class="px-5 py-4">{{ $order->user->name }}</td>
                                        <td class="px-5 py-4">
                                            {{ $order->phone ?? $order->user->phone }}
                                        </td>
                                        <td class="px-5 py-4">${{ number_format($order->total_price, 2) }}</td>
                                        <td class="px-5 py-4">
                                            <span
                                                class="px-3 py-1 rounded-xl text-white
                                                    {{ $order->status == 'pending' ? 'bg-yellow-500' : ($order->status == 'confirmed' ? 'bg-green-500' : 'bg-red-500') }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4">{{ $order->shipping_address }}</td>
                                        <td class="px-5 py-4">
                                            @if ($order->status == 'pending')
                                                <a href="{{ route('user.order.delete', $order->id) }}"
                                                    class="text-red-600 hover:underline"
                                                    onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                                            @else
                                                <span class="text-gray-500">Not Allowed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="flex justify-center mt-6">
                            {{ $orders->links() }}
                        </div> --}}
                </div>
            </div>

            <!-- Profile Tab -->
            <div id="profile" class="tab-panel hidden">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Profile</h2>
                <!-- Profile Content -->
                <!-- Profile Info -->
                <div class="flex items-center mb-8">
                    <img src="{{ asset('images/user.webp') }}" alt="User Profile Picture"
                        class="w-20 h-20 rounded-full object-cover mr-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">{{ strtoupper(Auth::user()->name) }}</h2>
                        <p class="text-gray-600">{{ strtolower(Auth::user()->email) }}</p>
                        <p class="text-gray-600">{{ strtoupper(Auth::user()->created_at) }}</p>
                    </div>
                </div>

                <!-- Edit Profile Section -->
                <div class="border-t border-gray-300 mt-8 pt-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Profile</h3>
                    <form action=" {{ route('user.profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                value="{{ strtoupper(Auth::user()->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email
                                Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                value="{{ strtolower(Auth::user()->email) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone
                                Number</label>
                            <input type="text" id="phone" name="phone"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                value="{{ strtoupper(Auth::user()->phone) }}" required>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 w-full">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Section -->
                <div class="border-t border-gray-300 mt-8 pt-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Change Password</h3>
                    <form action="{{ route('user.password.change') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="current-password" class="block text-sm font-medium text-gray-700">Current
                                Password</label>
                            <input type="password" id="current-password" name="current-password"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="new-password" class="block text-sm font-medium text-gray-700">New
                                Password</label>
                            <input type="password" id="new-password" name="new-password"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                                New
                                Password</label>
                            <input type="password" id="confirm-password" name="confirm-password"
                                class="w-full px-4 py-2 border rounded-lg mt-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                                required>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 w-full">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Invoice Tab -->
            <div id="invoice" class="tab-panel hidden">
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
                                        <span
                                            class="px-3 py-1 rounded-xl text-white
                                                    {{ $invoice->status == 'Pending' ? 'bg-yellow-500' : ($invoice->status == 'Processing' ? 'bg-blue-500' : 'bg-green-500') }}">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4">{{ $invoice->created_at->format('d/m/Y') }}</td>
                                    <td class="px-5 py-4 space-x-3">
                                        <a href="{{ route('invoice.download', $invoice->id) }}"
                                            class="text-blue-600 hover:underline">Download</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>



    </div>
@endif


<script>
    // Function to display the appropriate tab
    function showTab(tabName) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab-panel');
        tabs.forEach(tab => {
            tab.classList.add('hidden');
        });

        // Show the selected tab
        const activeTab = document.getElementById(tabName);
        activeTab.classList.remove('hidden');
    }

    // By default, show the Profile tab
    showTab('profile');
</script>
