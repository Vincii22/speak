<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Practice Categories</h1>

        <div class="mb-4">
            <a href="{{ route('admin.practiceCategories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Category</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($categories as $category)
                    <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                        <span class="text-lg font-medium">{{ $category->name }}</span>

                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.practiceCategories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                            <a href="{{ route('admin.practiceExercises.index', ['category' => $category->id]) }}" class="text-blue-600 hover:text-blue-800 transition">View Exercises</a>

                            <!-- Delete Form -->
                            <form action="{{ route('admin.practiceCategories.destroy', $category->id) }}" method="POST" id="delete-form-{{ $category->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $category->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection

    <script>
        function confirmDelete(categoryId) {
            if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                document.getElementById('delete-form-' + categoryId).submit();
            }
        }
    </script>
</x-admin-layout>
