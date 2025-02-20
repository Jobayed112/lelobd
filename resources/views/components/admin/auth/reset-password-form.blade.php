<!-- resources/views/pages/auth/reset-password-form.blade.php -->
<div class="container mx-auto px-6 py-12">
    <!-- Reset Password Section -->
    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-300 max-w-lg mx-auto">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Reset Password</h1>

        <p class="text-gray-600 text-center mb-6">Enter a new password for your account.</p>

        <!-- Form -->
        <form action="{{ route('admin.reset.password') }}" method="POST">
            @csrf
            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your new password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
