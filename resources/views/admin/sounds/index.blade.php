<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Sounds for Level {{ $level->level }}</h1>

            <!-- Add New Sound Button -->
            <div class="mb-4">
                <a href="{{ route('admin.sounds.create', $level->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Sound</a>
            </div>

            <!-- Sounds List -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <ul class="space-y-4">
                    @foreach ($level->sounds as $sound)
                        <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                            <div class="flex items-center space-x-3">
                                <!-- Sound ID Display -->
                                <span class="text-lg font-medium">Sound ID: {{ $sound->id }}</span>

                                <!-- Audio Player -->
                                <audio controls class="w-64">
                                    <source src="{{ asset('storage/' . $sound->audio_file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>

                            <div class="flex items-center space-x-4">
                                <!-- Delete Sound Form with Confirmation -->
                                <form action="{{ route('admin.sounds.destroy', [$level->id, $sound->id]) }}" method="POST" id="delete-form-{{ $sound->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $sound->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                                </form>
                            </div>
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
                if (confirm('Are you sure you want to delete this sound? This action cannot be undone.')) {
                    document.getElementById('delete-form-' + soundId).submit();
                }
            }
        </script>

    @endsection
    </x-admin-layout>
