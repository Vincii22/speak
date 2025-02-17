<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">EXERCISES IN {{ $category->name }}</h1>

            <!-- Display Exercises with Custom Styling -->
            <div class="space-y-6">
                @foreach($exercises as $exercise)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span class="text-xl font-semibold text-gray-800">{{ $exercise->name }}</span>
                            <a href="{{ route('user.practices.show', $exercise->id) }}"
                               class="text-blue-600 hover:text-blue-800 transition duration-300">
                               View Exercise
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
