<x-professional-layout>
    @section('professional_content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100 pt-16 py-16">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">{{ $activity->exercise->name }}</h1>
 <!-- Display Media File -->
                @if ($exercise->media_file)
                <div class="text-center mt-4">

                    <!-- Check if the file is audio -->
                    @if (str_contains($exercise->media_file, '.m4a') || str_contains($exercise->media_file, '.mp3') || str_contains($exercise->media_file, '.ogg'))
                        <audio controls class="w-full max-w-3xl mx-auto">
                            <source src="{{ asset('storage/' . $exercise->media_file) }}" type="audio/m4a">
                            <source src="{{ asset('storage/' . $exercise->media_file) }}" type="audio/mp3"> <!-- Fallback to mp3 -->
                            Your browser does not support the audio element.
                        </audio>
                    @endif

                    <!-- Check if the file is video -->
                    @if (str_contains($exercise->media_file, '.mp4') || str_contains($exercise->media_file, '.webm'))
                        <video controls class="w-full max-w-3xl mx-auto">
                            <source src="{{ asset('storage/' . $exercise->media_file) }}" type="video/mp4">
                            Your browser does not support the video element.
                        </video>
                    @endif
                </div>
                @else

                <div class="text-center mt-4 text-red-500">
                    <p>No media file available for this exercise.</p>
                </div>
                @endif
            <!-- Display Media -->
            <div class="text-center mt-4">
                <video width="100%" height="auto" controls>
                    <source src="{{ asset('storage/' . $activity->media_file) }}" type="video/mp4">
                    Your browser does not support the video element.
                </video>

            </div>

            <!-- Evaluation Form -->
            <div class="text-center mt-4">
                <form action="{{ route('professional.evaluateExercise', $activity->id) }}" method="POST">
                    @csrf
                    <textarea name="evaluation" rows="4" placeholder="Enter your evaluation (optional)" class="w-full border p-2 mt-2 rounded-md"></textarea>
                    <div class="mt-4">
                        <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-md hover:bg-green-700">
                            Mark as Evaluated
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @stop
</x-professional-layout>
