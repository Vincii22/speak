<?php

namespace App\Http\Controllers\User;

use App\Models\Set;
use App\Models\Day;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    public function index()
    {
        // Show all sets to the user
        $sets = Set::all();  // You can modify this query to get sets based on user type if needed
        return view('user.exercises.index', compact('sets'));
    }

    public function showDays(Set $set)
    {
        // Show days based on set
        $days = $set->days;
        return view('user.exercises.days', compact('set', 'days'));
    }

    public function showCategories(Day $day)
    {
        // Show categories based on day
        $categories = $day->categories;
        return view('user.exercises.categories', compact('day', 'categories'));
    }

    public function showExercises(Category $category)
    {
        // Show exercises based on category
        $exercises = $category->exercises;
        return view('user.exercises.exercises', compact('category', 'exercises'));
    }


    public function record(Exercise $exercise)
    {
        // Show exercise detail and allow user to record media (webcam + mic)
        return view('user.exercises.record', compact('exercise'));
    }

    public function submit(Request $request, Exercise $exercise)
{
    // Handle the submission of user's recording
    $request->validate([
        'media_file' => 'required|file|mimes:mp4,mp3,avi,mkv,wav,flac,webm', // Allow webm as well
    ]);

    // Store the uploaded file
    $media_file = $request->file('media_file')->store('user_activities', 'public');

    // Store activity in the user_activities table
    $userActivity = UserActivity::create([
        'user_id' => auth()->id(),
        'exercise_id' => $exercise->id,
        'category_id' => $exercise->category_id,
        'day_id' => $exercise->category->day_id,
        'set_id' => $exercise->category->day->set_id,
        'media_file' => $media_file,
        'submitted_at' => now(),
        'marked_as_done' => true, // Mark the activity as done after submission
    ]);

    return redirect()->route('user.exercises.exercises')->with('success', 'Exercise submitted successfully!');
}


}
