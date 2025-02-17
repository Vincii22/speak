<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exercise;
use App\Models\UserActivity;
use Illuminate\Http\Request;

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
    // Fetch the user and their submitted exercises
    $user = User::findOrFail($userId);
    $userActivities = UserActivity::where('user_id', $userId)->with('exercise')->get();

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
}
