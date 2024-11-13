<x-app-layout>
    <div class="py-8 px-4 bg-gray-50 min-h-screen">
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg text-center">
            <!-- Green Check Animation -->
            <div class="flex justify-center mb-6">
                <div class="check-animation text-green-500 text-6xl">
                    <i class="fas fa-check-circle animate__animated animate__fadeIn animate__delay-1s"></i>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ session('status') }}</h1>

            <!-- Buttons -->
            <div class="flex justify-center space-x-4">
                <a href="{{ route('user.content.activityLog') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out">
                    CHECK ACTIVITY LOG
                </a>
                <a href="{{ route('user.content.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out">
                    RETURN TO LEVELS
                </a>
            </div>
        </div>
    </div>

    <style>
        /* Add animations */
        .check-animation {
            animation-duration: 2s;
        }

        .animate__fadeIn {
            animation-name: fadeIn;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</x-app-layout>