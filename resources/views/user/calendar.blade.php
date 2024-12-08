<x-app-layout>
    <div class="flex flex-wrap gap-8 justify-around px-20 pb-10 pt-24">
        <div class="calendar rounded-lg  w-full lg:w-[30%] relative h-full">
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
                        <button id="prevMonth" class=" text-white text-4xl px-4 rounded-md"><</button>
                        <span id="calendarMonth" class="text-4xl uppercase font-bold text-purple-200"></span>
                        <button id="nextMonth" class=" text-white text-4xl px-4 rounded-md">></button>
                    </div>
                </div>


                <div id="calendarGrid"
                    class="grid gap-6 grid-cols-7 text-center text-sm font-medium text-gray-700 pb-5 relative px-4">
                    <div class="absolute bg-[#694f8e] h-10 w-full top-[10px]"></div>
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
                    <div class="bg-[#5b69c7] w-[20px] h-[20px] rounded-full"></div>
                    <h1 class="text-xl">Available</h1>
                </div>
                <div class="flex gap-1 items-center">
                    <div class="bg-[#694f8e] w-[20px] h-[20px] rounded-full"></div>
                    <h1 class="text-xl">Occupied</h1>
                </div>
            </div>
        </div>

        <!---------------- Form (Right Side) ---------------->
        <div class="form bg-white px-6 w-full lg:w-[60%] py-5">
            <h2 class="text-4xl font-bold mb-4 text-gray-600 uppercase">Select a Date!</h2>
            <p class="text-gray-600 mb-5 text-xl">
                Please choose a convenient date and time for your session with a Speech Language Pathologist to begin your teletherapy journey.
            </p>
            <form action="{{ route('schedule.store') }}" method="POST">
                @csrf
                <div class="">
                    <i class="text-[#858585]">First, choose your prefered Pathologist</i>
                </div>
                <div class="w-full mb-3">
                    <label class=" text-xl block mb-2 text-gray-700 font-medium">Speech-Language Pathologist</label>
                    <select name="speech_language_pathologist" id="pathologist" class="text-xl border border-gray-300 p-2 rounded-md w-full" required>
                        <option value="" readonly>Choose a pathologist</option>
                    @if($pathologists->isEmpty())
                        <option value="" disabled>No professionals available</option>
                    @else
                        @foreach ($pathologists as $pathologist)
                            <option value="{{ $pathologist->name }}">{{ $pathologist->name }}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
                <div class="">
                    <i class="text-[#858585]">Then, choose a date on the calendar</i>
                </div>
                <div class="flex gap-5 items-center mb-4">
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Month</label>
                        <input required name="month" type="text" id="month" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Day</label>
                        <input required name="day" type="text" id="day" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Year</label>
                        <input required name="year" type="text" id="year" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                    </div>
                    <div class="w-full">
                        <label class="text-xl block mb-2 text-gray-700 font-medium">Time</label>
                        <input required name="time" type="time" id="time" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                    </div>
                </div>
                <div class="flex gap-5 mb-4">
                    <div class="w-full">
                        <label class=" text-xl block mb-2 text-gray-700 font-medium">Email</label>
                        <input required name="email" type="email" id="email" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your email">
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 text-gray-700 font-medium">Contact No.</label>
                        <input required name="contact" type="tel" id="contact" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your contact number">
                    </div>
                </div>
                <button class="uppercase bg-purple-800 text-white py-2 px-4 rounded-md mt-6 w-full hover:bg-purple-700 transition">
                    Schedule Now!
                </button>
            </form>
        </div>
    </div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentMonth = new Date(); // Tracks the current month displayed
        let selectedDate = null;
        let bookedDates = []; // Store the booked dates for the selected pathologist

        // Function to render the calendar
        function renderCalendar() {
            const month = currentMonth.getMonth();
            const year = currentMonth.getFullYear();
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Remove time part for comparison

            const monthNames = [
                "January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ];

            // Update the visible month and year
            document.getElementById("calendarYear").textContent = year;
            document.getElementById("calendarMonth").textContent = monthNames[month];

            // Set hidden input values for form submission
            document.getElementById("month").value = monthNames[month];
            document.getElementById("year").value = year;

            // Prepare the calendar grid
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

            const firstDay = new Date(year, month, 1).getDay(); // Get the first day of the month (0-6)
            const lastDate = new Date(year, month + 1, 0).getDate(); // Last date of the month

            let day = 1;
            for (let i = 0; i < 6; i++) {
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        // Empty cells before the first day of the month
                        calendarGrid.innerHTML += `<div class="py-2"></div>`;
                    } else if (day <= lastDate) {
                        const isSunday = j === 0;
                        const isToday =
                            today.getDate() === day &&
                            today.getMonth() === month &&
                            today.getFullYear() === year;
                        const isSelected = selectedDate === day ? 'bg-purple-500 !text-white' : '';
                        const isBooked = bookedDates.some(schedule =>
                            schedule.year == year &&
                            schedule.month === monthNames[month] &&
                            schedule.day == day
                        );

                        // Disable past dates (but not reserved dates)
                        const dateToCompare = new Date(year, month, day);
                        const isPastDate = dateToCompare < today && !isBooked; // Disable past dates only if not reserved

                        // CSS classes based on the date status
                        const textClass = isSunday ? '!text-red-500 font-bold' : '';
                        const todayClass = isToday ? 'bg-pink-400 !text-white rounded-full' : '';
                        const hoverClass = isBooked || isPastDate ? '' : 'hover:bg-[#5b69c7] hover:text-white cursor-pointer rounded-full';
                        const disabledClass = isPastDate ? 'disabled' : '';
                        const bookedClass = isBooked ? 'bg-[#694f8e] text-white rounded-full' : '';

                        calendarGrid.innerHTML += `
                            <div class="py-2 text-[#5b69c7] ${textClass} ${isSelected} ${todayClass} ${hoverClass} ${disabledClass} ${bookedClass}" 
                                data-day="${day}" 
                                ${isBooked || isPastDate || isSunday ? '' : `onclick="selectDay(${day})"`}>
                                ${day}
                            </div>`;
                        day++;
                    }
                }
            }
        }

        window.selectDay = function (day) {
            selectedDate = day;
            document.getElementById("day").value = day; // Set hidden input value for the selected day
            renderCalendar(); // Re-render the calendar to reflect the selected date
        };

        // Handle previous month navigation
        document.getElementById("prevMonth").addEventListener("click", function () {
            currentMonth.setMonth(currentMonth.getMonth() - 1);
            renderCalendar();
        });

        // Handle next month navigation
        document.getElementById("nextMonth").addEventListener("click", function () {
            currentMonth.setMonth(currentMonth.getMonth() + 1);
            renderCalendar();
        });

        // Update calendar when a pathologist is selected
        document.getElementById('pathologist').addEventListener('change', function () {
            const selectedPathologist = this.value;

            // Fetch reserved dates for the selected pathologist
            fetch('{{ route('schedule.reservedDates') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ speech_language_pathologist: selectedPathologist }),
            })
            .then(response => response.json())
            .then(reservedDates => {
                bookedDates = reservedDates; // Update booked dates
                renderCalendar(); // Re-render calendar with updated dates
            })
            .catch(error => {
                console.error('Error fetching reserved dates:', error);
            });
        });

        // Render the calendar initially
        renderCalendar();
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






</x-app-layout>

