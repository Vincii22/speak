<x-professional-layout>
    @section('professional_content')
    <div class="flex justify-center items-start min-h-screen bg-gray-100 pt-16 py-16">
        <div class="w-full lg:w-9/12 xl:w-8/12 bg-transparent border-4 border-purple-600 p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-8">{{ $user->name }}'s Exercises</h1>

            <div class="space-y-6">
                @foreach ($userActivities as $activity)
                    <div class="mb-4">
                        <h2 class="text-2xl font-semibold text-center text-purple-600">
                            <a href="{{ route('professional.exercise.show', $activity->id) }}">
                                {{ $activity->exercise->name }}
                            </a>
                        </h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @stop
</x-professional-layout>
