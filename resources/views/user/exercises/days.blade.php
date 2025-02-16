<x-app-layout>
    @foreach ($days as $day)
    <a href="{{ route('user.exercises.categories', $day) }}">{{ $day->name }}</a>
@endforeach
</x-app-layout>
