<x-admin-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <!-- Page Heading -->
            <h1 class="text-3xl font-semibold mb-6">Add New Level to Category {{ $categoryId }}</h1>

            <!-- Form for Adding Level -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('admin.levels.store', $categoryId) }}" method="POST">
                    @csrf

                    <!-- Level Input Field -->
                    <div class="mb-4">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level Number</label>
                        <input type="number" name="level" id="level" class="mt-2 p-2 border border-gray-300 rounded-md w-full" required>
                        @error('level')
                            <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-4">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add Level</button>
                    </div>
                </form>

                <!-- Back to Levels Link -->
                <div class="mt-4">
                    <a href="{{ route('admin.levels.index', $categoryId) }}" class="text-blue-600 hover:text-blue-800 transition">Back to Levels</a>
                </div>
            </div>
        </div>
    @endsection
    </x-admin-layout>
