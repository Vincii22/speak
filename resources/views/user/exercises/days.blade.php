<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <div class="space-y-4">
                @foreach ($days as $day)
                    <a href="{{ route('user.exercises.categories', $day) }}"
                       class="block bg-purple-600 text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition w-64 mx-auto text-center">
                        {{ $day->name }}
                    </a>
                @endforeach
            </div>

            @isset($set)
                <div class="mt-8 text-center">
                    <p class="text-xl font-semibold text-purple-600">
                        You are currently in Set: <span class="font-bold">{{ $set->name }}</span>
                    </p>
                </div>
            @endisset
        </div>
    </div>
</x-app-layout>
