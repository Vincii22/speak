<x-admin-layout>

@section('content')
    <h1>Add New Category</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="order">Order</label>
            <input type="number" name="order" id="order" required>
        </div>

        <button type="submit">Add Category</button>
    </form>

    <a href="{{ route('admin.categories.index') }}">Back to Categories</a>
@endsection
</x-admin-layout>
