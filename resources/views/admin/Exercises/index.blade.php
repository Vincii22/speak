<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Exercises for {{ $category->name }}</h1>

        <div class="mb-4">
            <a href="{{ route('admin.exercises.create', $category) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Exercise</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($exercises as $exercise)
                    <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                        <span class="text-lg font-medium">{{ $exercise->name }}</span>

                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.exercises.edit', $exercise->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                            <form action="{{ route('admin.exercises.destroy', $exercise->id) }}" method="POST" id="delete-form-{{ $exercise->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $exercise->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection

    <script>
        function confirmDelete(exerciseId) {
            if (confirm('Are you sure you want to delete this exercise? This action cannot be undone.')) {
                document.getElementById('delete-form-' + exerciseId).submit();
            }
        }
    </script>
</x-admin-layout>
