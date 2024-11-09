<x-admin-layout>

@section('content')
    <h1>Edit Level in {{ $categoryId }}</h1>

    <form action="{{ route('admin.levels.update', [$categoryId, $level->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="level">Level Number</label>
            <input type="number" name="level" id="level" value="{{ $level->level }}" required>
        </div>

        <button type="submit">Update Level</button>
    </form>

    <a href="{{ route('admin.levels.index', $categoryId) }}">Back to Levels</a>
@endsection
</x-admin-layout>
