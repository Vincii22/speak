<x-admin-layout>

@section('content')
    <h1>Edit Practice Category</h1>

    <form action="{{ route('admin.practiceCategories.update', $practiceCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $practiceCategory->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
</x-admin-layout>
