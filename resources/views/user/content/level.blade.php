<x-app-layout>
    <div class="py-8 px-4 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Level {{ $level }}</h1>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Playable Video or Embedded Video -->
            @if($sound)
                @if($sound->video_file)
                    <video controls class="w-full">
                        <source src="{{ asset('storage/' . $sound->video_file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @elseif($sound->video_link)
                    <iframe src="{{ $sound->video_link }}" class="w-full aspect-video" frameborder="0" allowfullscreen></iframe>
                @endif
            @endif

            <!-- Record Video Section -->
            <div class="relative mt-6">
                <label class="block text-gray-600 font-medium mb-2" for="video">Record Your Video:</label>
                <div class="flex items-center">
                    <!-- Start Video Recording Button -->
                    <button id="startVideoRecordingBtn" class="text-xl text-green-500 cursor-pointer bg-transparent border-none">
                        <i class="fas fa-video text-3xl text-green-500 cursor-pointer"></i>
                    </button>
                    <span id="videoRecordingTimer" class="ml-4 text-gray-700">00:00</span>
                </div>

                <!-- Live Video Preview -->
                <div id="liveVideoPreview" class="mt-4 hidden">
                    <video id="liveVideo" autoplay muted class="w-full h-64 object-cover rounded-lg shadow-lg"></video>
                </div>

                <!-- Stop Video Recording Button -->
                <button id="stopVideoRecordingBtn" class="w-full bg-transparent text-red-500 text-3xl border-none cursor-pointer mt-2 hidden">
                    <i class="fas fa-square cursor-pointer"></i>
                </button>

                <!-- Cancel Video Recording Button -->
                <button id="cancelVideoRecordingBtn" class="w-full bg-transparent text-gray-500 border-none cursor-pointer mt-2 hidden">
                    <i class="fas fa-times cursor-pointer"></i> Cancel Recording
                </button>

                <!-- Video Preview -->
                <div id="videoPlayer" class="mt-4 hidden">
                    <video id="recordedVideo" controls class="w-full"></video>
                </div>

                <!-- Reset Button (appears after recording) -->
                <button id="resetVideoRecordingBtn" class="w-full bg-transparent text-gray-500 border-none cursor-pointer mt-2 hidden">
                    <i class="fas fa-undo cursor-pointer"></i> Reset Recording
                </button>
            </div>

            <!-- Video Submission -->
            <form action="{{ route('user.content.submitRecording', ['category' => $category->id, 'level' => $level]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="video" id="videoBlob">  <!-- Hidden input for video -->
                <button type="submit" id="submitVideoBtn" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg mt-4 transition duration-300 ease-in-out">
                    Submit Video
                </button>
            </form>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
    let mediaRecorder;
    let recordedChunks = [];
    let videoStream;
    let videoRecordingTime = 0;
    let videoTimerInterval;

    // Attach event listeners directly to buttons
    document.getElementById('startVideoRecordingBtn').addEventListener('click', startVideoRecording);
    document.getElementById('stopVideoRecordingBtn').addEventListener('click', stopVideoRecording);
    document.getElementById('resetVideoRecordingBtn').addEventListener('click', resetVideoRecording);
    document.getElementById('submitVideoBtn').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default form submission

    // Check if video is recorded, if not prevent submission and show an error
    if (document.getElementById('videoBlob').files.length === 0) {
        alert("Please record a video before submitting.");
        return;
    }

    // Submit the form programmatically if the video exists
    document.querySelector('form').submit();
});


    async function startVideoRecording() {
        console.log("Start video recording triggered.");

        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            alert("Your browser does not support video recording.");
            console.error("getUserMedia is not available.");
            return;
        }

        try {
            // Request access to both video and audio
            videoStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            console.log("Video stream started.");

            // Set up the live video preview
            const liveVideoElement = document.getElementById('liveVideo');
            liveVideoElement.srcObject = videoStream;
            document.getElementById('liveVideoPreview').classList.remove('hidden'); // Show live preview

            mediaRecorder = new MediaRecorder(videoStream);
            mediaRecorder.ondataavailable = function (event) {
                recordedChunks.push(event.data);
            };
            mediaRecorder.onstop = function () {
                const videoBlob = new Blob(recordedChunks, { type: 'video/webm' });
                const videoURL = URL.createObjectURL(videoBlob);
                document.getElementById('recordedVideo').src = videoURL;
                document.getElementById('videoPlayer').classList.remove('hidden');

                prepareVideoFile(videoBlob); // Call prepareVideoFile to set the video blob
            };

            mediaRecorder.start();
            console.log("Video recording started.");

            // Toggle buttons visibility
            document.getElementById('startVideoRecordingBtn').classList.add('hidden');
            document.getElementById('stopVideoRecordingBtn').classList.remove('hidden');

            // Start the video recording timer
            videoTimerInterval = setInterval(updateVideoTimer, 1000);
        } catch (err) {
            alert("Error accessing video and microphone: " + err.message);
            console.error("Media access error:", err);
        }
    }

    function stopVideoRecording() {
        console.log("Stop video recording triggered.");
        mediaRecorder.stop();
        videoStream.getTracks().forEach((track) => track.stop());

        document.getElementById('startVideoRecordingBtn').classList.remove('hidden');
        document.getElementById('stopVideoRecordingBtn').classList.add('hidden');
        document.getElementById('cancelVideoRecordingBtn').classList.add('hidden');
        clearInterval(videoTimerInterval);

        // Show Reset Button after recording
        document.getElementById('resetVideoRecordingBtn').classList.remove('hidden');
    }


    function resetVideoRecording() {
        console.log("Reset video recording triggered.");
        // Reset the recorded video and UI
        document.getElementById('videoPlayer').classList.add('hidden');
        document.getElementById('recordedVideo').src = "";
        document.getElementById('resetVideoRecordingBtn').classList.add('hidden');
        document.getElementById('startVideoRecordingBtn').classList.remove('hidden');
        document.getElementById('liveVideoPreview').classList.add('hidden');

        // Reset Timer
        videoRecordingTime = 0;
        document.getElementById('videoRecordingTimer').textContent = '00:00';
    }

    function updateVideoTimer() {
        videoRecordingTime++;
        const minutes = String(Math.floor(videoRecordingTime / 60)).padStart(2, '0');
        const seconds = String(videoRecordingTime % 60).padStart(2, '0');
        document.getElementById('videoRecordingTimer').textContent = `${minutes}:${seconds}`;
    }

    function prepareVideoFile(videoBlob) {
    const videoFile = new File([videoBlob], "recording.webm", { type: "video/webm" });

    // Create a new DataTransfer object to simulate a file upload
    const videoInput = document.getElementById('videoBlob');
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(videoFile); // Add the video file to the DataTransfer
    videoInput.files = dataTransfer.files;  // Set the file in the hidden input field
}


    </script>

    <style>
        .file-input {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            color: #4a5568;
            background-color: #edf2f7;
            border: 2px dashed #cbd5e0;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .file-input:hover {
            border-color: #63b3ed;
        }

        .file-name {
            font-size: 0.875rem;
            font-style: italic;
        }
    </style>
</x-app-layout>
