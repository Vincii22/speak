<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Display Exercises with Custom Styling -->
            <div class="flex flex-wrap justify-center space-x-4">
                @foreach ($exercises as $exercise)
                    <div class="w-64 mb-4 text-center">
                        <!-- Category Name -->
                        <p class="text-lg font-semibold text-purple-600 mb-2">{{ $exercise->category->name }}</p>

                        <!-- Exercise Link -->
                        <a href="{{ route('user.exercises.record', $exercise) }}"
                           class="block bg-purple-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition">
                            {{ $exercise->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
