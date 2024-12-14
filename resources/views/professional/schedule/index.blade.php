<x-professional-layout>
    <div>
        <!-- Dashboard content goes here -->
        @section('professional_content')
        <div class="flex flex-wrap gap-8 justify-around pl-10">
            <div class="calendar rounded-lg  w-full lg:w-[30%] relative h-full pt-5">
                <div class="upper-design-container ">
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                    <div class="upper-design"></div>
                </div>
                <div class="bg-[#8e44ad] h-[50px] rounded-t-xl"></div>
                <div class="outer-calendar bg-[#FFDED6] rounded-b-xl">
                    <div class="bg-[#694f8e] px-4">
                        <div class="text-center text-white text-xl font-semibold mb-2" id="calendarYear"></div>
                        <div class="flex justify-between items-center">
                            <button id="prevMonth" class=" text-white text-4xl px-4 rounded-md">
                                <
                            </button>
                            <span id="calendarMonth"
                                class="text-4xl uppercase font-bold text-purple-200"></span>
                            <button id="nextMonth" class=" text-white text-4xl px-4 rounded-md">
                                >
                            </button>
                        </div>
                    </div>

                    <div id="calendarGrid"
                        class="grid gap-6 grid-cols-7 text-center text-sm font-medium text-gray-700 pb-5 relative px-4">
                        <div class="absolute bg-[#694f8e] h-10 w-full top-[10px] z-10"></div>
                        <div class="py-2">Sun</div>
                        <div class="py-2">Mon</div>
                        <div class="py-2">Tue</div>
                        <div class="py-2">Wed</div>
                        <div class="py-2">Thu</div>
                        <div class="py-2">Fri</div>
                        <div class="py-2">Sat</div>
                    </div>
                </div>
                <div class="flex mt-4 justify-around">
                    <div class="flex gap-1 items-center">
                        <div class="bg-pink-400 w-[20px] h-[20px] rounded-full"></div>
                        <h1 class="text-xl">Date Today</h1>
                    </div>
                    <div class="flex gap-1 items-center">
                        <div class="bg-[#df96ff] w-[20px] h-[20px] rounded-full"></div>
                        <h1 class="text-xl">Pending</h1>
                    </div>
                    <div class="flex gap-1 items-center">
                        <div class="bg-[#694f8e] w-[20px] h-[20px] rounded-full"></div>
                        <h1 class="text-xl">Confirmed</h1>
                    </div>
                    
                </div>
            </div>

            <!---------------- Form (Right Side) ---------------->
            <div class="bg-white px-6 w-full lg:w-[67%] py-5 max-h-[90vh] overflow-y-scroll pr-10 pt-14">
                <div class="element form mb-10">
                    <h2 class="text-4xl font-bold mb-4 text-gray-600 uppercase">List of Pending Appointments</h2>
                    <div class="mb-5">
                        <i class="text-[#858585]">Select a date from the calendar or click on the appointment boxes to
                            highlight your pending appointments.</i>
                    </div>
                    @if(session('message'))
                        <div
                            class="alert flex items-center justify-between bg-[#FFC0CB] text-gray-500 p-4 rounded-lg shadow-md mb-4 w-full">
                            <div class="flex-1">
                                <span class="font-semibold">{{ session('message') }}</span>
                            </div>
                            <button onclick="this.parentElement.style.display='none'"
                                class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                        @foreach ($schedules as $schedule)
                            <div class="shadow-md w-full relative h-[150px] rounded-lg px-4 py-3 flex flex-col justify-center schedule-item transition-colors pt-7"
                                data-day="{{ $schedule->day }}" data-month="{{ $schedule->month }}"
                                data-year="{{ $schedule->year }}">
                                <img src="{{ url('img/pin.png')}}" alt="" class="absolute w-[60px] right-[-20px] top-[-10px]">
                                <div class="flex justify-between items-center flex_schedule">
                                    <h1>{{ $schedule->month }}</h1>
                                    <h1 class="bg-[#694f8e] day_schedule text-white rounded-full py-1 px-2">{{ $schedule->day }}
                                    </h1>
                                    <h1>{{ $schedule->year }}</h1>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <label>Time appointed:</label>
                                    <h1 class="ml-1">{{ $schedule->time }}</h1>
                                </div>
                                <div class="flex justify-between mt-3 items-center ">
                                    <!-- <a href="#" class="bg-[#b692d0] text-white rounded-lg text-sm px-3 py-1 open-approve-modal" data-id="{{ $schedule->id }}">Approve</a> -->
                                    <a href="#" class="bg-[#b692d0] text-white rounded-lg text-sm px-3 py-1 open-approve-modal"
                                        data-id="{{ $schedule->id }}">Approve</a>
                                    <a href="{{ route('schedule.edit', $schedule->id) }}"
                                        class="bg-pink-400 text-white rounded-lg text-sm px-3 py-1">Reschedule</a>
                                    <form action="{{ route('schedule.destroy', $schedule->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete this?')"
                                            class="text-white bg-red-800 rounded-lg text-sm px-3 py-1">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
                <div class="border-t-2 pt-4">
                    <div>
                        <h2 class="text-4xl font-bold mb-4 text-gray-600 uppercase">List of Approved Appointments</h2>
                        <div class="mb-5">
                            <i class="text-[#858585]">Select a date from the calendar or click on the appointment boxes to
                                highlight your scheduled appointments.</i>
                        </div>
                    </div>

                    <!-- Display Approved Appointments -->
                    @if ($approvedSchedules->isEmpty())
                        <p class="text-gray-600">No approved appointments yet.</p>
                    @else
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                        @foreach ($approvedSchedules as $schedule)
                            <div class="shadow-md w-full relative h-[150px] rounded-lg px-4 py-3 flex flex-col justify-center schedule-item transition-colors pt-7"
                                data-day="{{ $schedule->day }}" data-month="{{ $schedule->month }}" data-year="{{ $schedule->year }}">
                                <img src="{{ url('img/pin.png') }}" alt="" class="absolute w-[60px] right-[-20px] top-[-10px]">
                                <div class="flex justify-between items-center flex_schedule">
                                    <h1>{{ $schedule->month }}</h1>
                                    <h1 class="bg-[#694f8e] day_schedule text-white rounded-full py-1 px-2">{{ $schedule->day }}</h1>
                                    <h1>{{ $schedule->year }}</h1>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <label>Time appointed:</label>
                                    <h1 class="ml-1">{{ $schedule->time }}</h1>
                                </div>
                                <div class="flex justify-between mt-3 items-center">
                                    <a href="#" class="bg-[#b692d0] text-white rounded-lg text-sm px-3 py-1">View Appointment</a>
                                    <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete this?')"
                                            class="text-white bg-red-800 rounded-lg text-sm px-3 py-1">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>


        <!------------ Modals ------------>

        <div id="approveModal"
            class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-[#694F8E] w-1/2 p-6 rounded-[30px] shadow-lg px-8 relative">
                <img src="{{url('img/calendar.webp')}}" alt="" class="absolute w-[8.5rem] left-[-30px] top-[-50px]" style="-webkit-transform: scaleX(-1); transform: scaleX(-1);">

                <button id="closeApproveModal" class="absolute top-2 text-4xl right-2 text-white hover:text-gray-400">
                    &times;
                </button>
                <div class="container mx-auto">
                    <div class="p-6">
                        <form action="{{ route('schedules.appointments.store', $schedule->id) }}" method="POST">
                            @csrf
                            <h2 class="text-3xl font-bold text-white mb-4 text-center uppercase">Appointment Approval</h2>
                            <!-- Schedule Information -->
                            <p class="text-white mb-6 lg:text-[2.4vh]">
                                The appointment requested by
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->user->name}}</span>
                                is proposed for
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->month}}</span>
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->day}}</span>
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->year}}</span>
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->time}}</span>. 
                                The client can be reached at
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->email}}</span>
                                or
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->contact}}</span>
                                for further details. This request has been directed to 
                                <span class="font-bold text-[#FEF2D0]">{{$schedule->speech_language_pathologist}}</span>
                                <span class="font-bold text-[#FEF2D0]"></span>.
                            </p>




                            <input type="text" name="user_name" id="user_name" hidden value="{{ old('user_name', $schedule->user->name) }}">
                            <input type="email" name="contact_email" id="contact_email" hidden value="{{ old('contact_email', $schedule->email) }}">
                            <input type="text" name="contact" id="contact" hidden value="{{ old('contact', $schedule->contact) }}">
                            <input type="text" name="appointment_month" id="appointment_month" hidden value="{{ old('appointment_month', $schedule->month) }}">
                            <input type="text" name="appointment_day" id="appointment_day" hidden value="{{ old('appointment_day', $schedule->day) }}">
                            <input type="text" name="appointment_year" id="appointment_year" hidden value="{{ old('appointment_year', $schedule->year) }}">
                            <input type="text" name="appointment_time" id="appointment_time" hidden value="{{ old('appointment_time', $schedule->time) }}">
                            <input type="text" name="speech_language_pathologist" id="speech_language_pathologist" hidden value="{{ old('speech_language_pathologist', $schedule->speech_language_pathologist) }}">
                            <input type="text" name="schedule_id" id="schedule_id" hidden value="{{ old('schedule_id', $schedule->id) }}">
                            <input type="text" name="schedule_id" id="schedule_id" hidden value="{{ old('schedule_id', $schedule->id) }}">
                            <input type="email" name="user_email" id="user_email" hidden value="{{ old('user_email', $schedule->user->email) }}">

                            <div class="flex items-center space-x-4 justify-around">
                                <!-- Approved Button -->
                                <div class="w-full pb-5 flex justify-center">
                                    <label class="flex items-center px-20 space-x-2 text-white text-[2.4vh] hover:text-green-400 cursor-pointer">
                                        <input type="radio" name="status" value="approved" 
                                            {{ old('status', $schedule->status) == 'approved' ? 'checked' : '' }}
                                            class="hidden peer">
                                        <span class="w-6 h-6 border-2 border-green-500 rounded-full flex items-center justify-center relative peer-checked:bg-green-500">
                                            <svg class="checkmark hidden peer-checked:block w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                <path d="M5 12l5 5L20 7" />
                                            </svg>
                                        </span>
                                        <span>Approved</span>
                                    </label>
                                </div>

                                <!-- Declined Button -->
                                <div class="w-full py-5 flex justify-center">
                                    <label class="flex items-center px-20 space-x-2 text-white text-[2.4vh] hover:text-red-400 cursor-pointer">
                                        <input type="radio" name="status" value="declined" 
                                            {{ old('status', $schedule->status) == 'declined' ? 'checked' : '' }}
                                            class="hidden peer">
                                        <span class="w-6 h-6 border-2 border-red-500 rounded-full flex items-center justify-center relative peer-checked:bg-red-500">
                                            <svg class="crossmark hidden peer-checked:block w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                <path d="M6 6l12 12M18 6L6 18" />
                                            </svg>
                                        </span>
                                        <span>Declined</span>
                                    </label>
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="text-center w-full">
                                <button type="submit"
                                    class="bg-pink-400 text-white font-bold py-2 px-4 w-full rounded-lg  hover:bg-pink-300">
                                    Save Changes
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>




        <style>
            .upper-design {
                width: 25px;
                height: 25px;
                background-color: #fff;
                border-radius: 50%;
                position: relative;
                top: 50px;
            }

            .upper-design-container {
                display: flex;
                justify-content: space-around;
                align-items: center;
                /* background-color: #8e44ad; */
                padding: 10px 0px;
                border-radius: 16px 16px 0 0;
            }

            .upper-design::after {
                content: '';
                position: absolute;
                width: 16px;
                height: 65px;
                background-color: #b692d0;
                border-radius: 50px;
                top: -52%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.1);
            }
            .peer:checked + span {
        animation: scaleEffect 0.3s ease-in-out;
    }

    @keyframes scaleEffect {
        0% {
            transform: scale(0.8);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }
        </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentMonth = new Date();
        let bookedDates = [];
        let lastClickedDate = null;
        const approveModal = document.getElementById('approveModal');
        const closeApproveModal = document.getElementById('closeApproveModal');
        const approveButtons = document.querySelectorAll('.open-approve-modal');
        let currentScheduleId = null;  // Store the current schedule ID

        // Open the modal when the "Approve" button is clicked
        approveButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Get the schedule ID from the button's data-id attribute
                currentScheduleId = this.getAttribute('data-id');
                
                // Fetch the schedule data to populate the modal fields
                fetchScheduleData(currentScheduleId);
                
                // Show the modal
                approveModal.classList.remove('hidden');
            });
        });

        // Close the modal when the close button is clicked
        closeApproveModal.addEventListener('click', function () {
            approveModal.classList.add('hidden');
        });

        // Close modal on background click
        approveModal.addEventListener('click', function (event) {
            if (event.target === approveModal) {
                approveModal.classList.add('hidden');
            }
        });

        // Function to fetch schedule data and populate the modal fields
        function fetchScheduleData(id) {
    fetch(`/schedule/getScheduleData/${id}`)  // Pass 'id' here, not 'scheduleId'
        .then(response => response.json())
        .then(data => {
            // Populate modal form fields with the fetched data
            document.getElementById('user_name').value = data.user_name || '';
            document.getElementById('user_email').value = data.user_email || '';
            document.getElementById('appointment_month').value = data.appointment_month || '';
            document.getElementById('appointment_day').value = data.appointment_day || '';
            document.getElementById('appointment_year').value = data.appointment_year || '';
            document.getElementById('appointment_time').value = data.appointment_time || '';
            document.getElementById('contact').value = data.contact || '';
            document.getElementById('contact_email').value = data.contact_email || '';
            document.getElementById('speech_language_pathologist').value = data.speech_language_pathologist || '';
            document.getElementById('schedule_id').value = data.schedule_id || '';
        })
        .catch(error => console.error('Error fetching schedule data:', error));
}


        // Function to render the calendar
        function renderCalendar() {
            const month = currentMonth.getMonth();
            const year = currentMonth.getFullYear();
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const monthNames = [
                "January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ];

            // Update the month and year display
            document.getElementById("calendarYear").textContent = year;
            document.getElementById("calendarMonth").textContent = monthNames[month];

            const calendarGrid = document.getElementById("calendarGrid");
            calendarGrid.innerHTML = `
                <div class="absolute bg-[#694f8e] h-10 w-full top-[0px] z-10"></div>
                <div class="py-2 relative z-20 text-white uppercase font-bold text-red-500">Sun</div>
                <div class="py-2 relative z-20 text-white uppercase">Mon</div>
                <div class="py-2 relative z-20 text-white uppercase">Tue</div>
                <div class="py-2 relative z-20 text-white uppercase">Wed</div>
                <div class="py-2 relative z-20 text-white uppercase">Thu</div>
                <div class="py-2 relative z-20 text-white uppercase">Fri</div>
                <div class="py-2 relative z-20 text-white uppercase">Sat</div>
            `;

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            let day = 1;
            for (let i = 0; i < 6; i++) {
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        calendarGrid.innerHTML += `<div class="py-2"></div>`; // Empty space before first day
                    } else if (day <= lastDate) {
                        // Find the schedule for the current day
                        const schedule = bookedDates.find(schedule => 
                            schedule.day == day && schedule.month == monthNames[month] && schedule.year == year
                        );

                        const isBooked = schedule !== undefined;
                        const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;

                        // Set background color based on booking status
                        const backgroundColor = isBooked ? 
                            (schedule.status === 'approved' ? 'bg-[#694f8e]' : 'bg-[#df96ff]') : 
                            'bg-gray-300';

                        calendarGrid.innerHTML += `
                            <div 
                                class="py-2 !text-[#5c6bcc] calendar-date 
                                ${isBooked ? `${backgroundColor} !text-white rounded-full cursor-pointer` : 'text-gray-300'}
                                ${isToday ? 'bg-pink-500 !text-white rounded-full' : ''}"
                                data-day="${day}" 
                                data-month="${monthNames[month]}" 
                                data-year="${year}"
                                data-schedule-id="${isBooked ? schedule.id : ''}">
                                ${day}
                            </div>`;
                        day++;
                    }
                }
            }

            addDateClickListeners();  // Add event listeners after rendering calendar
        }

        // Fetch reserved dates from the server
        function fetchReservedDates() {
            fetch('/schedule/fetchReservedDatesForLoggedInUser', {  // Corrected endpoint
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',  // Ensure CSRF token is sent (if using Blade with CSRF)
                }
            })
            .then(response => response.json())
            .then(data => {
                bookedDates = data.map(schedule => ({
                    day: schedule.day,
                    month: schedule.month,
                    year: schedule.year,
                    status: schedule.status,  // Add status to booked dates
                    id: schedule.id  // Ensure ID is available
                }));
                renderCalendar();  // Re-render the calendar with fetched data
            })
            .catch(error => console.error('Error fetching reserved dates:', error));
        }

        // Function to add click event listeners to calendar dates
        function addDateClickListeners() {
            const calendarDates = document.querySelectorAll(".calendar-date");

            calendarDates.forEach(dateElement => {
                dateElement.addEventListener("click", function () {
                    // Remove highlight from all calendar dates
                    calendarDates.forEach(el => el.classList.remove("bg-purple-500", "text-blue-100"));

                    // Highlight the clicked calendar date
                    this.classList.add("bg-purple-500", "text-blue-100", "rounded-full");
                    lastClickedDate = this;

                    // Get the 'data-id' attribute (schedule's id) and use it
                    const scheduleId = this.dataset.id;  // Use 'data-id' from the clicked element
                    if (scheduleId) {
                        currentScheduleId = scheduleId;  // Store the scheduleId
                        fetchScheduleData(currentScheduleId);  // Fetch data with 'id'
                    }
                });
            });
        }

        // Initial fetch of reserved dates when the page loads
        fetchReservedDates();

        // Month navigation
        document.getElementById("prevMonth").addEventListener("click", function () {
            currentMonth.setMonth(currentMonth.getMonth() - 1);
            fetchReservedDates();  // Re-fetch the dates for the previous month
        });

        document.getElementById("nextMonth").addEventListener("click", function () {
            currentMonth.setMonth(currentMonth.getMonth() + 1);
            fetchReservedDates();  // Re-fetch the dates for the next month
        });
    });
</script>








        @stop
    </div>
</x-professional-layout>