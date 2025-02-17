<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">PRACTICE CATEGORIES</h1>

            <!-- Display Categories with Custom Styling -->
            <div class="space-y-4">
                @foreach($categories as $category)
                    <a href="{{ route('user.practices.exercises', $category->id) }}"
                       class="block bg-blue-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-blue-700 transition w-64 mx-auto text-center">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
