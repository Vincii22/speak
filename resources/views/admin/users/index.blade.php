<x-admin-layout>

@section('content')
<div class="p-5">
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New User</a>

    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
</x-admin-layout>
