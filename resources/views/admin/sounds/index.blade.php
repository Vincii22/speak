<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Media for Level {{ $level->level }}</h1>

            <!-- Add New Media Button -->
            <div class="mb-4">
                <a href="{{ route('admin.sounds.create', $level->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Media</a>
            </div>

            <!-- Media List -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <ul class="space-y-4">
                    @foreach ($level->sounds as $sound)
                        <li class="flex flex-col space-y-3 border-b border-gray-200 py-3">
                            <!-- Audio Player -->
                            @if ($sound->audio_file)
                                <div>
                                    <h2 class="text-lg font-medium">Audio File:</h2>
                                    <audio controls class="w-full">
                                        <source src="{{ asset('storage/' . $sound->audio_file) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif

                            <!-- Video File -->
                            @if ($sound->video_file)
                                <div>
                                    <h2 class="text-lg font-medium">Video File:</h2>
                                    <video controls class="w-full h-64">
                                        <source src="{{ asset('storage/' . $sound->video_file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif

                            <!-- Embedded Video Link -->
                            @if ($sound->video_link)
                                <div>
                                    <h2 class="text-lg font-medium">Embedded Video:</h2>
                                    <iframe src="{{ $sound->video_link }}" frameborder="0" allowfullscreen class="w-full h-64"></iframe>
                                </div>
                            @endif

                            <!-- Delete Button -->
                            <form action="{{ route('admin.sounds.destroy', [$level->id, $sound->id]) }}" method="POST" id="delete-form-{{ $sound->id }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $sound->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Back to Levels Button -->
            <div class="mt-6">
                <a href="{{ route('admin.levels.index', $level->category_id) }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 transition">Back to Levels</a>
            </div>
        </div>

        <!-- JavaScript for Delete Confirmation -->
        <script>
            function confirmDelete(soundId) {
                if (confirm('Are you sure you want to delete this media? This action cannot be undone.')) {
                    document.getElementById('delete-form-' + soundId).submit();
                }
            }
        </script>
    @endsection
</x-admin-layout>
