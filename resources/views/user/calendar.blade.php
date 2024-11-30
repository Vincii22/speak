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
                <div class="flex gap-3 items-center">
                    <div class="bg-[#5b69c7] w-[20px] h-[20px] rounded-full"></div>
                    <h1 class="text-xl">Available</h1>
                </div>
                <div class="flex gap-3 items-center">
                    <div class="bg-[#694f8e] w-[20px] h-[20px] rounded-full"></div>
                    <h1 class="text-xl">Occupied</h1>
                </div>
            </div>
        </div>

        <!---------------- Form (Right Side) ---------------->
        <div class="form bg-white px-6 w-full lg:w-[60%] py-5">
            <h2 class="text-4xl font-bold mb-4 text-gray-600">Select a Date!</h2>
            <p class="text-gray-600 mb-6 text-xl">
                Please choose a convenient date and time for your session with a SpeechLanguage Pathologist to begin
                yourteletherapy journey
            </p>

            <div class="flex gap-5 items-center mb-4">
                <div class="w-full">
                    <label class=" text-xl block mt-4 mb-2 w-full text-gray-700 font-medium">Month</label>
                    <input type="text" id="month" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                </div>
                <div class="w-full">
                    <label class=" text-xl block mt-4 mb-2 w-full text-gray-700 font-medium">Day</label>
                    <input type="text" id="day" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                </div>
                <div class="w-full">
                    <label class=" text-xl block mt-4 mb-2 w-full text-gray-700 font-medium">Year</label>
                    <input type="text" id="year" class="text-xl border border-gray-300 p-2 rounded-md w-full" readonly>
                </div>
            </div>

            <div class="flex gap-5 mb-4">
                <div class="w-[36%]">
                    <label class=" text-xl block mt-4 mb-2 text-gray-700 font-medium">Time</label>
                    <input type="time" id="time" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                </div>

                <div class="w-3/4">
                    <label class=" text-xl block mt-4 mb-2 text-gray-700 font-medium">Speech-Language Pathologist</label>
                    <select id="pathologist" class="text-xl border border-gray-300 p-2 rounded-md w-full">
                        <option value="JUAN DELA CRUZ">JUAN DELA CRUZ</option>
                        <option value="MARIA GARCIA">MARIA GARCIA</option>
                        <option value="JOHN DOE">JOHN DOE</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-5 mb-4">
                <div class="w-full">
                    <label class=" text-xl block mt-4 mb-2 text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your email">
                </div>
                <div class="w-full">
                    <label class=" text-xl block mt-4 mb-2 text-gray-700 font-medium">Contact No.</label>
                    <input type="tel" id="contact" class="text-xl border border-gray-300 p-2 rounded-md w-full" placeholder="Enter your contact number">
                </div>
            </div>
            <button
                class="bg-purple-800 text-white py-2 px-4 rounded-md mt-6 w-full hover:bg-purple-700 transition">Schedule
                Now!</button>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentMonth = new Date();
            let selectedDate = null;

            function renderCalendar() {
                const month = currentMonth.getMonth();
                const year = currentMonth.getFullYear();
                const today = new Date();

                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                document.getElementById("calendarYear").textContent = year;
                document.getElementById("calendarMonth").textContent = monthNames[month];

                document.getElementById("month").value = monthNames[month];
                document.getElementById("year").value = year;

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
                            const isSunday = j === 0;
                            const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;
                            const isSelected = selectedDate === day ? 'bg-purple-500 !text-white' : '';

                            const textClass = isSunday ? '!text-red-500 font-bold' : '';
                            const todayClass = isToday ? 'bg-[#694f8e] !text-white rounded-full' : '';
                            const hoverClass = isSunday ? '' : 'hover:bg-pink-300 cursor-pointer rounded-full';

                            calendarGrid.innerHTML += `
                            <div class="py-2 text-[#5b69c7] ${textClass} ${isSelected} ${todayClass} ${hoverClass}" 
                                data-day="${day}" 
                                ${isSunday ? '' : `onclick="selectDay(${day})"`}>
                                ${day}
                            </div>`;
                            day++;
                        }
                    }
                }
            }

            window.selectDay = function (day) {
                selectedDate = day;
                document.getElementById("day").value = day;
                renderCalendar(); // Re-render the calendar to reflect the selected date
            };

            document.getElementById("prevMonth").addEventListener("click", function () {
                currentMonth.setMonth(currentMonth.getMonth() - 1);
                renderCalendar();
            });

            document.getElementById("nextMonth").addEventListener("click", function () {
                currentMonth.setMonth(currentMonth.getMonth() + 1);
                renderCalendar();
            });

            renderCalendar();
        });
    </script>




</x-app-layout>

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
        padding: 10px 20px;
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