<x-app-layout>
@foreach ($sets as $set)
    <a href="{{ route('user.exercises.days', $set) }}">{{ $set->name }}</a>
@endforeach
</x-app-layout>
