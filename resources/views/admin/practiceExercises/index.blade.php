<x-admin-layout>

@section('content')
    <h1>Practice Exercises</h1>

    <a href="{{ route('admin.practiceExercises.create') }}" class="btn btn-primary">Add New Exercise</a>

    <table class="table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->category->name }}</td>
                    <td>{{ $exercise->name }}</td>
                    <td>
                        <a href="{{ route('admin.practiceExercises.edit', $exercise->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.practiceExercises.destroy', $exercise->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
</x-admin-layout>
