<x-admin-layout>
    @section('content')
        <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
            <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">Add New Category</h1>

            <form action="{{ route('admin.categories.store', $day) }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="day_id" value="{{ $day->id }}">
                <div class="flex flex-col">
                    <label for="name" class="text-gray-700 font-medium mb-2">Category Name</label>
                    <input type="text" name="name" id="name" required
                           class="px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Enter category name">
                </div>

                <button type="submit"
                        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200 ease-in-out">
                    Add Category
                </button>
            </form>

            <a href="{{ route('admin.categories.index', $day->id) }}"
               class="block mt-6 text-center text-blue-500 hover:text-blue-700 transition duration-200">
                ← Back to Categories
            </a>
        </div>
    @endsection
</x-admin-layout>
