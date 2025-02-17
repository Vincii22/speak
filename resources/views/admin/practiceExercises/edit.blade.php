<x-admin-layout>
@section('content')
    <h1>Edit Practice Exercise</h1>

    <form action="{{ route('admin.practiceExercises.update', $practiceExercise->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="practiceCategory_id">Category</label>
            <select name="practiceCategory_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == $practiceExercise->practiceCategory_id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Exercise Name</label>
            <input type="text" name="name" class="form-control" value="{{ $practiceExercise->name }}" required>
        </div>

        <div class="form-group">
            <label for="media_file">Media File</label>
            <input type="file" name="media_file" class="form-control">
            @if ($practiceExercise->media_file)
                <a href="{{ asset('storage/' . $practiceExercise->media_file) }}" target="_blank">View current media</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Exercise</button>
    </form>
@endsection
</x-admin-layout>
