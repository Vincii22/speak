<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Exercise Name -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">{{ $exercise->name }}</h1>

            <!-- Video Container -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Video Player -->
                <div class="relative">
                    <video class="w-full h-auto rounded-lg" controls>
                        <source src="{{ asset('storage/' . $exercise->media_file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <!-- Optional Additional Content -->
            <div class="mt-6 text-center">
                <a href="{{ route('user.practices.index') }}"
                   class="text-blue-600 hover:text-blue-800 transition duration-300">
                   Back to Practice Categories
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
