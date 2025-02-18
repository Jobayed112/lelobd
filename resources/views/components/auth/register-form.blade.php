<div class="container mx-auto px-4 py-10">
    <!-- Register Section -->
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-300 max-w-lg mx-auto">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-3 text-center">Create Account</h1>

        <p class="text-sm sm:text-base text-gray-600 text-center mb-1">Create an account to get started.</p>

        <!-- Form -->
        <form action="{{ Route('register') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-1">
                <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your full name" required>

            </div>

            <!-- Email Address -->
            <div class="mb-1">
                <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-1">
                <label for="phone" class="block text-xs sm:text-sm font-medium text-gray-700">Phone Number</label>
                <input type="number" id="phone" name="phone"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your phone number" required>
            </div>

            <!-- Password -->
            <div class="mb-1">
                <label for="password" class="block text-xs sm:text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-1">
                <label for="password_confirmation" class="block text-xs sm:text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-4 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Register
                </button>
            </div>
        </form>

        <p class="text-center text-xs sm:text-sm text-gray-600 mt-4">
            Already have an account?
            <a href="{{ url('login.form') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>
