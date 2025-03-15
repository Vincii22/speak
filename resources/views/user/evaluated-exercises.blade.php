<x-app-layout>
    <div class="p-6 pt-36">
        <h2 class="text-2xl font-bold mb-4">Evaluated Exercises</h2>

        @if($evaluatedExercises->isEmpty())
            <p class="text-gray-500">No evaluated exercises yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($evaluatedExercises as $activity)
                    <div class="bg-white shadow-lg rounded-lg p-5">
                        <h3 class="text-lg font-bold">{{ $activity->exercise->name }}</h3>
                        <p class="text-sm text-gray-600">
                            <strong>Set:</strong> {{ $activity->set->name }} <br>
                            <strong>Day:</strong> {{ $activity->day->name }} <br>
                            <strong>Category:</strong> {{ $activity->category->name }} <br>
                            <strong>Evaluation:</strong> {{ $activity->evaluation ?? 'No feedback' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
