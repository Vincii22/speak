<x-app-layout>

@foreach ($exercises as $exercise)
    <a href="{{ route('user.exercises.record', $exercise) }}">{{ $exercise->name }}</a>
@endforeach

</x-app-layout>
