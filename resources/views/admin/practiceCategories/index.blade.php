// resources/views/admin/practiceCategories/index.blade.php

<x-admin-layout>

@section('content')
    <h1>Practice Categories</h1>

    <a href="{{ route('admin.practiceCategories.create') }}" class="btn btn-primary">Add New Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.practiceCategories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.practiceCategories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
