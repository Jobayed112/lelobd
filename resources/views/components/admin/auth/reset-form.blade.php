<div class="container mx-auto px-4 py-10">
    <!-- Forgot Password Section -->
    <div class="bg-white p-5 rounded-xl shadow-lg border border-gray-300 max-w-lg mx-auto">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Forgot Password?</h1>

        <p class="text-gray-600 text-center mb-3">Enter your email address and we’ll send you a link to reset your
            password.</p>

        <!-- Form -->
        <form action="{{ route('admin.reset.create') }}" method="POST">
            @csrf
            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-5 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email" required>

            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Send Reset
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600 mt-3">
            Remembered your password?
            <a href="{{ route('admin.login.form') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>
