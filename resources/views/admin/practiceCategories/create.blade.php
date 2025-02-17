

<x-admin-layout>

@section('content')
    <h1>Create Practice Category</h1>

    <form action="{{ route('admin.practiceCategories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
@endsection
</x-admin-layout>
