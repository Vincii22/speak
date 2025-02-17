<x-admin-layout>
@section('content')
    <h1>Create Practice Exercise</h1>

    <form action="{{ route('admin.practiceExercises.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="practiceCategory_id">Category</label>
            <select name="practiceCategory_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Exercise Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="media_file">Media File</label>
            <input type="file" name="media_file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Exercise</button>
    </form>
@endsection
</x-admin-layout>
