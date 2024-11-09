<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <!-- Page Heading -->
            <h1 class="text-3xl font-semibold mb-6">Add Sound to Level {{ $levelId }}</h1>

            <!-- Form for Adding Sound -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('admin.sounds.store', $levelId) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Audio File Upload Section -->
                    <div class="mb-4">
                        <label for="audio_file" class="block text-sm font-medium text-gray-700">Upload Sound File (MP3 or WAV)</label>
                        <input type="file" name="audio_file" id="audio_file" accept=".mp3, .wav" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('audio_file')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add Sound</button>
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
