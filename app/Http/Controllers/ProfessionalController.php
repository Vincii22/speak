<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exercise;
use App\Models\Schedule;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{

public function index()
{
    // Fetch all users
    $users = User::where('role', 'user')->get();
    return view('professional.userExercises.index', compact('users'));
}

public function showUserExercises($userId)
{
    // Fetch the user and their submitted exercises that are NOT evaluated
    $user = User::findOrFail($userId);
    $userActivities = UserActivity::where('user_id', $userId)
        ->where('marked_as_evaluated', false) // Exclude evaluated exercises
        ->with('exercise')
        ->get();

    return view('professional.userExercises.exercises', compact('user', 'userActivities'));
}

public function showExercise(Exercise $exercise, $activityId, )
{
    // Fetch the specific activity (exercise)
    $activity = UserActivity::with('exercise')->findOrFail($activityId);
    return view('professional.userExercises.show', compact('activity', 'exercise'));
}


public function evaluateExercise(Request $request, $activityId)
{
    // Validate evaluation input
    $request->validate([
        'evaluation' => 'nullable|string',
    ]);

    // Find the activity and update the evaluation status
    $userActivity = UserActivity::findOrFail($activityId);
    $userActivity->evaluation = $request->input('evaluation');
    $userActivity->marked_as_evaluated = true;
    $userActivity->save();

    return redirect()->route('professional.userExercises.show', $userActivity->user_id)
        ->with('success', 'Exercise evaluated successfully.');
}

public function dashboardIndex()
{
    $user = Auth::user();

    // Fetch appointments statistics
    $appointmentsCount = Schedule::where('professional_id', $user->id)->count();
    $upcomingAppointments = Schedule::where('professional_id', $user->id)
        ->where('status', 'approved')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->orderBy('day', 'asc')
        ->take(5)
        ->get();
    $appointmentsWithMeet = Appointment::whereHas('schedule', function ($query) use ($user) {
        $query->where('professional_id', $user->id);
    })->whereNotNull('google_meet_link')->count();

    // Fetch user activities summary
    $evaluatedUsers = UserActivity::where('marked_as_evaluated', true)
    ->with('user')
    ->get()
    ->groupBy('user_id')
    ->map(function ($activities) {
        return [
            'name' => $activities->first()->user->name,
            'total_exercises' => $activities->count(), // Change key to 'total_exercises'
        ];
    });


    $evaluatedUsersCount = $evaluatedUsers->count();
    $pendingEvaluations = UserActivity::where('marked_as_evaluated', false)->count();

    return view('professional.dashboard', compact(
        'appointmentsCount',
        'upcomingAppointments',
        'appointmentsWithMeet',
        'evaluatedUsers',
        'evaluatedUsersCount',
        'pendingEvaluations'
    ));
}

}
