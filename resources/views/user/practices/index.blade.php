<x-user-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">Exercises in {{ $category->name }}</h1>

            <div class="bg-white shadow-md rounded-lg p-6">
                <ul class="space-y-4">
                    @foreach($exercises as $exercise)
                        <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                            <span class="text-lg font-medium">{{ $exercise->name }}</span>
                            <a href="{{ route('user.practices.show', [$category->id, $exercise->id]) }}" class="text-blue-600 hover:text-blue-800 transition">View Exercise</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endsection
</x-user-layout>
