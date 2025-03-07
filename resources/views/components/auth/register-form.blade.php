<div class="container mx-auto px-4 py-10 flex justify-center">
    <!-- Register Section -->
    <div class="bg-white p-4 sm:p-6 rounded-xl shadow-lg border border-gray-300 w-full sm:w-96">
        <h1 class="text-[20px] font-extrabold text-gray-900 mb-3 text-center">Create Account</h1>

        <p class="text-gray-600 text-center mb-1">Create an account to get started.</p>

        <!-- Form -->
        <form action="{{ Route('register') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Name -->
                <div class="mb-2">
                    <label for="name" class="block font-medium text-gray-700 text-[14px]">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Phone Number -->
                <div class="mb-2">
                    <label for="phone" class="block font-medium text-gray-700 text-[14px]">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                        class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your phone number" required value="+8801" required oninput="enforcePrefix()">
                </div>
            </div>

            <!-- Email Address -->
            <div class="mb-2">
                <label for="email" class="block font-medium text-gray-700 text-[14px]">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="mb-2">
                <label for="password" class="block font-medium text-gray-700 text-[14px]">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-2">
                <label for="password_confirmation" class="block font-medium text-gray-700 text-[14px]">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full text-[14px] px-3 py-2 border border-gray-300 rounded-lg shadow-sm mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit"
                    class="w-full text-[14px] bg-blue-600 text-white py-3 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                    Register
                </button>
            </div>
        </form>

        <p class="text-center text-[14px] text-gray-600 mt-4">
            Already have an account?
            <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>
