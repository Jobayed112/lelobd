<!-- Forgot Password Page -->
<div class="m-4  flex items-center justify-center px-4">
    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg border border-gray-300 w-full sm:w-96">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-4 text-center">Forgot Password?</h1>

        <p class="text-gray-600 text-center mb-4 text-sm sm:text-base">
            Enter your email address, and we’ll send you a link to reset your password.
        </p>

        <!-- Form -->
        <form action="{{ route('user.reset') }}" method="POST">
            @csrf
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Send Reset Link
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600 mt-3">
            Remembered your password?
            <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>
