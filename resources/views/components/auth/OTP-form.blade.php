<!-- OTP Page -->
<div class="m-4 flex items-center justify-center px-4">
    <div class="bg-white shadow-lg rounded-2xl p-6 sm:p-8 w-full sm:w-96">
        <h2 class="text-xl sm:text-2xl font-bold text-center text-gray-800">Enter OTP</h2>
        <p class="mt-2 text-sm text-gray-600 text-center">A verification code has been sent to your email.</p>

        <form action="{{ route('verify.otp') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="otp" class="block text-[14px] font-medium text-gray-700">OTP Code</label>
                <input type="text" id="otp" name="otp" required placeholder="Enter OTP"
                    class="mt-1 block w-full text-[14px] px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                class="w-full text-[14px] bg-blue-600 text-white py-2 rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                Verify OTP
            </button>
        </form>

        <p class="mt-4 text-[13px] text-gray-600 text-center">
            Didn’t receive the OTP? <a href="#" class="text-blue-600 hover:underline">Resend</a>
        </p>
    </div>
</div>
