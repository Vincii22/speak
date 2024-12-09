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
                        <div class="bg-[#694f8e] w-[20px] h-[20px] rounded-full"></div>
                        <h1 class="text-xl">Confirmed</h1>
                    </div>
                </div>
            </div>

            <!---------------- Form (Right Side) ---------------->
            <div class="element form bg-white px-6 w-full lg:w-[67%] py-5 max-h-[90vh] overflow-y-scroll pr-10 pt-14">
                <h2 class="text-4xl font-bold mb-4 text-gray-600 uppercase">List of Pending Appointments</h2>
                <div class="mb-5">
                    <i class="text-[#858585]">Select a date from the calendar or click on the appointment boxes to highlight your scheduled appointment.</i>
                </div>
                @if(session('message'))
                    <div class="alert flex items-center justify-between bg-[#FFC0CB] text-gray-500 p-4 rounded-lg shadow-md mb-4 w-full">
                        <div class="flex-1">
                            <span class="font-semibold">{{ session('message') }}</span>
                        </div>
                        <button onclick="this.parentElement.style.display='none'" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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
                                <h1 class="bg-[#694f8e] day_schedule text-white rounded-full py-1 px-2">{{ $schedule->day }}</h1>
                                <h1>{{ $schedule->year }}</h1>
                            </div>
                            <div class="flex justify-between mt-2">
                                <label>Time appointed:</label>
                                <h1 class="ml-1">{{ $schedule->time }}</h1>
                            </div>
                            <div class="flex justify-between mt-3 items-center ">
                                <!-- <a href="#" class="bg-[#b692d0] text-white rounded-lg text-sm px-3 py-1 open-approve-modal" data-id="{{ $schedule->id }}">Approve</a> -->
                                <a href="#" class="bg-[#b692d0] text-white rounded-lg text-sm px-3 py-1 open-approve-modal" data-id="{{ $schedule->id }}">Approve</a>
                                <a href="{{ route('schedule.edit', $schedule->id) }}" class="bg-pink-400 text-white rounded-lg text-sm px-3 py-1">Reschedule</a>
                                <form action="{{ route('schedule.destroy', $schedule->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to delete this?')" class="text-white bg-red-800 rounded-lg text-sm px-3 py-1">Cancel</button>
                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>
        </div>


        <!------------ Modals ------------>
        
        <div id="approveModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Approve Appointment</h2>
                <div id="modalContent">
                    <!-- Fetched data will be dynamically inserted here -->
                </div>
                <div class="flex justify-end mt-4">
                    <button id="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Close</button>
                    <button id="confirmApprove" class="px-4 py-2 bg-green-500 text-white rounded-lg">Approve</button>
                </div>
            </div>
        </div>
        
        <!------------ end of Modals ------------>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const approveButtons = document.querySelectorAll('.open-approve-modal');
        const approveModal = document.getElementById('approveModal');
        const closeModal = document.getElementById('closeModal');
        const modalContent = document.getElementById('modalContent');
        const confirmApprove = document.getElementById('confirmApprove');

        // Event listener for opening the modal
        approveButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default anchor action
                const scheduleId = button.getAttribute('data-id');

                // Dynamically load data into the modal (for example, schedule ID)
                modalContent.innerHTML = `<p>Are you sure you want to approve the appointment with ID: <strong>${scheduleId}</strong>?</p>`;

                // Show the modal
                approveModal.classList.remove('hidden');
            });
        });

        // Event listener for closing the modal
        closeModal.addEventListener('click', function () {
            approveModal.classList.add('hidden'); // Hide the modal
        });

        // Event listener for confirming the approval
        confirmApprove.addEventListener('click', function () {
            const scheduleId = document.querySelector('.open-approve-modal').getAttribute('data-id');

            // You can replace this part with an AJAX request to approve the schedule
            console.log('Approved Schedule ID:', scheduleId);

            // Close the modal after confirming
            approveModal.classList.add('hidden');
        });
    });
</script>
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
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let currentMonth = new Date();
                let bookedDates = [];
                let lastClickedDate = null;
                let lastClickedSchedule = null;

                function renderCalendar() {
                    const month = currentMonth.getMonth();
                    const year = currentMonth.getFullYear();
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    const monthNames = [
                        "January", "February", "March", "April", "May", "June", "July",
                        "August", "September", "October", "November", "December"
                    ];

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
                                calendarGrid.innerHTML += `<div class="py-2"></div>`;
                            } else if (day <= lastDate) {
                                const isBooked = bookedDates.some(schedule => {
                                    return (
                                        schedule.day == day &&
                                        schedule.month == monthNames[month] &&
                                        schedule.year == year
                                    );
                                });

                                const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;

                                calendarGrid.innerHTML += `
                                    <div 
                                        class="py-2 text-[#5c6bcc] calendar-date 
                                        ${isBooked ? 'bg-[#694f8e] !text-[#cccccc] rounded-full cursor-pointer' : 'text-gray-300'}
                                        ${isToday ? 'bg-pink-500 !text-white rounded-full' : ''}"
                                        data-day="${day}" 
                                        data-month="${monthNames[month]}" 
                                        data-year="${year}">
                                        ${day}
                                    </div>`;
                                day++;
                            }
                        }
                    }

                    addDateClickListeners();
                }

                function fetchReservedDates() {
                    fetch('/schedule/fetchReservedDatesForLoggedInUser', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        bookedDates = data;
                        renderCalendar();
                    })
                    .catch(error => console.error('Error fetching reserved dates:', error));
                }

                function addDateClickListeners() {
                    const calendarDates = document.querySelectorAll(".calendar-date");
                    const scheduleItems = document.querySelectorAll(".schedule-item");

                    calendarDates.forEach(dateElement => {
                        dateElement.addEventListener("click", function () {
                            // Remove highlight from all calendar dates
                            calendarDates.forEach(el => el.classList.remove("bg-purple-500", "text-blue-100"));

                            // Highlight the clicked calendar date
                            this.classList.add("bg-purple-500", "text-blue-100", "rounded-full");
                            lastClickedDate = this;

                            // Highlight corresponding schedule item
                            highlightSchedule(this.dataset.day, this.dataset.month, this.dataset.year);
                        });
                    });

                    scheduleItems.forEach(schedule => {
                        schedule.addEventListener("click", function () {
                            // Remove highlight from all schedule items
                            scheduleItems.forEach(el => el.classList.remove("bg-[#b692d0]", "text-white"));

                            // Highlight the clicked schedule item
                            this.classList.add("bg-[#b692d0]", "text-white");
                            lastClickedSchedule = this;

                            // Highlight corresponding calendar date
                            highlightCalendarDate(this.dataset.day, this.dataset.month, this.dataset.year);
                        });
                    });
                }

                function highlightSchedule(day, month, year) {
                    const schedules = document.querySelectorAll(".schedule-item");
                    schedules.forEach(schedule => {
                        schedule.classList.remove("bg-[#b692d0]", "text-white");
                        if (
                            schedule.dataset.day === day &&
                            schedule.dataset.month === month &&
                            schedule.dataset.year === year
                        ) {
                            schedule.classList.add("bg-[#b692d0]", "text-white");
                        }
                    });
                }

                function highlightCalendarDate(day, month, year) {
                    const calendarDates = document.querySelectorAll(".calendar-date");
                    calendarDates.forEach(dateElement => {
                        dateElement.classList.remove("bg-purple-500", "text-white");
                        if (
                            dateElement.dataset.day === day &&
                            dateElement.dataset.month === month &&
                            dateElement.dataset.year === year
                        ) {
                            dateElement.classList.add("bg-purple-500", "text-white");
                        }
                    });
                }

                // Initial fetch of reserved dates
                fetchReservedDates();

                // Month navigation
                document.getElementById("prevMonth").addEventListener("click", function () {
                    currentMonth.setMonth(currentMonth.getMonth() - 1);
                    fetchReservedDates();
                });

                document.getElementById("nextMonth").addEventListener("click", function () {
                    currentMonth.setMonth(currentMonth.getMonth() + 1);
                    fetchReservedDates();
                });
            });

        </script>






       
        @stop
    </div>
</x-professional-layout>