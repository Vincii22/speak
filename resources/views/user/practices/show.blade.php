<x-user-layout>
    @section('content')
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-semibold mb-6">{{ $exercise->name }}</h1>

            <div class="bg-white shadow-md rounded-lg p-6">
                <p><strong>Category:</strong> {{ $category->name }}</p>
                <p><strong>Exercise Name:</strong> {{ $exercise->name }}</p>

                @if($exercise->media_file)
                    <div class="mt-4">
                        <video controls class="w-full">
                            <source src="{{ asset('storage/' . $exercise->media_file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @else
                    <p>No media available for this exercise.</p>
                @endif
            </div>
        </div>
    @endsection
</x-user-layout>
