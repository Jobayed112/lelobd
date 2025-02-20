<div class="container mx-auto px-6 py-12 flex justify-center">
    <!-- Login Section -->
    <div class="bg-gray-50 p-6 rounded-xl shadow-lg border border-gray-300 w-full sm:w-96">
        <h1 class="text-2xl font-extrabold text-gray-900 mb-4 text-center">Login</h1>

        <p class="text-gray-600 text-center mb-3">Welcome back! Please enter your details below to login.</p>

        <!-- Form -->
        <form action="{{ route('login.create') }}" method="POST">
            @csrf
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-[14px] font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-[14px] font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password" required>
                <p class="text-right text-[13px] text-gray-600 mt-1">
                    <a href="{{ route('reset.form') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                </p>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit"
                    class="w-full text-[14px] bg-blue-600 text-white py-2 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Login
                </button>
            </div>
        </form>

        <p class="text-center text-[13px] text-gray-600 mt-4">
            Don't have an account?
            <a href="{{ route('register.form') }}" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>
</div>
