<!-- Reset Password Form -->
<div class="m-4 flex items-center justify-center px-4">
    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg border border-gray-300 w-full sm:w-96">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-6 text-center">Reset Password</h1>

        <p class="text-gray-600 text-center mb-4 text-sm sm:text-base">
            Enter a new password for your account.
        </p>

        <!-- Form -->
        <form action="{{ route('reset.password') }}" method="POST">
            @csrf
            <!-- New Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your new password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    placeholder="Confirm your password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
