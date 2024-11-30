<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <!-- Page Heading -->
            <h1 class="text-3xl font-semibold mb-6">Add Media to Level {{ $levelId }}</h1>

            <!-- Form for Adding Media -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('admin.sounds.store', $levelId) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Audio File Upload Section -->
                    <div class="mb-4">
                        <label for="audio_file" class="block text-sm font-medium text-gray-700">Upload Sound File (MP3 or WAV)</label>
                        <input type="file" name="audio_file" id="audio_file" accept=".mp3, .wav" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        @error('audio_file')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Video File Upload Section -->
                    <div class="mb-4">
                        <label for="video_file" class="block text-sm font-medium text-gray-700">Upload Video File (MP4, AVI, MOV)</label>
                        <input type="file" name="video_file" id="video_file" accept=".mp4, .avi, .mov" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        @error('video_file')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Embedded Video Link Section -->
                    <div class="mb-4">
                        <label for="video_link" class="block text-sm font-medium text-gray-700">Video Link (YouTube, Vimeo, etc.)</label>
                        <input type="url" name="video_link" id="video_link" placeholder="https://example.com/video" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        @error('video_link')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Note -->
                    <p class="text-sm text-gray-600 mb-4">* You can upload either a video file or provide a video link. If both are provided, only the file will be used.</p>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add Media</button>
                    </div>
                </form>

                <!-- Back to Sounds Link -->
                <div class="mt-4">
                    <a href="{{ route('admin.sounds.index', $levelId) }}" class="text-blue-600 hover:text-blue-800 transition">Back to Sounds</a>
                </div>
            </div>
        </div>
    @endsection
</x-admin-layout>
