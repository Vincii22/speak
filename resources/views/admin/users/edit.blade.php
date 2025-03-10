<x-admin-layout>
@section('content')
<div class="p-5">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border border-gray-300 rounded-md p-2" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border border-gray-300 rounded-md p-2" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" class="w-full border border-gray-300 rounded-md p-2" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="professional" {{ $user->role == 'professional' ? 'selected' : '' }}>Professional</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Update User
        </button>
    </form>
</div>
@endsection
</x-admin-layout>
