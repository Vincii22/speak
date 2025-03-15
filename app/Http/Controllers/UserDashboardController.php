<?php

namespace App\Http\Controllers;


    use Illuminate\Http\Request;
    use App\Models\Appointment;
    use App\Models\Schedule;
    use App\Models\Exercise;
    use App\Models\UserActivity;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;

    class UserDashboardController extends Controller
    {
        public function index()
        {


            $user = Auth::user();

            // Fetch approved schedules with their appointments
            $approvedSchedules = Schedule::whereHas('appointments', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('status', 'approved')
            ->with('appointments')
            ->get();

            // Get all exercises assigned to the user (based on sets)
            $totalExercises = Exercise::whereHas('category.day.set', function ($query) use ($user) {
                $query->whereIn('id', UserActivity::where('user_id', $user->id)->pluck('set_id'));
            })->count();

            // Count only completed exercises
            $completedExercises = UserActivity::where('user_id', $user->id)
                ->where('marked_as_done', true)
                ->count();

            // Avoid division by zero
            $progressPercentage = $totalExercises > 0 ? round(($completedExercises / $totalExercises) * 100, 2) : 0;


            // Fetch summary of all appointments
            $appointmentSummary = Appointment::whereHas('schedule', function ($query) use ($user) {
                    $query->whereHas('appointments', function ($q) use ($user) {
                        $q->where('user_id', $user->id);
                    });
                })
                ->select('month', 'day', 'year', 'time', 'status')
                ->orderBy('year')
                ->orderBy('month')
                ->orderBy('day')
                ->get();

            // Fetch evaluated exercises count
            $evaluatedExercises = UserActivity::where('user_id', $user->id)
                ->where('marked_as_evaluated', true)
                ->count();

            return view('user.dashboard', compact(
                'approvedSchedules',
                'progressPercentage',
                'appointmentSummary',
                'evaluatedExercises',
                'totalExercises',
                'completedExercises',
            ));
        }
    }
