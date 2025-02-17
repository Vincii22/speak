<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Create Practice Exercise</h1>

            <form action="{{ route('admin.practiceExercises.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-lg">
                @csrf
                <div class="mb-4">
                    <label for="practiceCategory_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="practiceCategory_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Exercise Name</label>
                    <input type="text" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div class="mb-4">
                    <label for="media_file" class="block text-sm font-medium text-gray-700">Media File</label>
                    <input type="file" name="media_file" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Create Exercise</button>
            </form>
        </div>
    @endsection
    </x-admin-layout>
