<div class="w-full overflow-x-hidden max-w-md bg-white rounded-lg shadow-lg p-2">
    <h2 class="text-2xl font-bold text-gray-800 text-center">Create Your Admin Account</h2>
    <p class="text-sm text-gray-600 text-center mt-1">Please fill in the details to create a new account.</p>

    <!-- Register Form -->
    <form action="{{ route('admin.register.create') }}" method="POST" class="mt-2">
        @csrf
        <!-- Name Input -->
        <div class="mb-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" name="name"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your full name" required>
        </div>
        {{-- phone number --}}
        <div class="mb-2">
            <label for="phone" class="block text-sm font-medium text-gray-700">Number</label>
            <input type="number" id="phone" name="phone"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your full Number" required >

        </div>

        <!-- Email Input -->
        <div class="mb-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your email" required>

        </div>

        <!-- Password Input -->
        <div class="mb-2">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your password" required>

        </div>

        <!-- Confirm Password Input -->
        <div class="mb-2">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Confirm your password" required>
        </div>

        <!-- Role Input -->
        <div class="mb-2">
            <label for="role" class="block text-sm font-medium text-gray-700">role</label>
            <select id="role" name="role" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>

        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Register
        </button>
    </form>

    <!-- Divider -->
    <div class="mt-6 flex items-center justify-between">
        <span class="w-1/5 border-b border-gray-300"></span>
        <p class="text-sm text-gray-500">or</p>
        <span class="w-1/5 border-b border-gray-300"></span>
    </div>

    <!-- Login Link -->
    <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account?
        <a href="{{ route('admin.login.form') }}" class="text-blue-500 font-medium hover:underline">Login</a>
    </p>
</div>
