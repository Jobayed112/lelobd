<!-- OTP Page -->
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-gray-800">Enter OTP</h2>
        <p class="mt-2 text-sm text-gray-600 text-center">A verification code has been sent to your email</p>

        <form action="{{ route('admin-verifyotp') }}" method="POST" class="mt-6">
            @csrf
            <label for="otp" class="block text-sm font-medium text-gray-700">OTP Code</label>
            <input type="text" id="otp" name="otp" required placeholder="Enter OTP" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">

            <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg">Verify OTP</button>
        </form>

        <p class="mt-4 text-sm text-gray-600 text-center">
            Didn’t receive the OTP? <a href="#" class="text-blue-500 hover:underline">Resend</a>
        </p>
    </div>
</div>
