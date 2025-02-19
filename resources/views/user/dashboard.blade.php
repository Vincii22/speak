<x-app-layout>

    <div class="flex gap-4 w-full pt-36">
        <!-- Appointments Section (85% Width) -->
        <div class="w-[85%] p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Your Appointments</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                @foreach ($approvedSchedules as $schedule)
                    @foreach ($schedule->appointments as $appointment)
                        <div class="shadow-md relative h-[170px] rounded-lg px-4 py-4 flex flex-col justify-between bg-gray-100 transition-all">
                            <img src="{{ url('img/pin.png') }}" class="absolute w-[50px] right-[-10px] top-[-10px]">

                            <div class="flex justify-between items-center">
                                <h1 class="text-lg font-semibold">{{ $schedule->month }}</h1>
                                <h1 class="bg-[#694f8e] text-white rounded-full py-1 px-3 text-sm">{{ $schedule->day }}</h1>
                                <h1 class="text-lg font-semibold">{{ $schedule->year }}</h1>
                            </div>

                            <div class="flex justify-between mt-3 text-sm">
                                <label class="font-semibold">Time:</label>
                                <h1 class="ml-1">{{ $schedule->time }}</h1>
                            </div>

                            <div class="flex justify-between mt-4 items-center">
                                <a href="#" class="bg-[#b692d0] text-white rounded-lg px-3 py-1 text-sm">View</a>
                                <a href="{{ $appointment->google_meet_link }}" target="_blank"
                                    class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-3 py-1 text-sm">
                                    Join Google Meet
                                </a>
                                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to delete this?')"
                                        class="text-white bg-red-700 hover:bg-red-800 rounded-lg px-3 py-1 text-sm">
                                        Cancel
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Sidebar (15% Width) -->
        <div class="w-[15%] flex flex-col gap-4">
            <!-- User Progress -->
            <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center">
                <h3 class="text-lg font-bold">Progress</h3>
                <div class="text-4xl font-bold text-[#694f8e]">{{ $progressPercentage }}%</div>
                <p class="text-sm text-gray-600">Exercises Completed</p>
            </div>

            <!-- Appointment Summary -->
            <div class="bg-white shadow-lg rounded-lg p-5">
                <h3 class="text-lg font-bold mb-2">Upcoming Appointments</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    @foreach ($appointmentSummary as $appointment)
                        <li class="border-b pb-2">
                            <span class="font-semibold">{{ $appointment->month }} {{ $appointment->day }}, {{ $appointment->year }}</span>
                            <br>
                            <span class="text-xs text-gray-500">Time: {{ $appointment->time }}</span>
                            <span class="text-[#694f8e] font-semibold text-xs"> ({{ ucfirst($appointment->status) }})</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Evaluated Exercises -->
            <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col items-center">
                <h3 class="text-lg font-bold">Evaluated Exercises</h3>
                <div class="text-4xl font-bold text-[#694f8e]">{{ $evaluatedExercises }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
