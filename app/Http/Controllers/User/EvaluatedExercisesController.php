<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class EvaluatedExercisesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch evaluated exercises with related data
        $evaluatedExercises = UserActivity::where('user_id', $user->id)
            ->where('marked_as_evaluated', true)
            ->with(['exercise', 'category', 'day', 'set'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('user.evaluated-exercises', compact('evaluatedExercises'));
    }
}
