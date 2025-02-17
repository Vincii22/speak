<x-app-layout>
    <!-- Center the whole content -->
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="text-4xl font-bold text-center text-purple-600 mb-6">LET'S PRACTICE!</h1>

            <!-- Display Exercise Details -->
            <div class="space-y-6">
                <!-- Exercise Name -->
                <h2 class="text-2xl font-semibold text-center text-purple-600">{{ $exercise->name }}</h2>

                <!-- Category Name -->
                <p class="text-lg text-center text-gray-700">
                    <span class="font-semibold">Category:</span> {{ $exercise->category->name }}
                </p>

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
                <!-- Video Feed for Live Preview -->
                <div class="text-center mt-6">
                    <video id="videoPreview" width="100%" height="auto" autoplay muted></video>
                </div>

                <!-- Recording Section -->
                <div class="text-center mt-6">
                    <p class="text-lg font-semibold text-purple-600">Ready to record your performance?</p>
                    <button id="startRecordingBtn" class="bg-purple-600 text-white py-2 px-6 rounded-md hover:bg-purple-700 mt-4">
                        Start Recording
                    </button>
                    <button id="stopRecordingBtn" class="bg-red-600 text-white py-2 px-6 rounded-md hover:bg-red-700 mt-4 hidden">
                        Stop Recording
                    </button>
                </div>

                <!-- Submit Button for the Recorded Video -->
                <form id="submitForm" action="{{ route('user.exercises.submit', $exercise) }}" method="POST" enctype="multipart/form-data" class="mt-6 hidden">
                    @csrf
                    <!-- Hidden field to send the media file data -->
                    <input type="file" name="media_file" id="mediaFileInput" style="display:none;">
                    <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-md hover:bg-green-700">
                        Submit Recording
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        // Variables to hold media stream and recorded video data
        let mediaRecorder;
        let recordedChunks = [];

        // Set up the video preview (Live feed)
        const videoPreview = document.getElementById('videoPreview');

        // Start recording when the button is clicked
        document.getElementById('startRecordingBtn').addEventListener('click', async () => {
            // Request video-only stream
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true, // Capture video only (no audio)
            });

            // Show live video feed
            videoPreview.srcObject = stream;

            // Start the MediaRecorder for the stream
            mediaRecorder = new MediaRecorder(stream);
            mediaRecorder.ondataavailable = event => {
                recordedChunks.push(event.data);
            };

            mediaRecorder.onstop = () => {
                // Combine all recorded chunks into a Blob
                const blob = new Blob(recordedChunks, { type: 'video/webm' });
                const file = new File([blob], 'recorded_video.webm', { type: 'video/webm' });

                // Create a file input element and append the file
                const mediaFileInput = document.getElementById('mediaFileInput');
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file); // Add file to DataTransfer
                mediaFileInput.files = dataTransfer.files; // Set files on the input field

                // Show the submit button and form
                document.getElementById('submitForm').classList.remove('hidden');
            };

            // Start recording
            mediaRecorder.start();

            // Change button visibility
            document.getElementById('startRecordingBtn').classList.add('hidden');
            document.getElementById('stopRecordingBtn').classList.remove('hidden');
        });

        // Stop recording when the button is clicked
        document.getElementById('stopRecordingBtn').addEventListener('click', () => {
            mediaRecorder.stop();
            videoPreview.srcObject.getTracks().forEach(track => track.stop());

            // Change button visibility
            document.getElementById('stopRecordingBtn').classList.add('hidden');
            document.getElementById('startRecordingBtn').classList.remove('hidden');
        });
    </script>

</x-app-layout>
