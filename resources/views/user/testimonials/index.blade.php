<x-app-layout>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center text-purple-700 mb-6">User Testimonials</h1>
        <form action="{{ route('testimonials.store') }}" method="POST" class="mb-6">
            @csrf
            <textarea name="review" class="w-full p-3 border rounded-lg" placeholder="Write your review..." required></textarea>
            <select name="rating" class="w-full p-3 border rounded-lg mt-2">
                <option value="5">★★★★★</option>
                <option value="4">★★★★☆</option>
                <option value="3">★★★☆☆</option>
                <option value="2">★★☆☆☆</option>
                <option value="1">★☆☆☆☆</option>
            </select>
            <button type="submit" class="bg-purple-700 text-white p-2 mt-3 rounded-lg">Submit Review</button>
        </form>
        <div class="space-y-4">
            @foreach($testimonials as $testimonial)
                <div class="p-4 border rounded-lg shadow">
                    <p class="italic">"{{ $testimonial->review }}"</p>
                    <p class="text-sm text-gray-500">- {{ $testimonial->user->name }}, {{ $testimonial->created_at->format('F d, Y') }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
