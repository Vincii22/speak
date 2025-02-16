<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Sets</h1>

        <div class="mb-4">
            <a href="{{ route('admin.sets.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Set</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($sets as $set)
                    <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                        <span class="text-lg font-medium">{{ $set->name }}</span>

                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.sets.edit', $set->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                            <form action="{{ route('admin.sets.destroy', $set->id) }}" method="POST" id="delete-form-{{ $set->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $set->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endsection

    <script>
        function confirmDelete(setId) {
            if (confirm('Are you sure you want to delete this set? This action cannot be undone.')) {
                document.getElementById('delete-form-' + setId).submit();
            }
        }
    </script>
</x-admin-layout>
