<x-app-layout>
    @foreach ($categories as $category)
    <a href="{{ route('user.exercises.exercises', $category) }}">{{ $category->name }}</a>
@endforeach
</x-app-layout>
