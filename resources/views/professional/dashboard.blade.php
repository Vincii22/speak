<x-professional-layout>
    <div>
        @section('professional_content')

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            <!-- Total Appointments Card -->
            <div class="dashboard-card animate-slide-in">
                <h3>Total Appointments</h3>
                <p class="number">{{ $appointmentsCount }}</p>
            </div>

            <!-- Upcoming Appointments -->
            <div class="dashboard-card animate-slide-in">
                <h3>Upcoming Appointments</h3>
                <ul class="text-sm">
                    @foreach ($upcomingAppointments as $appointment)
                        <li>{{ $appointment->month }} {{ $appointment->day }}, {{ $appointment->year }} - <strong>{{ ucfirst($appointment->status) }}</strong></li>
                    @endforeach
                </ul>
            </div>

            <!-- Appointments with Google Meet -->
            <div class="dashboard-card animate-slide-in">
                <h3>Appointments with Google Meet</h3>
                <p class="number">{{ $appointmentsWithMeet }}</p>
            </div>

            <!-- Total Users Evaluated -->
            <div class="dashboard-card animate-slide-in">
                <h3>Total Users Evaluated</h3>
                <p class="number">{{ $evaluatedUsersCount }}</p>
            </div>

            <!-- Evaluated Users List -->
            <div class="dashboard-card animate-slide-in">
                <h3>Users & Evaluated Exercises</h3>
                <ul class="text-sm">
                    @foreach ($evaluatedUsers as $user)
                        <li><strong>{{ $user['name'] }}</strong> - <span>{{ $user['total_exercises'] }} exercises</span></li>
                    @endforeach
                </ul>
            </div>

            <!-- Pending Evaluations -->
            <div class="dashboard-card animate-slide-in">
                <h3>Pending Evaluations</h3>
                <p class="number">{{ $pendingEvaluations }}</p>
            </div>
        </div>

        <!-- CSS for Styling -->
        <style>
            .grid {
                display: grid;
                gap: 1.5rem;
                padding: 1.5rem;
            }
            .dashboard-card {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 1.5rem;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                cursor: pointer;
            }
            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
            .dashboard-card h3 {
                font-size: 1.5rem;
                font-weight: 700;
                color: #694f8e;
                margin-bottom: 10px;
            }
            .number {
                font-size: 2.5rem;
                font-weight: bold;
                color: #694f8e;
                text-align: center;
            }
            .animate-slide-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.8s ease forwards;
            }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

        <!-- JS for Loading Animations -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let delay = 200;
                document.querySelectorAll(".animate-slide-in").forEach((el, index) => {
                    setTimeout(() => {
                        el.style.animationDelay = `${index * 100}ms`;
                        el.classList.add("visible");
                    }, delay);
                });
            });
        </script>

        @stop
    </div>
</x-professional-layout>
