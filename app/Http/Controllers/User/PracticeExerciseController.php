<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;


use App\Models\PracticeCategory;
use App\Models\PracticeExercise;

class PracticeExerciseController extends Controller
{
    // Show all exercises by category (User side)
    public function index()
    {
        // Fetch all categories
        $categories = PracticeCategory::all();

        // Return the view with categories
        return view('user.practices.index', compact('categories'));
    }


    public function showExercisesByCategory($categoryId)
    {
    // Fetch the category and its exercises
    $category = PracticeCategory::findOrFail($categoryId);

    // Get the exercises for this category
    $exercises = $category->exercises;

    // Return the view with the data
    return view('user.practices.exercises', compact('category', 'exercises'));
    }

    public function show($exerciseId)
{
    // Fetch the exercise
    $exercise = PracticeExercise::findOrFail($exerciseId);

    // Return the view with the exercise details
    return view('user.practices.show', compact('exercise'));
}


}
