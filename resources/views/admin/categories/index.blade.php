<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Categories</h1>

        <div class="mb-4">
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Category</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($categories as $category)
                    <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                        <span class="text-lg font-medium">{{ $category->name }}</span>

                        <div class="flex items-center space-x-3">
                            <!-- Edit Link -->
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                            <!-- Delete Form with Dropdown Confirmation -->
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" id="delete-form-{{ $category->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $category->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                            </form>

                            <!-- View Levels Link -->
                            <a href="{{ route('admin.levels.index', $category->id) }}" class="text-green-600 hover:text-green-800 transition">View Levels</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection

    <script>
        // JavaScript for delete confirmation
        function confirmDelete(categoryId) {
            if (confirm('Are you sure you want to delete this category? This action cannot be undone.')) {
                document.getElementById('delete-form-' + categoryId).submit();
            }
        }
    </script>

</x-admin-layout>
