<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Edit Exercise</h1>

        <form action="{{ route('admin.exercises.update', $exercise->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Exercise Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $exercise->name) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.exercises.index', $category->id) }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Update Exercise</button>
            </div>
        </form>
    </div>
    @endsection
</x-admin-layout>
