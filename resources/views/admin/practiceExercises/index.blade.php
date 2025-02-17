<x-admin-layout>

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Practice Exercises</h1>

            <div class="mb-4">
                <a href="{{ route('admin.practiceExercises.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Exercise</a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="text-left bg-gray-100">
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Category</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Name</th>
                            <th class="px-4 py-2 text-sm font-medium text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exercises as $exercise)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $exercise->category ? $exercise->category->name : 'No category' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">{{ $exercise->name }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700">
                                    <a href="{{ route('admin.practiceExercises.edit', $exercise->id) }}" class="text-indigo-600 hover:text-indigo-800 transition">Edit</a>

                                    <form action="{{ route('admin.practiceExercises.destroy', $exercise->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    </x-admin-layout>
