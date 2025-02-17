<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Display Exercise Details -->
            <div class="space-y-6">
                <!-- Exercise Name -->
                <h2 class="text-2xl font-semibold text-center text-purple-600">{{ $exercise->name }}</h2>

                <!-- Category Name -->
                <p class="text-lg text-center text-gray-700">
                    <span class="font-semibold">Category:</span> {{ $exercise->category->name }}
                </p>

                <!-- Display Media File -->
                @if ($exercise->media_file)
                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-600">Media File: {{ $exercise->media_file }}</p>

                        <!-- Check if the file is audio -->
                        @if (str_contains($exercise->media_file, '.m4a') || str_contains($exercise->media_file, '.mp3') || str_contains($exercise->media_file, '.ogg'))
                            <audio controls class="w-full max-w-3xl mx-auto">
                                <source src="{{ asset('storage/' . $exercise->media_file) }}" type="audio/m4a">
                                <source src="{{ asset('storage/' . $exercise->media_file) }}" type="audio/mp3"> <!-- Fallback to mp3 -->
                                Your browser does not support the audio element.
                            </audio>
                        @endif

                        <!-- Check if the file is video -->
                        @if (str_contains($exercise->media_file, '.mp4') || str_contains($exercise->media_file, '.webm'))
                            <video controls class="w-full max-w-3xl mx-auto">
                                <source src="{{ asset('storage/media/' . $exercise->media_file) }}" type="video/mp4">
                                Your browser does not support the video element.
                            </video>
                        @endif
                    </div>
                @else
                    <div class="text-center mt-4 text-red-500">
                        <p>No media file available for this exercise.</p>
                    </div>
                @endif

                <!-- Recording Section (Placeholder for webcam and mic recording) -->
                <div class="text-center mt-6">
                    <p class="text-lg font-semibold text-purple-600">Ready to record your performance?</p>
                    <button class="bg-purple-600 text-white py-2 px-6 rounded-md hover:bg-purple-700 mt-4">
                        Start Recording
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
