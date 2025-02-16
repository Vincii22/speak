<x-admin-layout>
    @section('content')
        <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
            <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Add New Exercise</h1>

            <!-- Form for creating a new exercise -->
            <form action="{{ route('admin.exercises.store', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Exercise Name -->
                <div class="flex flex-col">
                    <label for="name" class="text-gray-700 font-medium mb-2">Exercise Name</label>
                    <input type="text" name="name" id="name" required
                           class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Enter exercise name">
                </div>

                <!-- Media Type Selector -->
                <div class="flex flex-col">
                    <label for="media_type" class="text-gray-700 font-medium mb-2">Select Media Type</label>
                    <select name="media_type" id="media_type" required
                            class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="url">URL</option>
                        <option value="file">File Upload</option>
                    </select>
                </div>

                <!-- Media URL (only shown when URL is selected) -->
                <div id="media_url_div" class="flex flex-col hidden">
                    <label for="media_url" class="text-gray-700 font-medium mb-2">Media URL</label>
                    <input type="url" name="media_url" id="media_url"
                           class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Enter media URL (e.g., YouTube or Vimeo link)">
                </div>

                <!-- File Upload (only shown when File Upload is selected) -->
                <div id="media_file_div" class="flex flex-col hidden">
                    <label for="media_file" class="text-gray-700 font-medium mb-2">Media File</label>
                    <input type="file" name="media_file" id="media_file" accept="video/*,audio/*"
                           class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200 ease-in-out">
                    Add Exercise
                </button>
            </form>

            <!-- Back to exercises link -->
            <a href="{{ route('admin.exercises.index', $category->id) }}"
               class="block mt-6 text-center text-blue-500 hover:text-blue-700 transition duration-200">
                ← Back to Exercises
            </a>
        </div>

        <script>
            // Handle visibility of URL or file input based on the media type selection
            document.getElementById('media_type').addEventListener('change', function() {
                const mediaType = this.value;
                const mediaUrlDiv = document.getElementById('media_url_div');
                const mediaFileDiv = document.getElementById('media_file_div');

                if (mediaType === 'url') {
                    mediaUrlDiv.classList.remove('hidden');
                    mediaFileDiv.classList.add('hidden');
                } else {
                    mediaUrlDiv.classList.add('hidden');
                    mediaFileDiv.classList.remove('hidden');
                }
            });
        </script>
    @endsection
</x-admin-layout>
