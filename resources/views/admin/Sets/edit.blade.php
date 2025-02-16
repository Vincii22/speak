<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Edit Set</h1>

        <form action="{{ route('admin.sets.update', $set->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Set Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $set->name) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.sets.index') }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Update Set</button>
            </div>
        </form>
    </div>
    @endsection
</x-admin-layout>
