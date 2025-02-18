<div class="w-full overflow-x-hidden max-w-md bg-white rounded-lg shadow-lg p-4">
    <h2 class="text-2xl font-bold text-gray-800 text-center">Login to Your Admin Account</h2>
    <p class="text-sm text-gray-600 text-center mt-2">Welcome back! Please enter your details below.</p>

    <!-- Login Form -->
    <form action="{{ url('admin-login-create') }}" method="POST" class="mt-6">
        @csrf

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your email"   autocomplete="email" required>

        </div>

        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your password" required>

        </div>

        <!-- Forgot Password Link -->
        <div class="flex justify-end mb-4">
            <a href="{{ url('admin-reset-form') }}" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Login
        </button>
    </form>

    <!-- Divider -->
    <div class="mt-6 flex items-center justify-between">
        <span class="w-1/5 border-b border-gray-300"></span>
        <p class="text-sm text-gray-500">or</p>
        <span class="w-1/5 border-b border-gray-300"></span>
    </div>

    <!-- Signup Link -->
    <p class="mt-6 text-center text-sm text-gray-600">
        Don’t have an account?
        <a href="{{ url('admin-register-form') }}" class="text-blue-500 font-medium hover:underline">Sign Up</a>
    </p>
</div>
