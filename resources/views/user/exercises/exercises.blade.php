<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Display Exercises with Custom Styling -->
            <div class="flex flex-wrap justify-center space-x-4">
                @foreach ($exercises as $exercise)
                    <!-- Check if exercise has been marked as done -->
                    @php
                        $userActivity = \App\Models\UserActivity::where('exercise_id', $exercise->id)
                            ->where('user_id', auth()->id())
                            ->first();
                    @endphp

                    <div class="w-64 mb-4 text-center">
                        <!-- Category Name -->
                        <p class="text-lg font-semibold text-purple-600 mb-2">{{ $exercise->category->name }}</p>

                        <!-- Exercise Link -->
                        <a href="{{ route('user.exercises.record', $exercise) }}"
                           class="block {{ $userActivity && $userActivity->marked_as_done ? 'bg-green-600' : 'bg-purple-600' }} text-white text-lg font-semibold py-4 px-6 rounded-md shadow-md hover:bg-purple-700 transition">
                            {{ $exercise->name }}
                        </a>

                        <!-- Indicate the exercise is completed -->
                        @if ($userActivity && $userActivity->marked_as_done)
                            <p class="text-sm text-green-500 mt-2">Completed</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
