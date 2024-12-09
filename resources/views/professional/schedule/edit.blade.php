<x-professional-layout>
    <div>
        <!-- Dashboard content goes here -->
        @section('professional_content')
        <div class="flex flex-wrap gap-8 justify-around pl-20">
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
                    <h1 class="text-xl">Main Date</h1>
                </div>
                <div class="flex gap-1 items-center">
                    <div class="bg-[#694f8e] w-[20px] h-[20px] rounded-full"></div>
                    <h1 class="text-xl">New Date</h1>
                </div>
            </div>
        </div>

        <!---------------- Form (Right Side) ---------------->
        <div class="form bg-white px-6 w-full lg:w-[60%] py-5 flex flex-col justify-center">
            <h2 class="text-4xl font-bold mb-4 text-gray-600 uppercase">Select a Date!</h2>
            <p class="text-gray-600 mb-5 text-xl">
                Please review and reschedule the session to a suitable date and time to ensure the teletherapy journey begins smoothly.
            </p>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong>Whoops! Something went wrong.</strong>
                    <ul class="mt-2 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('schedule.update', $reservedDate->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="w-full mb-3">
                    <label class=" text-xl block mb-2 text-gray-700 font-medium">Speech-Language Pathologist</label>
                    <input type="text" class="text-xl border border-gray-300 p-2 rounded-md w-full" disabled value="{{$reservedDate->speech_language_pathologist}}">
                </div>
                <div class="">
                    <i class="text-[#858585]">Choose a date on the calendar for reschedule date</i>
                </div>
                <div class="flex gap-5 items-center mb-4">
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Month</label>
                        <input required name="month" type="text" value="{{$reservedDate->month}}" id="month" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Day</label>
                        <input required name="day" type="text" value="{{$reservedDate->day}}" id="day" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 w-full text-gray-700 font-medium">Year</label>
                        <input required name="year" type="text" value="{{$reservedDate->year}}" id="year" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                    </div>
                    <div class="w-full">
                        <label class="text-xl block mb-2 text-gray-700 font-medium">Time</label>
                        <input required name="time" type="time" value="{{$reservedDate->time}}" id="time" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                    </div>
                </div>
                <div class="hidden">
                    <div class="w-full">
                        <label class=" text-xl block mb-2 text-gray-700 font-medium">Email</label>
                        <input required name="email" type="email" value="{{$reservedDate->email}}" id="email" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your email">
                    </div>
                    <div class="w-full">
                        <label class=" text-xl block mb-2 text-gray-700 font-medium">Contact No.</label>
                        <input required name="contact" type="tel" value="{{$reservedDate->contact}}" id="contact" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your contact number">
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
    let selectedDay = parseInt(document.getElementById("day").value) || null;  // Get initial selected day from input
    let selectedMonth = document.getElementById("month").value || new Date().toLocaleString('default', { month: 'long' });  // Get month value from input
    let selectedYear = parseInt(document.getElementById("year").value) || currentMonth.getFullYear();  // Get year value from input
    let originalDay = selectedDay;  // Save the original day for comparison
    const monthNames = [
        "January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"
    ];

    // Function to render the calendar
    function renderCalendar() {
        const monthIndex = monthNames.indexOf(selectedMonth);  // Get the index of the selected month
        const year = selectedYear;
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Remove time part for comparison

        // Update the visible month and year in the calendar
        document.getElementById("calendarYear").textContent = year;
        document.getElementById("calendarMonth").textContent = monthNames[monthIndex];

        // Set hidden input values for form submission
        document.getElementById("month").value = monthNames[monthIndex];
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

        const firstDay = new Date(year, monthIndex, 1).getDay(); // Get the first day of the month (0-6)
        const lastDate = new Date(year, monthIndex + 1, 0).getDate(); // Last date of the month

        let day = 1;
        let validDayFound = false; // Track if a valid day is selected in the current month

        for (let i = 0; i < 6; i++) {
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    // Empty cells before the first day of the month
                    calendarGrid.innerHTML += `<div class="py-2"></div>`;
                } else if (day <= lastDate) {
                    // Check if it's the original day
                    const isOriginalDay = day === originalDay ? 'bg-[#5b69c7] text-white' : ''; // Blue background for the original day
                    const isSelected = day === selectedDay && day !== originalDay ? 'bg-[#694f8e] text-white' : '';  // Red background for selected day
                    const textClass = j === 0 ? 'text-red-500 font-bold' : ''; // Sundays are styled with red text
                    const isToday = today.getDate() === day && today.getMonth() === monthIndex && today.getFullYear() === year ? 'bg-pink-400 text-white rounded-full' : '';
                    const hoverClass = 'hover:bg-[#5b69c7] hover:text-white cursor-pointer rounded-full';

                    // Disable past days
                    const isPastDay = new Date(year, monthIndex, day) < today ? 'disabled bg-gray-200 cursor-not-allowed hover:!bg-gray-200 hover:!text-[blue]' : ''; // Disable days before today

                    calendarGrid.innerHTML += `
                        <div class="py-2 text-[#5b69c7] ${textClass} ${isOriginalDay} ${isSelected} ${isToday} ${hoverClass} ${isPastDay}" 
                            data-day="${day}" 
                            onclick="selectDay(${day}, ${monthIndex}, ${year})">
                            ${day}
                        </div>`;
                    day++;

                    // Check if selectedDay is valid in the current month
                    if (selectedDay === day - 1) {
                        validDayFound = true;
                    }
                }
            }
        }

        // Reset the selectedDay if it's invalid for the current month
        if (!validDayFound && selectedDay !== null) {
            selectedDay = null;
            document.getElementById("day").value = ''; // Clear the input
        }
    }

    // Handle day selection
    window.selectDay = function (day, month, year) {
        // Prevent selecting disabled days
        if (new Date(year, month, day) < new Date()) {
            return;
        }

        // Update the input value
        const dayInput = document.getElementById("day");
        dayInput.value = day;

        // Change the selected day (this will apply to the calendar and input)
        selectedDay = day;

        // Re-render the calendar to update the colors
        renderCalendar();
    };

    // Handle previous month navigation
    document.getElementById("prevMonth").addEventListener("click", function () {
        currentMonth.setMonth(currentMonth.getMonth() - 1);
        selectedMonth = monthNames[currentMonth.getMonth()];
        selectedYear = currentMonth.getFullYear(); // Update year when going to the previous month
        selectedDay = null;  // Reset the day when changing months
        document.getElementById("day").value = ''; // Clear the day input
        renderCalendar();
    });

    // Handle next month navigation
    document.getElementById("nextMonth").addEventListener("click", function () {
        currentMonth.setMonth(currentMonth.getMonth() + 1);
        selectedMonth = monthNames[currentMonth.getMonth()];
        selectedYear = currentMonth.getFullYear(); // Update year when going to the next month
        selectedDay = null;  // Reset the day when changing months
        document.getElementById("day").value = ''; // Clear the day input
        renderCalendar();
    });

    // Dynamically update the calendar based on form input values
    document.getElementById("month").addEventListener("change", function () {
        selectedMonth = this.value;
        selectedDay = null; // Reset the day when changing the month
        document.getElementById("day").value = ''; // Clear the day input
        renderCalendar();
    });

    document.getElementById("day").addEventListener("change", function () {
        selectedDay = parseInt(this.value);
        renderCalendar();
    });

    document.getElementById("year").addEventListener("change", function () {
        selectedYear = parseInt(this.value);
        selectedDay = null; // Reset the day when changing the year
        document.getElementById("day").value = ''; // Clear the day input
        renderCalendar();
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



@stop
</div>
</x-professional-layout>