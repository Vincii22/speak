<x-app-layout>
    <div class="py-8 px-4 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Level {{ $level }}</h1>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Playable Sound File with Speaker Icon -->
            @if($sound)
                <div class="flex items-center mb-4">
                    <i class="fas fa-volume-up text-gray-600 cursor-pointer" onclick="playSound('{{ asset('storage/' . $sound->audio_file) }}')"></i>
                    <span class="ml-2 text-gray-600">Click to Play Sound</span>
                </div>
            @endif

            <!-- Record Audio with Start Recording Text -->
            <div class="relative">
                <label class="block text-gray-600 font-medium mb-2" for="audio">Record Your Pronunciation:</label>
                <div class="flex items-center">
                    <button id="startRecordingBtn" class="text-xl text-green-500 cursor-pointer bg-transparent border-none">
                        <i class="fas fa-microphone text-3xl text-green-500 cursor-pointer"></i>
                    </button>
                    <span id="recordingTimer" class="ml-4 text-gray-700">00:00</span>
                </div>
                <!-- Stop Recording Button with Red Square Icon -->
                <button id="stopRecordingBtn" class="w-full bg-transparent text-red-500 text-3xl border-none cursor-pointer mt-2 hidden">
                    <i class="fas fa-square cursor-pointer"></i>
                </button>
                <div id="audioPlayer" class="mt-4 hidden">
                    <audio id="recordedAudio" controls class="w-full"></audio>
                    <!-- Replay Button with Play Icon -->
                    <button id="replayBtn" class="w-full bg-transparent text-blue-500 text-3xl border-none cursor-pointer mt-2">
                        <i class="fas fa-play-circle cursor-pointer"></i>
                    </button>
                </div>
            </div>

            <!-- Submit Audio Recording -->
            <form action="{{ route('user.content.submitRecording', ['category' => $category->id, 'level' => $level]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="audio" id="audioBlob" style="display: none;">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg transition duration-300 ease-in-out">
                    Submit Recording
                </button>
            </form>



            <!-- Speech-to-Text Result -->
            <div id="speechResult" class="mt-4 text-gray-700"></div>

            <button onclick="startSpeechRecognition()" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-lg mt-6">
                Verify Pronunciation
            </button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        let mediaRecorder;
        let recordedAudio = [];
        let audioURL;
        let recordingTime = 0;
        let timerInterval;

      // Function to submit the audio as an MP3 file
      function prepareAudioFile(audioBlob) {
    // Convert the Blob to a File
    const audioFile = new File([audioBlob], "recording.wav", { type: "audio/wav" });

    // Set the file in the form
    const audioInput = document.getElementById('audioBlob');
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(audioFile);  // Add the file to the input
    audioInput.files = dataTransfer.files;  // Assign the file to the input
}

// Ensure the event listener is correctly attached to the "Start Recording" button
document.getElementById('startRecordingBtn').addEventListener('click', function() {
    console.log("Start recording button clicked!");
    startRecording();
});

// Ensure the event listener is correctly attached to the "Stop Recording" button
document.getElementById('stopRecordingBtn').addEventListener('click', function() {
    console.log("Stop recording button clicked!");
    stopRecording();
});

// Ensure the event listener is correctly attached to the "Replay" button
document.getElementById('replayBtn').addEventListener('click', function() {
    console.log("Replay button clicked!");
    replayRecording();
});

// Function to start recording
async function startRecording() {
    console.log("Start recording triggered.");

    // Check if getUserMedia is available in the browser
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert("Your browser does not support audio recording.");
        console.error("getUserMedia is not available.");
        return;
    }

    try {
        // Request microphone access
        console.log("Requesting microphone access...");
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        console.log("Microphone access granted.");

        if (!stream) {
            alert("No audio stream received.");
            console.error("No audio stream received.");
            return;
        }

        mediaRecorder = new MediaRecorder(stream);
        mediaRecorder.ondataavailable = function (event) {
            recordedAudio.push(event.data);
        };
        mediaRecorder.onstop = function () {
            const audioBlob = new Blob(recordedAudio, { type: 'audio/wav' });
            audioURL = URL.createObjectURL(audioBlob);
            document.getElementById('recordedAudio').src = audioURL;
            document.getElementById('audioPlayer').classList.remove('hidden');
            prepareAudioFile(audioBlob);
        };

        mediaRecorder.start();
        console.log("Recording started.");

        document.getElementById('startRecordingBtn').classList.add('hidden');
        document.getElementById('stopRecordingBtn').classList.remove('hidden');

        // Start the recording timer
        timerInterval = setInterval(updateTimer, 1000);
    } catch (err) {
        alert("Error accessing microphone: " + err.message);
        console.error("Microphone access error:", err);
    }
}


        // Function to stop recording
        function stopRecording() {
    console.log("Stop recording triggered.");
    mediaRecorder.stop();
    document.getElementById('startRecordingBtn').classList.remove('hidden');
    document.getElementById('stopRecordingBtn').classList.add('hidden');
    clearInterval(timerInterval);

    // After recording is stopped, prepare the audio file for submission
    const audioBlob = new Blob(recordedAudio, { type: 'audio/wav' });
    prepareAudioFile(audioBlob);  // This will set the file to the hidden input
}

        // Function to update the recording timer
        function updateTimer() {
            recordingTime++;
            const minutes = String(Math.floor(recordingTime / 60)).padStart(2, '0');
            const seconds = String(recordingTime % 60).padStart(2, '0');
            document.getElementById('recordingTimer').textContent = `${minutes}:${seconds}`;
        }

        // Function to play the sound file
        function playSound(file) {
            const audio = new Audio(file);
            audio.play();
        }

        // Function to replay the recording
        function replayRecording() {
            const audio = document.getElementById('recordedAudio');
            audio.currentTime = 0;
            audio.play();
        }

        // Speech-to-Text Functionality
        function startSpeechRecognition() {
            console.log("Speech recognition triggered.");
            if (!('webkitSpeechRecognition' in window)) {
                alert("Speech recognition not supported in this browser.");
                return;
            }
            const recognition = new webkitSpeechRecognition();
            recognition.lang = 'en-US';
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            recognition.onresult = (event) => {
                const speechResult = event.results[0][0].transcript;
                document.getElementById('speechResult').textContent = `Recognized: ${speechResult}`;
                console.log("Speech recognition result:", speechResult);
                // You can compare the speech result to the expected answer here
            };

            recognition.onerror = (event) => {
                console.error("Speech recognition error:", event.error);
            };

            recognition.start();
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
