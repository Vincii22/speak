<x-admin-layout>
    @section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-6">Days for {{ $set->name }}</h1>

        <div class="mb-4">
            <a href="{{ route('admin.days.create', $set) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add New Day</a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4">
                @foreach ($days as $day)
                    <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                        <span class="text-lg font-medium">{{ $day->name }}</span>

                        <div class="flex items-center space-x-3">
                <a href="{{ route('admin.days.index', $set->id) }}" class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400 transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Update Day</button>
            </div>
        </form>
    </div>
    @endsection
</x-admin-layout>
