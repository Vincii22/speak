<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Levels in {{ $category->name }}</h1>

            <div class="mb-4">
                <a href="{{ route('admin.levels.create', $category->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Level</a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <ul class="space-y-4">
                    @foreach ($category->levels as $level)
                        <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                            <div class="flex items-center space-x-3">
                                <!-- Level Display -->
                                <span class="text-lg font-medium">Level {{ $level->level }}</span>
                            </div>

                            <div class="flex items-center space-x-4">
                                <!-- Edit Link -->
                                <a href="{{ route('admin.levels.edit', [$category->id, $level->id]) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                                <!-- Delete Form with Dropdown Confirmation -->
                                <form action="{{ route('admin.levels.destroy', [$category->id, $level->id]) }}" method="POST" id="delete-form-{{ $level->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $level->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                                </form>

                                <!-- Manage Sounds Link -->
                                <a href="{{ route('admin.sounds.index', $level->id) }}" class="text-green-600 hover:text-green-800 transition">Manage Sounds</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 transition">Back to Categories</a>
            </div>
        </div>

        <script>
            // JavaScript for delete confirmation
            function confirmDelete(levelId) {
                if (confirm('Are you sure you want to delete this level? This action cannot be undone.')) {
                    document.getElementById('delete-form-' + levelId).submit();
                }
            }
        </script>

    @endsection
    </x-admin-layout>
