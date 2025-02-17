<x-admin-layout>

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Create Practice Category</h1>

            <form action="{{ route('admin.practiceCategories.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Create Category</button>
            </form>
        </div>
    @endsection

    </x-admin-layout>
