<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Display Sets with Custom Styling -->
            <div class="space-y-4">
                @foreach ($sets as $set)
                    <a href="{{ route('user.exercises.days', $set) }}"
                       class="block bg-purple-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition w-64 mx-auto text-center">
                        {{ $set->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
