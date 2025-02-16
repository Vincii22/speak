<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">{{ $set->name }}</h1>

        <div class="mb-4">
            <a href="{{ route('admin.days.create', $set->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Day</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($days as $day)
                    <li class="py-3 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <span>{{ $day->name }}</span>

                            <!-- Day Actions -->
                            <div class="flex space-x-4">
                                <a href="{{ route('admin.categories.index', $day->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">View Categories</a>
                                <a href="{{ route('admin.categories.create', $day->id) }}" class="text-green-600 hover:text-green-800 transition">Add Category</a>
                                <a href="{{ route('admin.days.edit', $day->id) }}" class="text-blue-600 hover:text-blue-800 transition">Edit</a>

                                <!-- Delete Form for Day -->
                                <form action="{{ route('admin.days.destroy', $day->id) }}" method="POST" id="delete-form-{{ $day->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $day->id }})" class="text-red-600 hover:text-red-800 transition">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        function confirmDelete(dayId) {
            if (confirm('Are you sure you want to delete this day? This action cannot be undone.')) {
                document.getElementById('delete-form-' + dayId).submit();
            }
        }
    </script>
    @endsection
</x-admin-layout>
