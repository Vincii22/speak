<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Show the current day name in similar style as the categories -->
            @isset($day)
                <div class="mb-6 text-center">
                    <a href="{{ route('user.exercises.categories', $day) }}"
                       class="block bg-purple-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition w-64 mx-auto text-center">
                     <span class="font-bold">{{ $day->name }}</span>
                    </a>
                </div>
            @endisset

            <!-- Display Categories with Custom Styling -->
            <div class="flex flex-wrap justify-center space-x-4">
                @foreach ($categories as $category)
                    <a href="{{ route('user.exercises.exercises', $category) }}"
                       class="block bg-purple-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition w-64 text-center mb-4">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
